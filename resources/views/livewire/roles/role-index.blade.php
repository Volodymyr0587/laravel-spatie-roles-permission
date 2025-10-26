<div class="p-6 w-full">

    <div class="flex justify-between mb-4">
        <div>
            <flux:heading size="xl">Roles Index</flux:heading>
            <flux:subheading size="lg">List of all roles</flux:subheading>
        </div>
        <div>
            <flux:button href="{{ route('roles.create') }}" icon:trailing="arrow-up-right">
                New Role
            </flux:button>
        </div>
    </div>

    <flux:separator class="my-4" />

    <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
        <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-neutral-900 dark:text-gray-400">
                <tr>
                    <th scope="col" class="px-6 py-3">
                        ID
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Name
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Actions
                    </th>
                </tr>
            </thead>
            <tbody>
                @foreach ($roles as $role)
                    <tr class="bg-white dark:bg-neutral-900 border-y border-amber-300">
                        <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                           {{ $role->id }}
                        </th>
                        <td class="px-6 py-4">
                            {{ $role->name }}
                        </td>
                        <td class="px-6 py-4">
                            <flux:button href="{{ route('roles.edit', $role->id) }}" size="sm" variant="primary" color="green" icon:trailing="pencil">
                            </flux:button>
                            <flux:button wire:click="deleteRole({{ $role->id }})" size="sm" variant="danger"
                                wire:confirm="Are you sure you want to delete this role?" color="red"
                                icon:trailing="trash" class="cursor-pointer">
                            </flux:button>
                        </td>
                    </tr>

                @endforeach
            </tbody>
        </table>

        <div class="p-10">
            {{ $roles->links() }}
        </div>
    </div>

</div>
