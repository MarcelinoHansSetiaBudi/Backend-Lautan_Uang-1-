@extends('Layouts.MainLayout')

@section('title', 'students')

@section('content')
    <h1>Ini adalah halaman Student</h1>
    <h3>studentList</h3>
    <table class = "table">
        <thead>
            <tr>
                <th>No.</th>
                <th>Name</th>
                <th>NIM</th>
            </tr>
        </thead>
        <tbody>
            @foreach($studentList as $data)
            <tr>
                <td>{{$loop->iteration}}</td>
                <td>{{$data->name}}</td>
                <td>{{$data->nis}}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
    <!-- <p></p> untuk membuat ukuran text jadi lebih kecil -->
<!-- $nama ini diperoleh dari Controller -->
@endsection