
<x-slot name="header">
        </x-slot>
    
    <h1>update gender</h1>

<span style ="color:red">@error('gender'){{$message}}@enderror</span>

<form action="{{ route('update-gender') }}" method="POST">
@csrf

<input type="radio" name="gender" value="1" />Male
<input type="radio" name="gender" value="2" />Female
<br><br>
<button type =submit class="btn btn-success" >Update</button>
</form>

