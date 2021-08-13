<?php

namespace App\Http\Livewire;

use App\Models\National;
use Livewire\Component;
use Livewire\WithPagination;

class NationalTable extends Component
{
    use WithPagination;

    protected $nationals;
    public $search = null;

    public function render()
    {
        $this->nationals = !is_null($this->search) ? National::search($this->search)->orderBy('lname')->paginate(5) : National::orderBy('lname')->paginate(5);

        return view('livewire.national-table', [
            'nationals' => $this->nationals,
        ]);

    }
}
