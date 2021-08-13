<?php

namespace App\Http\Livewire;

use App\Models\User;
use Livewire\Component;
use Livewire\WithPagination;

class UserTable extends Component
{
    use WithPagination;

    protected $users;
    public $search = null;

    public function render()
    {
        $this->users = !is_null($this->search) ? User::search($this->search)->orderBy('admin')->orderBy('email_verified_at')->paginate(5) : User::orderBy('admin')->orderBy('email_verified_at')->paginate(5);

        return view('livewire.user-table', [
            'users' => $this->users,
        ]);

    }
}
