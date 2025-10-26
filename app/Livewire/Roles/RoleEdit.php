<?php

namespace App\Livewire\Roles;

use Livewire\Component;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RoleEdit extends Component
{
    public Role $role;
    public string $name;
    public array $allPermissions = [];
    public array $selectPermission = [];

    public function mount(Role $role)
    {
        $this->role = $role;
        $this->name = $role->name;
        $this->selectPermission = $role->permissions->pluck('name')->toArray();
        $this->allPermissions = Permission::pluck('name')->toArray();
    }

    protected function rules()
    {
        return [
            'name' => ['required', 'string', 'unique:roles,name,' . $this->role->id],
            'selectPermission' => ['array'],
            'selectPermission.*' => ['string', 'exists:permissions,name'],
        ];
    }

    public function updateRole()
    {
        $this->validate();

        $this->role->update(['name' => $this->name]);
        $this->role->syncPermissions($this->selectPermission);

        session()->flash('message', 'Role updated successfully');

        $this->reset(['name', 'selectPermission']);

        return to_route('roles.index');
    }

    public function render()
    {
        return view('livewire.roles.role-edit');
    }
}
