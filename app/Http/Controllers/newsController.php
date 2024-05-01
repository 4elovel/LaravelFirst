<?php

namespace App\Http\Controllers;

use App\Models\News;
use Illuminate\Http\Request;

class newsController extends Controller
{
    public function index()
    {
    $news = News::all();
    return view('index',compact('news'));
    }
    public function addNew()
    {
        return view('addNew');
    }
    public function saveNew(Request $request)
    {
        $validated = $request->validate([
            'header' => 'required|string|max:50',
            'short_text' => 'required|string|max:150',
            'article' => 'required|string|max:5000',

        ]);
        $DTO = ([
            'summary' => $validated['header'],
            'short_description' => $validated['short_text'],
            'full_text' => $validated['article'],
        ]);

        News::query()->create($DTO);

        $news = News::all();
        return view('index',compact('news'));
    }
}
