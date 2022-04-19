<?php

namespace App\Http\Controllers;

use App\Models\Section;
use App\Models\Topiс;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TopicController extends Controller
{
    public function topicSelect($section)
    {
        $id = Section::where('name', $section)->select('id')->first();

        $topics = Topiс::where('section_id', $id->id)
            ->select('id', 'name')
            ->orderBy('last_post', 'desc')
            ->simplePaginate(10);

        return view('topic.topicSelect', [
            'title' => 'Темы выбранной категории',
            'topics' => $topics,
        ]);
    }

    public function create(Request $request, $section)
    {
        if (Auth::check()){
            $id = Section::where('name', $section)->select('id')->first();

            $topic = new Topiс();
            $topic->name = $request->name;
            $topic->user_id = auth()->user()->id;
            $topic->section_id = $id->id;
            $topic->save();

            return redirect("/section-$section");
        }
        return redirect()->route('на авторизацию');
    }
}
