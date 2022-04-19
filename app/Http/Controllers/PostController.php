<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Topiс;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{
    public function postSelect($topicId)
    {
        $posts = Post::where('topic_id', $topicId)->orderBy('updated_at', 'desc')->simplePaginate(10);

        return view('post.postSelect', [
            'title' => 'Обсуждение темы',
            'posts' => $posts,
        ]);
    }

    public function create(Request $request, $topicId)
    {
        if (Auth::check()){
            $this->validate($request, [
                'text' => 'required',
            ]);

            $post = new Post();
            $post->text = $request->text;
            $post->user_id = auth()->user()->id;
            $post->topic_id = $topicId;
            $post->save();

            $topic = Topiс::find($topicId);
            $topic->last_post = date('Y-m-d H:i:s', time());
            $topic->save();

            $request->session()->flash('success', 'сообщение добавлено успешно!');

            return redirect("/topic/$topicId");
        }
        $request->session()->flash('error', 'Вы не авторизованы');
        return abort(404, 'Page Not Found');
    }

    public function editPost(Request $request, $id)
    {
        if (Auth::check()){
            $post = Post::find($id);

            if ($request->has('button')){
                if ($post->user_id == auth()->user()->id){
                    $this->validate($request, [
                        'text' => 'required',
                    ]);

                    $post->text = $request->text;
                    $post->save();

                    return redirect("/editPost/$id");
                }
                return abort(404, 'Page Not Found');
            }
            return view('post.editPost', [
                'title' => 'Редактировать пост',
                'post' => $post,
            ]);
        }
        $request->session()->flash( 'error','вы не авторизованы');
        return abort(404, 'Page Not Found');
    }

    public function delete($id){

        if (Auth::check()){
            $post = Post::find($id);
            if (auth()->user()->id == $post->user_id || auth()->user()->is_admin){
                $post->delete();

                return redirect("/topic/$id");
            }
        }
        return abort(404, 'Page Not Found');
    }
}



