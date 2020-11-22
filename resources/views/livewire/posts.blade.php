<div>
    <h1 class="text-3xl">Posts</h1>
 
      @error('titlePost') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
      @error('bodyPost') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
    <div>
        @if (session()->has('message'))
        <div class="p-3 bg-green-300 text-green-800 rounded shadow-sm">
            {{ session('message') }}
        </div>
        @endif
    </div>
 


    <form class="my-4 flex" wire:submit.prevent="addPost">
        <div class="w-full sm-col-12">     
        <input type="text" class="w-48 rounded border shadow p-2 mr-2 my-2" placeholder="Title..."
               wire:model.debounce.500ms="titlePost">
             
        <input type="text" class="w-full rounded border shadow p-2 mr-2 my-2" placeholder="Post Body."
               wire:model.debounce.500ms="bodyPost">
           
        <div class="py-2">
            <button type="submit" class="p-2 bg-blue-500 w-20 rounded shadow text-white">Add</button>
         </div>
         </div>
    </form>
    @foreach($posts as $post)
    <div class="rounded border shadow p-3 my-2 sm-col-12">
        <div class="flex justify-between my-2">
            <div class="flex">
                <p class="font-bold text-lg">{{$post->title}} </p>
                <p class=" text-lg"> &nbsp;by&nbsp; {{$post->name}} </p>


                <p class="mx-3 py-1 text-xs text-gray-500 font-semibold">{{ Carbon\Carbon::parse($post->created_at)->diffForHumans() }}
                </p>
            </div>
            <i class="fal fa-edit text-red-200 hover:text-green-600 cursor-pointer"
               wire:click="edit({{$post->id}})" ></i>

            <i class="fas fa-times text-red-200 hover:text-red-600 cursor-pointer"
               wire:click="remove({{$post->id}})"></i>
        </div>
        <p class="text-gray-800">{{$post->body}}</p>

    </div>
    @endforeach

    {{$posts->links('pagination-links')}}
</div>

