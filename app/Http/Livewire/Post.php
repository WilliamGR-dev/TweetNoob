<?php

namespace App\Http\Livewire;

use App\Models\Like;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Livewire\Component;

class Post extends Component
{
    public $post;
    public $isliked;
    public $howManyLiked;

    public function mount($post)
    {
        $this->post = $post;
        $this->isliked[$post->id] = Like::where('user_id', auth()->user()->getAuthIdentifier())->where('post_id', $post->id)->first();
        $this->howManyLiked[$post->id] = count(Like::where('post_id', $post->id)->get());
    }


    public function deleteHeart(Request $request){
        $idSelected = json_decode($request->getContent())->serverMemo->dataMeta->models->post->id;
        $userId = auth()->user()->id;

        DB::table('likes')->where('user_id', $userId)->where('post_id', $idSelected)->delete();
//
//        $this->emit('likeAdded', $post->post_id);

        $this->isliked[$idSelected] = false;
        $this->howManyLiked[$idSelected] = count(Like::where('post_id', $idSelected)->get());

    }

    public function addHeart(Request $request){
        $idSelected = json_decode($request->getContent())->serverMemo->dataMeta->models->post->id;
        $userId = auth()->user()->id;

        $post = auth()->user()->likes()->create(['post_id' => $idSelected, 'user_id' => $userId]);

//        $this->emit('likeAdded', $post->post_id);

        $this->isliked[$idSelected] = true;
        $this->howManyLiked[$idSelected] = count(Like::where('post_id', $idSelected)->get());

    }

    public function render()
    {
        return view('livewire.post');
    }
}
