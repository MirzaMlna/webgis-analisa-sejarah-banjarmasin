<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Cetak Data Akun</title>
    {{-- Bootstrap Import --}}
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
    {{-- Poppins Font CDN --}}
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
        href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap"
        rel="stylesheet" />
</head>

<body class="m-5">
    <div class="fs-3 mb-5">Data Akun</div>
    <table class="table">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">ID</th>
                <th scope="col">Nama</th>
                <th scope="col">Email</th>
                <th scope="col">No.Telp</th>
                <th scope="col">Level</th>
            </tr>
        </thead>
        <tbody>
            @php $no = 1; @endphp
            @foreach ($users as $user)
                <tr>
                    <th>{{ $no++ }}</th>
                    <td>{{ $user->id }}</td>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->email }}</td>
                    <td>{{ $user->phone }}</td>
                    <td>{{ $user->level }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
    <div class="row mt-5">
        <div class="col-md-9"></div>
        <div class="col-md-3">
            <div class="text-start">
                {{ auth()->user()->level }}
                <br><br><br>
                <p>
                    {{ auth()->user()->name }}
                </p>
            </div>
        </div>
    </div>
</body>

</html>
