@extends('Layouts.MainLayout')
 
 @section('title', 'class')

 @section('content')
    <h1>Ini halaman CLASS </h1>
    <h3>Class List</h3>

    <table class = "table">
        <thead>
            <tr>
                <th>No.</th>
                <th>Name</th>
            </tr>
        </thead>
        <tbody>
            @foreach($classList as $data)
            <tr>
                <td>{{$loop->iteration}}</td>
                <td>{{$data->name}}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
@endsection()