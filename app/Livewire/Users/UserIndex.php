<?php

namespace App\Livewire\Users;

use App\Models\User;
use Livewire\Component;

class UserIndex extends Component
{
    public function deleteUser($userId)
    {
        $user = User::findOrFail($userId);
        $user->delete();
    }
    public function render()
    {
        $users = User::paginate(3);
        return view('livewire.users.user-index', ['users' => $users]);
    }
}
