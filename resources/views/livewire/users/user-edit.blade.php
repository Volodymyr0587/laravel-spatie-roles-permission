<div>
    <flux:heading size="xl">User Edit</flux:heading>
    <flux:subheading size="lg">Edit user {{ $user->name }}</flux:subheading>
    <flux:separator class="my-4" />
    <section class="w-full md:w-1/2 lg:w-1/3">

        <form wire:submit="updateUser" class="flex flex-col gap-6">
            <!-- Name -->
            <flux:input name="name" wire:model="name" :label="__('Name')" type="text" autofocus autocomplete="name"
                :placeholder="__('Full name')" />

            <!-- Email -->
            <flux:input name="email" wire:model="email" :label="__('Email')" type="email" autocomplete="email"
                :placeholder="__('email@example.com')" />

            <!-- Password -->
            <flux:input name="password" wire:model="password" :label="__('Password')" type="password" autocomplete="new-password"
                :placeholder="__('Password')" viewable />

            <div class="flex items-center justify-end">
                <flux:button type="submit" variant="primary" class="w-full cursor-pointer">
                    Update User
                </flux:button>
            </div>
        </form>
    </section>
</div>
