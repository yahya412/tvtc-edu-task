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

    public $newPost;
    public $titlePost;
    public $bodyPost;
    public $userPost;
   
    public function updated($field)
    {
        $this->validateOnly($field, ['titlePost' => 'required|max:255']);
    }

    public function addPost()
    {
        $this->userPost = Auth::id(); 

        $this->validate(['titlePost' => 'required|max:255',
                         'bodyPost'  => 'required|max:255' 
                         ]);
      
        $createdPost = Post::create([
            'title'=>$this->titlePost,
            'body'=> $this->bodyPost,
            'user_id' =>$this->userPost,
           
            
        ]);
        $this->titlePost = '';
       $this->bodyPost = '';
       
        session()->flash('message', 'Post added successfully 😁');
    }

    
    public function remove($postId)
    {
        
        $post = Post::find($postId);
   
        $post->delete();
        session()->flash('message', 'Post deleted successfully 😊');
    }

    public function render()
    {
            
        $gender=User::find(Auth::id());
//        dd($gender);
        //where('support_ticket_id', $this->ticketId)->
//        return view('livewire.posts', [
//            'posts' => Post::latest()->paginate(10),
//        ]); 
       $posts=DB::table('posts')->join('users','posts.user_id','=','users.id')
               ->where('users.gender',$gender->gender)
             ->orderby('posts.created_at','desc')
               ->paginate(10);
//       dd($posts);
        return view('livewire.posts', [
            'posts' => $posts,
        ]);
    }
}
