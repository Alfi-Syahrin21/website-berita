<?php
namespace App\Http\Controllers;

use App\Models\News;
use App\Models\Sdgs;
class NewsController extends Controller
{
    public function index()
    {
        $allNews = News::whereNotNull('published_at')->latest()->paginate(5); 
        
        $sdgs = Sdgs::orderBy('code')->get();

        return view('news.index', [
            'news' => $allNews,
            'sdgs' => $sdgs,
        ]);
    }

    public function show(News $news)
    {

        $otherNews = News::where('id', '!=', $news->id)
                        ->inRandomOrder()
                        ->limit(3)
                        ->get();

        $breadcrumbs = [
            ['name' => 'Activities', 'url' => '#'],
            ['name' => 'News', 'url' => route('news.index')],
            ['name' => $news->title, 'url' => null]
        ];

        return view('news.show', [
            'news' => $news,
            'otherNews' => $otherNews,
            'breadcrumbs' => $breadcrumbs,
        ]);
    }
}