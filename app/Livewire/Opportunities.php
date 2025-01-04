<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Item;

class Opportunities extends Component
{
    use WithPagination;

    public $search = '';
    public $perPage = 20; // Default number of items per page
    public $options = [20, 50, 100, 250]; // Options for items per page
    public $column = 'ID';
    public $direction = 'asc';

    protected $queryString = ['perPage']; // Keep perPage in the URL

    public function search()
    {
        $this->resetPage();
    }

    public function updatingPerPage()
    {
        $this->resetPage(); // Reset to the first page when perPage changes
    } 

    public function sort($c)
    {
        $this->column = $c;
        
        $this->direction = $this->column === $c
            ? ($this->direction === 'asc' ? 'desc' : 'asc')
            : 'asc';
    }

    public function render()
    {
        $items = Item::query()
            ->when($this->search, fn($query) => 
                $query->where('name', 'like', '%' . $this->search . '%'))
            ->orderBy($this->column, $this->direction)
            ->paginate($this->perPage);

        return view('livewire.opportunities', [
            'items' => $items
        ]);
    }
}
