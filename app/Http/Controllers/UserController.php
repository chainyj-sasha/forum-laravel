<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function registerForm()
    {
        return view('user.registerForm');
    }

    public function create(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|min:3',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:3|confirmed',
        ]);

        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->save();

        Auth::login($user);

        return redirect()->route('homePage');
    }

    public function login(Request $request)
    {
        if ($request->has('button')){

            $this->validate($request, [
                'email' => 'required|email',
                'password' => 'required',
            ]);

            if (Auth::attempt([
                'email' => $request->email,
                'password' => $request->password,
                'is_active' => 1,
            ])){
                $request->session()->flash('success', 'Авторизация прошла успешно!');
                return redirect()->route('homePage');
            }
            $request->session()->flash('error', 'Не правильно введен логин или пароль');
            return redirect()->back();
        }
        return view('user.login');
    }

    public function logout()
    {
        Auth::logout();
        return redirect()->route('homePage');
    }

    public function showOne(Request $request,$id)
    {
        $user = User::find($id);

        if ($request->has('button')){
            if (Auth::check() && auth()->user()->is_admin){
                $user->is_active = $request->hidden;
                $user->save();

                return redirect("/profile/$id");
            }
            $request->session()->flash('error', 'Вы не авторизованы');
            return abort(404, 'Page Not Found');
        }

        return view('user.showOne', [
            'title' => 'Просмотр профиля',
            'user' => $user,
        ]);
    }
}
