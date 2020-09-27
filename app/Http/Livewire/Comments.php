<?php

namespace App\Http\Livewire;

use App\Comment;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Livewire\Component;

class Comments extends Component
{

    public $newComment;

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
        $this->comments = $this->comments->except($id);
        session()->flash('message', 'Comment deleted... 😠');
    }

    public function addComment()
    {
        $this->validate([
            'newComment' => 'required|min:3|max:255',
        ]);
        $createdComment = Comment::create(['body' => $this->newComment, 'user_id' => 1]);
        $this->comments->prepend($createdComment);
        $this->newComment = "";
        session()->flash('message', 'Comment added... 😃');
    }

    public function render()
    {
        $comments = Comment::latest()->paginate(3);
        return view('livewire.comments', compact('comments'));
    }
}
