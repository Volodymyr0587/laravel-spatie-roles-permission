<div>
    <flux:heading size="xl">Role Update</flux:heading>
    <flux:subheading size="lg">Update role {{ $role->name }}</flux:subheading>
    <flux:separator class="my-4" />
    <section class="w-full">

        <form wire:submit="updateRole" class="flex flex-col gap-6">
            <!-- Name -->
            <flux:input name="name" wire:model="name" :label="__('Name')" type="text" autofocus autocomplete="name"
                :placeholder="__('Role name')" class="w-md" />

            <!-- Permissions -->
            <flux:checkbox.group wire:model="selectPermission" label="Permissions" class="flex flex-wrap space-x-4">
                <flux:checkbox.all label="Check all" />
                <flux:separator class="my-2" />
                @foreach ($allPermissions as $permission)
                    <div class="bg-gray-50 dark:bg-neutral-900 dark:text-gray-400 rounded-md px-3 py-1 mb-2">
                        <flux:checkbox label="{{ $permission->name }}" value="{{ $permission->name }}" />
                    </div>
                @endforeach
            </flux:checkbox.group>

            <div class="mt-6 flex items-center">
                <flux:button type="submit" variant="primary" class=" cursor-pointer">
                    Update Role
                </flux:button>
            </div>
        </form>
    </section>
</div>

