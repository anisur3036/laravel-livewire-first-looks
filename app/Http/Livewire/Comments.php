<?php

namespace App\Http\Livewire;

use Livewire\Component;

class Comments extends Component
{
		public function add()
		{
			return request();
		}
		
    public function render()
    {
        return view('livewire.comments');
    }
}
