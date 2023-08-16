<?php

namespace App\Http\Controllers;

use App\Models\News;
use Illuminate\Http\Request;

class NewsController extends Controller
{
    public function create(Request $request): \Illuminate\Http\RedirectResponse
    {

        $data = $request->validate([
            'title' => 'required',
            'description' => 'required',
            'pub-date' => 'required|date',
            'image' => 'required',
        ]);

        News::create([
            'title' => $data['title'],
            'description' => $data['description'],
            'publication_date' => $data['pub-date'],
            'image' => $data['image'],
        ]);

        return redirect()->route('create')->with('success', 'News created successfully.');
    }

    public function index()
    {
        $news = News::all();
        return view('home', compact('news'));
    }

    public function show($id)
    {
        $newsItem = News::findOrFail($id);
        return view('show', compact('newsItem'));
    }
}
