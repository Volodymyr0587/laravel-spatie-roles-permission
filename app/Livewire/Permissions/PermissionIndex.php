<?php

namespace App\Livewire\Permissions;

use Livewire\Component;
use Livewire\WithPagination;
use Spatie\Permission\Models\Permission;

class PermissionIndex extends Component
{
    use WithPagination;

    public function deletePermission($permissionId)
    {
        $permission = Permission::findOrFail($permissionId);
        $permission->delete();
    }

    public function paginationView()
    {
        return 'pagination.custom-tailwind';
    }

    public function render()
    {
        $permissions = Permission::paginate(10);
        return view('livewire.permissions.permission-index', ['permissions' => $permissions]);
    }
}
