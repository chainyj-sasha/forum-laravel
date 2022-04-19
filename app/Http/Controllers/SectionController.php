<?php

namespace App\Http\Controllers;

use App\Models\Section;
use Illuminate\Http\Request;

class SectionController extends Controller
{
    public function showAll()
    {
        $sections = Section::select('name')->get();

        return view('section.showAll', [
            'title' => 'Все разделы форума',
            'sections' => $sections,
        ]);
    }
}
