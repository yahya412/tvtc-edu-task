
<x-slot name="header">
        </x-slot>
    
    <h1>update gender</h1>
<h2>Gender</h2>
<form action="{{ route('update-gender') }}" method="POST">
@csrf
@method('PUT')

<input type="radio" name="gender" value="1" />Male
<input type="radio" name="gender" value="2" />Female
<br><br>

<button type =submit class="btn btn-success" >Update</button>
</form>

