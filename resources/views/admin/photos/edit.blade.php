@php
    $photo = [
        'id' => 1,
        'title' => 'Title 1',
        'description'  => 'this is the description',
        'path' => 'images\bAcQbrCFHYNjAD64OGgJObJriMsrWThmgs91xwlD.jpeg'
    ];
@endphp

@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-12">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item" aria-current="page"><a href="{{route('admin.photos.index')}}">Photos</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Edit</li>
                </ol>
            </nav>
        </div>
    </div>

    <div class="row">
        <div class="col-12">
            <h2 class="display-4">Edit Photo</h2>
        </div>
    </div>


    <div class="row">
        <div class="col-8">
            <form action="{{route('admin.photos.update', $photo['id'])}}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PATCH')
                <div class="form-group">
                    <label for="title">Title</label>
                    <input type="text" class="form-control" id="title" name="title" value="{{$photo['title']}}">
                    @error('title')
                    <small class="form-text">Error</small>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="description">Description</label>
                    <input type="text" class="form-control" id="description" name="description" value="{{$photo['description']}}">
                    @error('description')
                    <small class="form-text">Error</small>
                    @enderror
                </div>

                <div class="form-group">
                    <div class="custom-file">
                        <input type="file" class="custom-file-input" id="inputGroupFile01" name="path">
                        <label class="custom-file-label" for="inputGroupFile01">Select image</label>
                    </div>
                    @error('path')
                    <small class="form-text">Error</small>
                    @enderror
                </div>

                <div class="form-group">
                    <input class="btn btn-primary" type="submit" value="SAVE">
                </div>
            </form>
        </div>

        <div class="col-4">
            <img src="{{asset('storage/' . $photo['path'])}}" alt="{{$photo['title']}}">
        </div>
    </div>
</div>
@endsection
