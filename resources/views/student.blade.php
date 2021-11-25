    <!doctype html>
    <html lang="en">
    <head>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <!-- Bootstrap CSS -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
        <link rel="stylesheet" href="{{ asset('css/style.css') }}">
        <title>Student management system</title>
    </head>
    <body>
        @include('navbar')
        <div class="row header-container justify-content-center">
            <div class="header">
                <h1>Student Management System</h1>
            </div>
        </div>
    @if($layout == 'index')
        <div class="container-fluid mt-4">
            <div class="row">
                <section class="col">
                    @include('studentslist')
                </section>
                <section class="col"></section>
            </div>
        </div>
        @elseif($layout == 'create');
        <div class="container-fluid mt-4">
            <div class="row">
                <section class="col-md-7">
                    @include('studentslist')
                </section>
                <section class="col-md-5">
                    <div class="row row-cols-1 row-cols-md-3 g-4">
                            <div class="col">
                            <div class="card">
                                <img src="https://lh3.googleusercontent.com/proxy/WABKkGMSdXTVsknoxv-FyEOcEgMtnslsNpe4qaKq-_QERUm8GWr2blTgX4kBh7KAs_43qujZHlGTU-eLQgwwPryr7lUW5l8LyDv3l6qVNqbpwAq507T-AfMA6fs" class="card-img-top" alt="...">
                                <div class="card-body">
                                <h5 class="card-title">Enter information about our students</h5>
                                <form action="{{ url('/store') }}" method="post">
                                    @csrf
                                    <div class="form-group">
                                        <label>CNE</label>
                                        <input type="text" name="cne" class="form-control" placeholder="Enter CNE">
                                    </div>
                                    <div class="form-group">
                                        <label>First Name</label>
                                        <input type="text" name="firstName" class="form-control" placeholder="Enter the first name">
                                    </div>
                                    <div class="form-group">
                                        <label>Last Name</label>
                                        <input type="text" name="lastName" class="form-control" placeholder="Enter the last name">
                                    </div>
                                    <div class="form-group">
                                        <label>Age</label>
                                        <input type="text" name="age" class="form-control" placeholder="Enter your age">
                                    </div>
                                    <div class="form-group">
                                        <label>Speciality</label>
                                        <input type="text" name="speciality" class="form-control" placeholder="Enter your speciality">
                                    </div>
                                    <input type="submit" class="btn btn-info" value="Save">
                                    <input type="reset" class="btn btn-warning" value="Reset">
                                </form>
                                </div>
                            </div>
                        </div>
                    <form action="{{ url('/store') }}" method="post">
                        @csrf
                        <div class="form-group">
                            <label>CNE</label>
                            <input type="text" name="cne" class="form-control" placeholder="Enter CNE">
                        </div>
                        <div class="form-group">
                            <label>First Name</label>
                            <input type="text" name="firstName" class="form-control" placeholder="Enter the first name">
                        </div>
                        <div class="form-group">
                            <label>Last Name</label>
                            <input type="text" name="lastName" class="form-control" placeholder="Enter the last name">
                        </div>
                        <div class="form-group">
                            <label>Age</label>
                            <input type="text" name="age" class="form-control" placeholder="Enter your age">
                        </div>
                        <div class="form-group">
                            <label>Speciality</label>
                            <input type="text" name="speciality" class="form-control" placeholder="Enter your speciality">
                        </div>
                        <input type="submit" class="btn btn-info" value="Save">
                        <input type="reset" class="btn btn-warning" value="Reset">
                    </form>
                </section>
            </div>
        </div>
        @elseif($layout == 'show');
        <div class="container-fluid mt-4">
            <div class="row">
                <section class="col">
                    @include('studentslist')
                </section>
                <section class="col"></section>
            </div>
        </div>
        @elseif($layout == 'edit');
        <div class="container-fluid mt-4">
            <div class="row">
                <section class="col-md-7">
                    @include('studentslist')
                </section>
                <section class="col-md-5">
                    <div class="row row-cols-1 row-cols-md-3 g-4">
                            <div class="col">
                            <div class="card">
                                <img src="https://w7.pngwing.com/pngs/46/315/png-transparent-higher-education-symbol-class-s-on-education-leaf-flower-sign.png" class="card-img-top" alt="...">
                                <div class="card-body">
                                <h5 class="card-title">Update information about our students</h5>
                                <form action="{{ url('/update/'.$student->id) }}" method="post">
                                    @csrf
                                    <div class="form-group">
                                        <label>CNE</label>
                                        <input value="{{$student->cne}}" type="text" name="cne" class="form-control" placeholder="Enter CNE">
                                    </div>
                                    <div class="form-group">
                                        <label>First Name</label>
                                        <input value="{{$student->firstName}}" type="text" name="firstName" class="form-control" placeholder="Enter the first name">
                                    </div>
                                    <div class="form-group">
                                        <label>Last Name</label>
                                        <input value="{{$student->lastName}}" type="text" name="lastName" class="form-control" placeholder="Enter the last name">
                                    </div>
                                    <div class="form-group">
                                        <label>Age</label>
                                        <input value="{{$student->age}}" type="text" name="age" class="form-control" placeholder="Enter your age">
                                    </div>
                                    <div class="form-group">
                                        <label>Speciality</label>
                                        <input value="{{$student->speciality}}" type="text" name="speciality" class="form-control" placeholder="Enter your speciality">
                                    </div>
                                    <input type="submit" class="btn btn-info" value="Update">
                                    <input type="reset" class="btn btn-warning" value="Reset">
                                </form>
                                </div>
                            </div>
                            </div>
                    <form action="{{ url('/update/'.$student->id) }}" method="post">
                        @csrf
                        <div class="form-group">
                            <label>CNE</label>
                            <input value="{{$student->cne}}" type="text" name="cne" class="form-control" placeholder="Enter CNE">
                        </div>
                        <div class="form-group">
                            <label>First Name</label>
                            <input value="{{$student->firstName}}" type="text" name="firstName" class="form-control" placeholder="Enter the first name">
                        </div>
                        <div class="form-group">
                            <label>Last Name</label>
                            <input value="{{$student->lastName}}" type="text" name="lastName" class="form-control" placeholder="Enter the last name">
                        </div>
                        <div class="form-group">
                            <label>Age</label>
                            <input value="{{$student->age}}" type="text" name="age" class="form-control" placeholder="Enter your age">
                        </div>
                        <div class="form-group">
                            <label>Speciality</label>
                            <input value="{{$student->speciality}}" type="text" name="speciality" class="form-control" placeholder="Enter your speciality">
                        </div>
                        <input type="submit" class="btn btn-info" value="Update">
                        <input type="reset" class="btn btn-warning" value="Reset">
                    </form>
                </section>
            </div>
        </div>
        @elseif($layout == 'destroy');
        @endif

        <!-- Optional JavaScript; choose one of the two! -->

        <!-- Option 1: Bootstrap Bundle with Popper -->
        <footer></footer>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

        <!-- Option 2: Separate Popper and Bootstrap JS -->
        <!--
        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
        -->
    </body>
    </html>
