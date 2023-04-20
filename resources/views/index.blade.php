<!doctype html>
<html lang="en">
<head>
    <link href="{{asset('https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css')}}" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <script src="{{asset('https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js')}}" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>

    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
        <div class="container mt-4">
           <div class="mb-4 d-flex justify-content-end align-items-center">
               <span style="margin-right: 10px">{{\Illuminate\Support\Facades\Auth::user()->name}}</span>
               <form action="{{ route('logout') }}" method="post">
                   @csrf
                   <button class="btn btn-primary" type="submit">Logout</button>
               </form>
           </div>
            <table class="table table-hover">
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">ID</th>
                    <th scope="col">IP</th>
                    <th scope="col">User Agent</th>
                    <th scope="col">Date</th>
                    <th scope="col">Action</th>
                </tr>
                @foreach($data as $d)

                    <tr>
                        <th scope="row">1</th>
                        <td>{{ $d->id }}</td>
                        <td>{{ $d->ip_address }}</td>
                        <td>{{ $d->user_agent }}</td>
                        <td>{{ $d->date }}</td>
                        <td>
                            <form action="{{ route('sessions.terminate', $d->id) }}" method="post">
                                @csrf
                                @method('POST')
                                <button class="btn btn-danger">Terminate</button>
                            </form>
                        </td>
                    </tr>

                @endforeach
            </table>
            <form action="{{ route('sessions.terminateAll') }}" method="POST">
                @csrf
                <button type="submit" class="btn btn-sm btn-danger">Terminate All</button>
            </form>

        </div>



</body>
</html>
