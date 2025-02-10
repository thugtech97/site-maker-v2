<?php

namespace App\Livewire\User;

use App\Models\User;
use Livewire\Component;
use Livewire\WithPagination;

class UserList extends Component
{
    use WithPagination;
    public function render()
    {
        $users = User::paginate(5);

        return view('livewire.user.user-list', ['users' => $users]);
    }
}
