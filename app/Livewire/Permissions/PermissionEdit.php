<?php

namespace App\Livewire\Permissions;

use Livewire\Component;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class PermissionEdit extends Component
{
    public Permission $permission;
    public string $name;
    public array $allRoles = [];
    public array $selectedRoles = [];

    public function mount(Permission $permission)
    {
        $this->permission = $permission;
        $this->name = $permission->name;
        $this->allRoles = Role::pluck('name')->toArray();
        $this->selectedRoles = $permission->roles->pluck('name')->toArray();
    }

    protected function rules()
    {
        return [
            'name' => ['required', 'string', 'unique:permissions,name,' . $this->permission->id],
            'selectedRoles' => ['array'],
            'selectedRoles.*' => ['string', 'exists:roles,name'],
        ];
    }

    public function updatePermission()
    {
        $this->validate();

        $this->permission->update(['name' => $this->name]);

        $this->permission->syncRoles($this->selectedRoles);

        session()->flash('message', 'Permission updated successfully');

        $this->reset(['name', 'selectedRoles']);

        return to_route('permissions.index');
    }
    public function render()
    {
        return view('livewire.permissions.permission-edit');
    }
}
