<?php

namespace App\Livewire\Roles;

use Livewire\Component;
use Spatie\Permission\Models\Role;

class RoleIndex extends Component
{
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
