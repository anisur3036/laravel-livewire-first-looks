<?php

namespace App\Http\Livewire;

use App\Comment;
use Livewire\Component;
use Livewire\WithFileUploads;
use Livewire\WithPagination;

class Comments extends Component
{
    use WithPagination;
    use WithFileUploads;

    public $newComment;

    public $photo;

    public function updatedPhoto()
    {
        $this->validate([
            'photo' => 'image|max:1024',
        ]);
    }

    public function updated($field)
    {
        $this->validateOnly($field, [
            'newComment' => 'required|min:3|max:255',
        ]);
    }

    public function remove($id)
    {
        $comment = Comment::find($id);
        $comment->delete();
        session()->flash('message', 'Comment deleted... 😠');
    }

    public function addComment()
    {
        $this->validate([
            'newComment' => 'required|min:3|max:255',
        ]);
        $createdComment = Comment::create(['body' => $this->newComment, 'user_id' => 1]);
        $this->newComment = "";
        session()->flash('message', 'Comment added... 😃');
    }

    public function render()
    {
        $comments = Comment::latest()->paginate(10);
        return view('livewire.comments', compact('comments'));
    }
}
