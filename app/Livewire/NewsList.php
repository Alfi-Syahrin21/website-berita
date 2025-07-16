<?php

namespace App\Livewire;

use App\Models\News;
use App\Models\Sdgs;
use Livewire\Component;
use Livewire\WithPagination;

class NewsList extends Component
{
    use WithPagination;
    public $search = '';
    public $selectedYear = '';
    public $selectedSdgs = [];

    protected $paginationTheme = 'bootstrap';
    public function mount()
    {
        $this->selectedYear = date('Y'); 
    }
    public function updated($property)
    {
        if (in_array($property, ['search', 'selectedYear', 'selectedSdgs'])) {
            $this->resetPage();
        }
    }

    public function render()
    {
        $newsQuery = News::query()
            ->whereNotNull('published_at')
            ->when($this->search, function ($query) {
                $query->where('title', 'like', '%' . $this->search . '%');
            })
            ->when($this->selectedYear, function ($query) {
                $query->whereYear('published_at', $this->selectedYear);
            })
            ->when($this->selectedSdgs, function ($query) {
                foreach ($this->selectedSdgs as $sdgId) {
                    $query->whereHas('sdgs', function ($subQuery) use ($sdgId) {
                        $subQuery->where('sdgs.id', $sdgId);
                    });
                }
            });
        $currentYear = date('Y');
        $years = range($currentYear, $currentYear - 4);

        return view('livewire.news-list', [
            'news' => $newsQuery->latest('published_at')->paginate(5),
            'sdgs' => Sdgs::orderBy('code')->get(),
            'years' => $years,
        ]);
    }
}
