<?php

namespace App\Livewire\Users;

use App\Models\User;
use Illuminate\Validation\Rule;
use Livewire\Component;

class UserEdit extends Component
{
    public User $user;
    public string $name = '';
    public string $email = '';
    public string|null $password = null;

    protected function rules(): array
    {
        return [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'email', 'max:255', Rule::unique('users', 'email')->ignore($this->user)],
            'password' => ['sometimes', 'nullable', 'string', 'min:8'],
        ];
    }

    public function mount(User $user)
    {
        $this->user = $user;
        $this->name = $user->name;
        $this->email = $user->email;
    }

    public function updateUser()
    {
        $this->validate();

        $this->user->update([
            'name' => $this->name,
            'email' => $this->email,
            'password' => empty($this->password) ? $this->user->password : bcrypt($this->password),
        ]);

        session()->flash('message', 'User updated successfully');

        $this->reset(['name', 'email', 'password']);

        return to_route('users.index');
    }
    public function render()
    {
        return view('livewire.users.user-edit');
    }
}
