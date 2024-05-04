<?php

namespace App\Http\Controllers;

use App\Models\Comments;
use App\Models\News;
use App\Models\NewsCategory;
use App\Models\Users;
use Illuminate\Http\Request;

class newsController extends Controller
{
    public function index()
    {
    $news = News::all();
    $categories = NewsCategory::all();
    return view('index',compact('news','categories'));
    }
    public function addNew()
    {
        $categories = NewsCategory::all();
        return view('addNew',compact('categories'));
    }
    public function getNewsById($id)
    {
        $news = News::query()->firstWhere('id','=',$id);
        $comments = Comments::query()->where('news_id','=',$id)->get();
        return view('NewsView',compact('news','comments'));
    }
    public function saveNew(Request $request)
    {
        $validated = $request->validate([
            'header' => 'required|string|max:50',
            'short_text' => 'required|string|max:150',
            'article' => 'required|string|max:5000',
            'category' => 'required|exists:news_categories,id'
        ]);

        $DTO = [
            'summary' => $validated['header'],
            'short_description' => $validated['short_text'],
            'full_text' => $validated['article'],
            'category_id' => $validated['category']
        ];

        News::query()->create($DTO);

        return redirect("/main");
    }
    public function filterNews(Request $request)
    {
        $category_id = $request->input('category');
        $name = $request->input('name');
        $news = News::query();
        if(!$category_id && !$name){
            return redirect('/main');
        }
        if ($category_id) {
            $news->where('category_id', $category_id);
        }
        if ($name) {
            $news->where('summary', 'like', '%' . $name . '%');
        }
        $filtered_news = $news->get();
        $categories = NewsCategory::all();
        return view('filtered_news', compact('filtered_news', 'categories'));
    }
}
