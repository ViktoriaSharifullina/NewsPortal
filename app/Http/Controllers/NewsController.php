<?php

namespace App\Http\Controllers;

use App\Models\News;
use Carbon\Carbon;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class NewsController extends Controller
{
    public function create(Request $request): RedirectResponse
    {
        $request->validate([
            'title' => 'required',
            'description' => 'required',
            'pub-date' => 'required|date',
            'image' => 'required',
        ]);

        News::create([
            'title' => $request->input('title'),
            'description' => $request->input('description'),
            'publication_date' => $request->input('pub-date'),
            'image' => $request->input('image'),
            'meta_title' => $request->input('meta_title'),
            'meta_description' => $request->input('meta_description'),
            'meta_keywords' => $request->input('meta_keywords'),
        ]);

        return redirect()->route('create')->with('success', 'News created successfully.');
    }

    public function index(): View|\Illuminate\Foundation\Application|Factory|Application
    {
        $news = News::orderBy('publication_date', 'desc')->paginate(4);
        return view('home', compact('news'));
    }

    public function manage(): View|\Illuminate\Foundation\Application|Factory|Application
    {
        $news = News::orderBy('publication_date', 'desc')->get();
        return view('manage', compact('news'));
    }

    public function show($id): View|\Illuminate\Foundation\Application|Factory|Application
    {
        $newsItem = News::findOrFail($id);
        return view('show', compact('newsItem'));
    }

    public function delete($id): RedirectResponse
    {
        $newsItem = News::findOrFail($id);
        $newsItem->delete();

        return redirect()->route('news.manage')->with('success', 'News deleted successfully');
    }

    public function editForm($id): View|\Illuminate\Foundation\Application|Factory|Application
    {
        $newsItem = News::findOrFail($id);
        return view('edit', compact('newsItem'));
    }

    public function edit(Request $request, $id): RedirectResponse
    {
        $newsItem = News::findOrFail($id);
        $newsItem->update([
            'title' => $request->input('title'),
            'description' => $request->input('description'),
            'publication_date' => Carbon::createFromFormat('Y-m-d', $request->input('pub-date')),
            'image' => $request->input('image'),
        ]);

        return redirect()->route('news.edit.form', $id)
            ->with('success', 'News updated successfully');
    }
}
