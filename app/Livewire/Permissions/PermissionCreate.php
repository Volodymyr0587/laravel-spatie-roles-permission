<?php

namespace App\Livewire\Permissions;

use Livewire\Component;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class PermissionCreate extends Component
{
    public string $name;
    public array $allRoles = [];
    public array $selectedRoles = [];

    public function mount()
    {
        $this->allRoles = Role::pluck('name')->toArray();
    }

    protected function rules()
    {
        return [
            'name' => ['required', 'string', 'unique:permissions,name'],
            'selectedRoles' => ['array'],
            'selectedRoles.*' => ['string', 'exists:roles,name'],
        ];
    }

    public function createPermission()
    {
        $this->validate();

        $permission = Permission::create(['name' => $this->name]);

        $permission->syncRoles($this->selectedRoles);

        session()->flash('message', 'Permission created successfully');

        $this->reset(['name', 'selectedRoles']);

        return to_route('permissions.index');
    }

    public function render()
    {
        return view('livewire.permissions.permission-create');
    }
}
