@php
/*     $categories = [
        [
            'id' => 1,
            'name' => 'Miscellanea'
        ],
        [
            'id' => 2,
            'name' => 'Category 2'
        ],
        [
            'id' => 3,
            'name' => 'Category 3'
        ],
    ];

    $tags = [
        [
            'id' => 1,
            'name' => 'Tag 1'
        ],
        [
            'id' => 2,
            'name' => 'Tag 2'
        ],
        [
            'id' => 3,
            'name' => 'Tag 3'
        ],
        [
            'id' => 4,
            'name' => 'Tag 4'
        ],
        [
            'id' => 5,
            'name' => 'Tag 5'
        ],
        [
            'id' => 6,
            'name' => 'Tag 6'
        ],
        [
            'id' => 7,
            'name' => 'Tag 7'
        ]
    ];

    $photos = [
        [
            'id' => 1,
            'name' => 'Photo 1',
            'path' => 'images/photo_1.jpg'
        ],
        [
            'id' => 2,
            'name' => 'Photo 2',
            'path' => 'images/photo_2.jpg'
        ],
        [
            'id' => 3,
            'name' => 'Photo 3',
            'path' => 'images/photo_3.jpg'
        ]
    ];

    $page = [
        'id' => 1,
        'title' => 'This is the page title',
        'summary' => 'This is the page summary',
        'body'  => 'This is the content of page',
        'category_id' => 1,
        'tags' => [
            2,
            6
        ],
        'photos' => [
            1,
            3
        ]
    ]; */

    $oldtags = null;
    $message = '';
@endphp 

@extends('layouts.app')
@section('content')
    <div class="container col-8">
        <div class="row">
            <div class="col-12">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item" aria-current="page"><a href="{{route('admin.pages.index')}}">Pages</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Edit</li>
                    </ol>
                </nav>
            </div>
        </div>

         <div class="row">
            <div class="col-12">
                <h2 class="display-4">Edit Page</h2>
            </div>
        </div>

        <div class="row">
            <div class="col-8">
            <form action="{{route('admin.pages.update', $page->id)}}" method="post">
                    @csrf
                    @method('PUT')
                    <div class="form-group">
                        <label for="title">Title</label>
                        <input type="text" class="form-control" name="title" id="title" value="{{$page['title']}}">
                        @error('title')
                            <small class="form-text">Error</small>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="summary">Summary</label>
                        <input type="text" class="form-control" name="summary" id="summary" value="{{$page['summary']}}">
                        @error('summary')
                            <small class="form-text">Error</small>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="category">Category</label>
                        <select name="category" id="category" class="custom-select">
                            @foreach ($categories as $category)
                                @if($category['id'] == $page['category_id']) 
                                    @php 
                                    $message = 'selected';
                                    @endphp
                                    <option value="{{$category['id']}}" {{$message}}>{{$category['name']}}</option>
                                @else
                                    <option value="{{$category['id']}}">{{$category['name']}}</option>
                                @endif
                            @endforeach
                        </select>
                        @error('category')
                            <small class="form-text">Error</small>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="body">Body</label>
                        <textarea class="form-control" name="body" id="body" rows="10">{{$page['body']}}</textarea>
                        @error('body')
                            <small class="form-text">Error</small>
                        @enderror
                    </div>

                    <div class="form-group">
                        <fieldset>
                            <legend>Tags</legend>
                            @foreach ($tags as $tag)
                                <div class="form-check form-check-inline">
                                    @if(is_array(old('tags'))) 
                                        <input class="form-check-input"  type="checkbox" name="tags[]" id="tag{{$tag['id']}}" value="{{$tag['id']}}"
                                        {{(in_array($tag['id'], old('tags'))) ? 'checked' : ''}}>
                                    @else 
                                        <input class="form-check-input"  type="checkbox" name="tags[]" id="tag{{$tag['id']}}" value="{{$tag['id']}}"
                                        {{($page->tags->contains($tag['id'])) ? 'checked' : ''}}>
                                    @endif
                                    <label class="form-check-label" for="tag{{$tag['id']}}">{{$tag['name']}}</label>
                                </div>
                            @endforeach
                            @error('tags')
                                <small class="form-text">Error</small>
                            @enderror
                        </fieldset>
                    </div>

                    <div class="form-group">
                        <fieldset>
                            <legend>Photos</legend>
                            @foreach ($photos as $photo)
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input"  type="checkbox" name="photos[]" id="photo{{$photo['id']}}" value="{{$photo['id']}}"
                                    {{(in_array($photo['id'], $page['photos'])) ? 'checked' : ''}}>
                                    <label class="form-check-label" for="{{$photo['id']}}">{{$photo['name']}}</label>
                                    <img src="{{$photo['path']}}" alt=""></label>
                                </div>
                            @endforeach
                            @error('photos')
                                <small class="form-text">Error</small>
                            @enderror
                        </fieldset>
                    </div>

                    <div class="form-group">
                        <input class="btn btn-primary" type="submit" value="EDIT">
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection