<?php

namespace App\Http\Livewire;

use App\Models\Regional;
use App\Models\RegionalLocation;
use Livewire\WithPagination;
use Livewire\Component;

class RegionalTable extends Component
{
    use WithPagination;

    protected $regionals;
    public $rlocations;
    public $search = null;

    public function updating()
    {
        $this->resetPage();
    }

    public function updated()
    {
        $this->resetPage();
    }

    public function render()
    {
        $this->rlocations = RegionalLocation::orderBy('name')->get();
        $this->regionals = !is_null($this->search) ? Regional::search($this->search)->orderBy('name')->paginate(5) : Regional::orderBy('name')->paginate(5);

        return view('livewire.regional-table', [
            'regionals' => $this->regionals,
        ]);
    }
}
