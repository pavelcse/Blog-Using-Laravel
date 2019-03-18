@extends('layouts.app')
@section('content')
    <div class="card">
        <div class="card-header">Post List</div>
        <div class="card-body">
            <table class="table table-striped table-hover">
                <thead>
                    <th>Image</th>
                    <th>Post Name</th>
                    <th>Action</th>
                </thead>
                @if($posts->count() > 0)
                    @foreach($posts as $post)
                    <tbody>
                        <td><img width="90px;" height="50px" src="{{ asset($post->featured) }}" alt="{{ $post->title }}"></td>
                        <td>{{ $post->title }}</td>
                        <td>
                            <a class="btn btn-info btn-sm" href="{{ route('post.edit', ['id' => $post->id]) }}">
                                Edit
                            </a>  
                            <a class="btn btn-danger btn-sm" href="{{ route('post.delete', ['id' => $post->id]) }}">
                                Trash
                            </a>
                        </td>
                    </tbody>
                    @endforeach
                @else
                    <tbody>
                        <td colspan="3" class="text-center">No Post Available</td>
                    </tbody>
                @endif
            </table>
        </div>
    </div>

@endsection