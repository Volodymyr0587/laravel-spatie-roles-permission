<div>
    <flux:heading size="xl">Post Edit</flux:heading>
    <flux:subheading size="lg">Edit post - "{{ $post->title }}"</flux:subheading>
    <flux:separator class="my-4" />
    <section class="w-full md:w-1/2 lg:w-1/3">

        <form wire:submit="updatePost" class="flex flex-col gap-6">
            <!-- Title -->
            <flux:input name="title" wire:model="title" :label="__('Title')" type="text" autofocus autocomplete="title"
                :placeholder="__('Title')" />

            <!-- Content -->
            <flux:textarea name="content" wire:model="content" :label="__('Post content')"
                rows="6"
                placeholder="No lettuce, tomato, or onion..."
            />

            <div class="flex items-center justify-end">
                <flux:button type="submit" variant="primary" class="w-full cursor-pointer">
                    Update Post
                </flux:button>
            </div>
        </form>
    </section>
</div>


