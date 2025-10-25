<?php

namespace App\Livewire\Posts;

use App\Models\Post;
use Livewire\Component;

class PostEdit extends Component
{
    public Post $post;
    public string $title;
    public string $content;

    protected function rules(): array
    {
        return [
            'title' => ['required', 'string', 'max:255'],
            'content' => ['required', 'string', 'max:1000'],
        ];
    }

    public function mount(Post $post)
    {
        $this->post = $post;
        $this->title = $post->title;
        $this->content = $post->content;
    }

    public function updatePost()
    {
        $this->validate();

        $this->post->update([
            'title' => $this->title,
            'content' => $this->content,
        ]);

        session()->flash('message', 'Post updated successfully');

        $this->reset(['title', 'content']);

        return to_route('posts.index');
    }
    public function render()
    {
        return view('livewire.posts.post-edit');
    }
}
