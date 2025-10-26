<?php

namespace App\Livewire\Posts;

use App\Models\Post;
use Livewire\Component;
use Livewire\WithPagination;

class PostIndex extends Component
{
    use WithPagination;

    public function deletePost($postId)
    {
        $post = Post::findOrFail($postId);
        $post->delete();
    }
    public function render()
    {
        $posts = Post::with('user')->paginate(3);
        return view('livewire.posts.post-index', ['posts' => $posts]);
    }
}
