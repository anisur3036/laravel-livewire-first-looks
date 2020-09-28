<div class="flex justify-center">
    <div class="w-6/12">
        <h1 class="my-10 text-3xl">Comments</h1>
        <form wire:submit.prevent="addComment">
            @if ($photo)
                Photo Preview:
                <img src="{{ $photo->temporaryUrl() }}" width="100">
            @endif

            <input type="file" wire:model="photo">

            @error('photo') <span class="error">{{ $message }}</span> @enderror
            @error('newComment') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
            <div>
                @if (session()->has('message'))
                    <div class="text-green-500 text-semibold">
                        {{ session('message') }}
                    </div>
                @endif
            </div>
            <div class="my-4 flex">
                <input type="text" 
                    name="body"
                    class="w-full rounded border shadow p-2 mr-2 my-2" 
                    placeholder="What's in your mind."
                    wire:model.lazy="newComment"
                >
                <div class="py-2">
                    <button type="submit" class="p-2 bg-blue-500 w-20 rounded shadow text-white">Add</button>
                </div>
            </div>
        </form>
        @foreach( $comments as $comment )
        <div class="rounded border shadow p-3 my-2">
            <div class="flex justify-between">
                <div class="flex justify-start my-2">
                    <p class="font-bold text-lg">{{ $comment->creator->name }}</p>
                    <p class="mx-3 py-1 text-xs text-gray-500 font-semibold">{{ $comment->created_at->diffForHumans() }}</p>
                </div>
                <svg wire:click="remove({{$comment->id}})" fill="none" class="w-4 cursor-pointer text-red-600" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" stroke="currentColor" viewBox="0 0 24 24"><path d="M6 18L18 6M6 6l12 12"></path></svg>
            </div>
            <p class="text-gray-800">{{ $comment->body }}</p>
        </div>
        @endforeach
        {{ $comments->links() }}
    </div>
</div>