<?php

namespace App\Livewire\Roles;

use Livewire\Component;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RoleCreate extends Component
{
    public string $name;
    public array $allPermissions = [];
    public array $selectPermission = [];

    public function mount()
    {
        $this->allPermissions = Permission::pluck('name')->toArray();
    }

    protected function rules()
    {
        return [
            'name' => ['required', 'string', 'unique:roles,name'],
            'selectPermission' => ['array'],
            'selectPermission.*' => ['string', 'exists:permissions,name'],
        ];
    }

    public function createRole()
    {
        $this->validate();

        $role = Role::create(['name' => $this->name]);
        $role->syncPermissions($this->selectPermission);

        session()->flash('message', 'Role created successfully');

        $this->reset(['name', 'selectPermission']);

        return to_route('roles.index');
    }

    public function render()
    {
        return view('livewire.roles.role-create');
    }
}
