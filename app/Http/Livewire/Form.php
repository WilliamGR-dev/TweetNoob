<?php

namespace App\Http\Livewire;

use Livewire\Component;

class Form extends Component
{
    public $body;

    public function createPost(){

        $this->validate(['body' => 'required|min:6']);

        $post = auth()->user()->posts()->create(['body' => $this->body]);

//        $this->emit('postAdded', $post->id);

        $this->body = "";
    }

    public function render()
    {
        return view('livewire.form');
    }
}
