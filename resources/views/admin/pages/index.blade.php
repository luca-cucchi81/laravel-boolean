{{-- @php
    $pages = [
        [
            'id'=> 1,
            'title' => 'This is the Page Title',
            'category' => 1,
            'tags' => [
                1,
                3,
                6,
            ]
        ],
        [
            'id'=> 2,
            'title' => 'This is the Page Title 2',
            'category' => 1,
            'tags' => [
                1,
                5,
                7
            ]
        ],
        [
            'id'=> 3,
            'title' => 'This is the Page Title 3',
            'category' => 2,
            'tags' => [
                2,
                4,
                6,
            ]
        ],
    ]
@endphp --}}
@extends('layouts.app')
@section('content')
    <div class="container col-8">
        <div class="row">
            <div class="col-12">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Pages</li>
                    </ol>
                </nav>
            </div>
        </div>
        
        <div class="row">
            <div class="col-12">
                <div class="row">
                    <div class="col-6">
                        <h2 class="font-weight-bold">Pages</h2>
                     </div>
                    <div class="offset-3 col-3">
                        <a class="btn btn-success font-weight-bold" href="{{route('admin.pages.create')}}">NEW PAGE</a>
                    </div>
                </div>
                
                <table class="table">
                    <thead class="thead-dark">
                        <tr>
                            <th>ID</th>
                            <th>Title</th>
                            <th>Category</th>
                            <th>Tags</th>
                            <th colspan="3">Actions</th>
                        </tr>   
                    </thead>

                    <tbody>
                        @foreach ($pages as $page)
                            <tr>
                                <th>{{$page['id']}}</th>
                                <td>{{$page['title']}}</td>
                                <td>{{$page['category']}}</td>
                                <td>
                                   @foreach ($page['tags'] as $tag)
                                       {{$tag}}
                                       @if (!$loop->last)
                                           ,
                                       @endif
                                   @endforeach
                                </td>
                                <td><a class="btn btn-primary col-8"href="#" role="button">SHOW</a></td>
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