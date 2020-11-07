

<div>
    <input wire:model="search" type="text" placeholder="Search posts by title...">

    <h1>Search Results:</h1>

    <ul>
        @foreach($Posts as $post)
            <li>{{ $post->title }}</li>
        @endforeach
    </ul>
</div>


