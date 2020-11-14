<?php

namespace App\Http\Livewire;

use App\Models\Post;
use App\Models\User;
use Livewire\Component;
use Illuminate\Support\Str;
use Livewire\WithPagination;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\ImageManagerStatic;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class Posts extends Component {

    use WithPagination;

    public $post;
    public $titlePost;
    public $bodyPost;
    public $userPost;
    public $userPostname;
    public $postId;
    public $idPost;

//    public function updated($field) {
//        $this->validateOnly($field, ['titlePost' => 'required|max:255']);
//    }
//public function mount($post)
//    {
//        $this->post = null;
//
//        if ($post) {
//            $this->post = $post;
//
//            $this->titlePost = $this->post->title;
//            $this->bodyPost = $this->post->body;
//            $this->user_id=$this->post->user_id;
//        }
//    }
//    
    public function addPost() {
        $this->userPost = Auth::id();
        $this->validate(['titlePost' => 'required|max:255',
            'bodyPost' => 'required|max:255'
        ]);


        $post = [
        
        'title' => $this->titlePost,
        'body' => $this->bodyPost,
        'user_id' => $this->userPost,
        ];


        if ($this->post) {
//            dd($this->post);
            Post::find($this->post->id)
                    ->update($post);
           session()->flash('message', 'Post updated successfully');
        } else {
            Post::create($post);
            session()->flash('message', 'Post added successfully');
        }

//        $createdPost = Post::updateOrCreate([
//                    'title' => $this->titlePost,
//                    'body' => $this->bodyPost,
//                    'user_id' => $this->userPost,
//        ]);
        $this->titlePost = '';
        $this->bodyPost = '';
        
    }

    public function updateorcreate($postId) {
        if (is_null($postId)) {
            $this->userPost = Auth::id();
            $this->validate(['titlePost' => 'required|max:255',
                'bodyPost' => 'required|max:255'
            ]);
            $createdPost = Post::updateOrCreate([
                        'title' => $this->titlePost,
                        'body' => $this->bodyPost,
                        'user_id' => $this->userPost,
            ]);
            $this->titlePost = '';
            $this->bodyPost = '';
            session()->flash('message', 'Post added successfully');
        } else {
            $post = Post::find($postId);
            $this->titlePost = $post->title;
            $this->bodyPost = $post->body;
            $this->userPost = Auth::id();
        }
    }

    public function edit($postId) {
        $this->post = Post::find($postId);
        
        $this->titlePost = $this->post->title;
        $this->bodyPost = $this->post->body;
        $this->userPost = Auth::id();
        $this->render();
//        $post->title = $this->titlePost;
//        $post->body = $this->bodyPost;
//        $post->user_id = $this->userPost;
        

//        session()->flash('message', 'Post edited successfully');
    }

    public function remove($postId) {

        $post = Post::find($postId);

        $post->delete();
        session()->flash('message', 'Post deleted successfully ');
    }

    public function render() {

        $gender = User::find(Auth::id());
//        $userPostName = User::find();
//        dd($userPostName);
//        dd($gender);
        //where('support_ticket_id', $this->ticketId)->
//        return view('livewire.posts', [
//            'posts' => Post::latest()->paginate(10),
//        ]); 
        $posts = DB::table('posts')->join('users', 'posts.user_id', '=', 'users.id')
                ->where('users.gender', $gender->gender)
                ->select('posts.*', 'users.name')
                ->orderby('posts.created_at', 'desc')
                ->paginate(10);
//       dd($posts);
        return view('livewire.posts', [
            'posts' => $posts,
        ]);
    }

}
