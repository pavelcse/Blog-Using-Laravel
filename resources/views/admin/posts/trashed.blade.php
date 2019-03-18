@extends('layouts.app')
@section('content')
    <div class="card">
        <div class="card-header">Trashed Post List</div>
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
                            <a class="btn btn-success btn-sm" href="{{ route('post.restore', ['id' => $post->id]) }}">
                                Restore
                            </a>
                            <a class="btn btn-danger btn-sm" href="{{ route('post.kill', ['id' => $post->id]) }}">
                                Destroy
                            </a>
                        </td>
                    </tbody>
                    @endforeach
                @else
                <tbody>
                    <td colspan="3" class="text-center">No Trashed Data</td>
                </tbody>
                @endif
            </table>
        </div>
    </div>

@endsection