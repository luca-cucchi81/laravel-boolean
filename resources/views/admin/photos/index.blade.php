@php
$photos = [
[
'id' => 1,
'title' => 'Photo title 1',
],
[
'id' => 2,
'title' => 'Photo title 2',
],
[
'id' => 3,
'title' => 'Photo title 3',
],
[
'id' => 4,
'title' => 'Photo title 4',
],
];
@endphp

@extends('layouts.app')
@section('content')
<div class="container col-8">
    <div class="row">
        <div class="col-12">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Photos</li>
                </ol>
            </nav>
        </div>
    </div>

    <div class="row">
        <div class="col-12">
            <div class="row">
                <div class="col-6">
                    <h2 class="font-weight-bold">Photos</h2>
                </div>
                <div class="offset-3 col-3">
                    <a class="btn btn-success font-weight-bold" href="{{route('admin.photos.create')}}">NEW PHOTO</a>
                </div>
            </div>

            <table class="table">
                <thead class="thead-dark">
                    <tr>
                        <th>ID</th>
                        <th>Title</th>
                        <th colspan="3">Actions</th>
                    </tr>
                </thead>

                <tbody>
                    @foreach ($photos as $photo)
                    <tr>
                        <th>{{$photo['id']}}</th>
                        <td>{{$photo['title']}}</td>

                        <td><a class="btn btn-primary col-8" href="#" role="button">SHOW</a></td>
                        <td><a class="btn btn-secondary col-8 offset-2" href="#" role="button">EDIT</a></td>
                        <td>
                            <form action="">
                                <input class="btn btn-danger col-8 offset-2" type="submit" value="DELETE">
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
