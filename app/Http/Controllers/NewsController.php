<?php

namespace App\Http\Controllers;

use App\Models\News;
use App\Models\Sdgs;
use Illuminate\Http\Request;

class NewsController extends Controller
{
    public function index(Request $request)
    {
        // Ambil nilai filter dari request (URL)
        $search = $request->input('search');
        $selectedYear = $request->input('year');
        $selectedSdgs = $request->input('sdgs', []);

        $newsQuery = News::query()
            ->whereNotNull('published_at')
            ->when($search, function ($query, $search) {
                return $query->where('title', 'like', '%' . $search . '%');
            })
            ->when($selectedYear, function ($query, $year) {
                return $query->whereYear('published_at', $year);
            })
            ->when(!empty($selectedSdgs), function ($query) use ($selectedSdgs) {
                return $query->whereHas('sdgs', function ($subQuery) use ($selectedSdgs) {
                    $subQuery->whereIn('sdgs.id', $selectedSdgs);
                });
            });
        $currentYear = date('Y');
        $years = range($currentYear, $currentYear - 4);
        $news = $newsQuery->latest('published_at')->paginate(8);

        return view('news.index', [
            'news' => $news,
            'sdgs' => Sdgs::orderBy('code')->get(),
            'years' => $years,
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
