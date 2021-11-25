    <div class="row row-cols-1 row-cols-md-3 g-4">
        <div class="col">
            <div class="card">
                <img src="https://d1csarkz8obe9u.cloudfront.net/posterpreviews/education-design-template-c39090bc805dde1c3b7565813ffcd1b9_screen.jpg?ts=1592640945" class="card-img-top" alt="...">
                <div class="card-body">
                    <h5 class="card-title">You can find here all the information about students in the system</h5>
                        <table class="table">
                            <thead>
                            <tr>
                                <th scope="col">CNE</th>
                                <th scope="col">First Name</th>
                                <th scope="col">Last Name</th>
                                <th scope="col">Age</th>
                                <th scope="col">Speciality</th>
                                <th scope="col">Operations</th>
                            </tr>
                            </thead>
                            <tbody>
                                @foreach ($students as $student )
                            <tr>
                                <td>{{ $student->cne }}</td>
                                <td>{{ $student->firstName }}</td>
                                <td>{{ $student->lastName }}</td>
                                <td>{{ $student->age }}</td>
                                <td>{{ $student->speciality}}</td>
                                <td>
                                    <a href="{{ url('/edit/'.$student->id) }}" class="btn btn-sm btn-warning">Edit</a>
                                </td>
                            </tr>
                            @endforeach
                            </tbody>
                        </table>
                </div>
            </div>
        </div>
    </div>


