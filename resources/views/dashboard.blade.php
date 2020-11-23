<style>
    .div-men {
        background-color: lightskyblue;
        padding-bottom: 150px;
        color:darkblue;
    }
    
    .div-women {
    	background-color: lightpink;
         padding-bottom: 150px;
         color: red;
    }
    
    
</style>
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>



    <div class="raw">
        
        <div class="col-xs-12 col-sm-6 col-md-6">

            @if(Auth::user()->gender == "1")
            <h2>Men only</h2>
            <p class="div-men"> Dear gentlemen, I feel glad to call you people my family. Getting to celebrate this unique day with you is nothing but a pure blessing from the Lord. Happy family day.</p>
            @elseif(Auth::user()->gender == "2")
            <h2>Women only</h2>
            <p class="div-women">Dear Ladies, I feel glad to call you people my family. Getting to celebrate this unique day with you is nothing but a pure blessing from the Lord. Happy family day.</p>
            @endif
        </div>
        
        <div class="col-xs-12 col-sm-6 col-md-6">
            <livewire:posts />
        </div>
    </div>





</x-app-layout>
