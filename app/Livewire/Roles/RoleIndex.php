<?php

namespace App\Livewire\Roles;

use Livewire\Component;
use Livewire\WithPagination;
use Spatie\Permission\Models\Role;

class RoleIndex extends Component
{
    use WithPagination;

    public function deleteRole($roleId)
    {
        $role = Role::findOrFail($roleId);
        $role->delete();
    }
    public function render()
    {
        $roles = Role::paginate(10);

        return view('livewire.roles.role-index', ['roles' => $roles]);
    }
}
