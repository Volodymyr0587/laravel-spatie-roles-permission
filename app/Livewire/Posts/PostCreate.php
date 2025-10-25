<?php

namespace App\Livewire\Posts;

use App\Models\Post;
use Livewire\Component;

class PostCreate extends Component
{
    public string $title;
    public string $content;

    protected function rules(): array
    {
        return [
            'title' => ['required', 'string', 'max:255'],
            'content' => ['required', 'string', 'max:1000'],
        ];
    }

    public function createPost()
    {
        $this->validate();

        auth()->user()->posts()->create([
            'title' => $this->title,
            'content' => $this->content,
        ]);

        session()->flash('message', 'Post created successfully');

        $this->reset(['title', 'content']);

        return to_route('posts.index');
    }
    public function render()
    {
        return view('livewire.posts.post-create');
    }
}
