
<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Gendre</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
        <!-- CSS -->
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">

        <!-- jQuery and JS bundle w/ Popper.js -->
        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
    </head>
    <body>



        <div class="container" align="center">
            <h2>User's Gender Update</h2>
            <div class="row">
                <div class="col-12 d-flex justify-content-center text-center">

                    <div class="card ">
                        <div class="card-body " align="center ">Please Choose the User's Gender</div>
                        <span style ="color:red">@error('gender'){{$message}}@enderror</span>
                        <form action="{{ route('update-gender') }}" method="POST">
                            @csrf
                            <input type="radio" name="gender" value="1" />Male
                            <input type="radio" name="gender" value="2" />Female
                            <br><br>
                            <button type =submit class="btn btn-success" >Update</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>

    </body>
</html>
