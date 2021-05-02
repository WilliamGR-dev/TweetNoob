<?php

namespace App\Http\Livewire;

use App\Models\Like;
use App\Models\Post;
use Livewire\Component;
use Livewire\WithPagination;

class Posts extends Component
{
    use WithPagination;

//    protected $listeners = ['postAdded' , 'likeAdded'];
    protected $listeners = ['echo:posts,PostAdded' => "postAdded"];
    protected $paginationTheme = 'bootstrap';
//    public $posts;

     public function postAdded($post)
         {
             Post::latest()->paginate(2)->prepend(Post::find($post['id']));
             session()->flash('status', "Post crée");
         }

//    public function postAdded($id)
//    {
//        Post::latest()->paginate(2)->prepend(Post::find($id));
//        session()->flash('status', 'Post crée');
//    }

    public function likeAdded($id)
    {
        Post::latest()->paginate(2);
    }

//    public function mount(){
//        $this->posts = Post::latest()->get();
//    }

    public function render()
    {
        $posts = Post::latest()->paginate(2);
        return view('livewire.posts' , compact('posts'));
        return view('livewire.posts');
    }
}
