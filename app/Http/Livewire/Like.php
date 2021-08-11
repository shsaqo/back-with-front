<?php

namespace App\Http\Livewire;

use App\Models\Comment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Livewire\Component;

class Like extends Component
{
    public $liked;
    public $likeCount;
    public $productId;

    public function increment(Request $request)
    {
        $ip = DB::table('ip_addresses')->where([['like', $request->ip()], ['comment_id', $this->productId]])->first();
        if (!$ip) {
            DB::table('ip_addresses')->insert(['like' => $request->ip(), 'comment_id' => $this->productId]);
            Comment::where('id', $this->productId)->increment('like');
            $this->likeCount++;
            $this->liked = false;
        } else {
            DB::table('ip_addresses')->where([['like', $request->ip()], ['comment_id', $this->productId]])->delete();
            Comment::where('id', $this->productId)->decrement('like');
            $this->likeCount--;
            $this->liked = true;
        }

    }

    public function mount(Request $request, $productId)
    {
        $this->productId = $productId;
        $this->likeCount = Comment::where('id', $productId)->first()->like;
        $this->liked = DB::table('ip_addresses')->where([['like', $request->ip()], ['comment_id', $productId]])->first() ? false : true;
    }


    public function render()
    {
        return view('livewire.like');
    }
}
