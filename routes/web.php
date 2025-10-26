<?php

use App\Livewire\Permissions\PermissionCreate;
use App\Livewire\Permissions\PermissionEdit;
use App\Livewire\Permissions\PermissionIndex;
use App\Livewire\Roles\RoleCreate;
use App\Livewire\Roles\RoleEdit;
use App\Livewire\Roles\RoleIndex;
use Laravel\Fortify\Features;
use App\Livewire\Posts\PostEdit;
use App\Livewire\Users\UserEdit;
use App\Livewire\Posts\PostIndex;
use App\Livewire\Users\UserIndex;
use App\Livewire\Posts\PostCreate;
use App\Livewire\Settings\Profile;
use App\Livewire\Users\UserCreate;
use App\Livewire\Settings\Password;
use App\Livewire\Settings\TwoFactor;
use App\Livewire\Settings\Appearance;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
})->name('home');

Route::view('dashboard', 'dashboard')
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

Route::middleware(['auth'])->group(function () {
    Route::redirect('settings', 'settings/profile');

    Route::get('settings/profile', Profile::class)->name('profile.edit');
    Route::get('settings/password', Password::class)->name('user-password.edit');
    Route::get('settings/appearance', Appearance::class)->name('appearance.edit');

    Route::get('settings/two-factor', TwoFactor::class)
        ->middleware(
            when(
                Features::canManageTwoFactorAuthentication()
                    && Features::optionEnabled(Features::twoFactorAuthentication(), 'confirmPassword'),
                ['password.confirm'],
                [],
            ),
        )
        ->name('two-factor.show');

    Route::get('users', UserIndex::class)->name('users.index');
    Route::get('users/create', UserCreate::class)->name('users.create');
    Route::get('users/{user}/edit', UserEdit::class)->name('users.edit');

    Route::get('posts', PostIndex::class)->name('posts.index');
    Route::get('posts/create', PostCreate::class)->name('posts.create');
    Route::get('posts/{post}/edit', PostEdit::class)->name('posts.edit');

    Route::get('roles', RoleIndex::class)->name('roles.index');
    Route::get('roles/create', RoleCreate::class)->name('roles.create');
    Route::get('roles/{role}/edit', RoleEdit::class)->name('roles.edit');

    Route::get('permissions', PermissionIndex::class)->name('permissions.index');
    Route::get('permissions/create', PermissionCreate::class)->name('permissions.create');
    Route::get('permissions/{permission}/edit', PermissionEdit::class)->name('permissions.edit');
});
