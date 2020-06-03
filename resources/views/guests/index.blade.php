@extends('layouts.app')
@section('content')
<div class="container">
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
                    <h2>Pages</h2>
                </div>
                <div class="offset-3 col-3">
                    <a href="{{route('admin.pages.create')}}">Create a Page</a>
                </div>
            </div>
            <table class="table">
                <thead class="thead-dark ">
                    <tr>
                        <th>ID</th>
                        <th>Title</th>
                        <th>Category</th>
                        <th>Tags</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($pages as $page)
                    <tr>
                        <td>{{$page['id']}}</td>
                        <td>{{$page['title']}}</td>
                        <td>{{$page->category->name}}</td>
                        <td>
                            @foreach ($page['tags'] as $tag)
                            {{$tag->name}}
                            @if (!$loop->last)
                            ,
                            @endif
                            @endforeach
                        </td>
                    </tr>
                    @endforeach

                </tbody>
            </table>
            {{$pages->links()}}
        </div>
    </div>
</div>
@endsection
