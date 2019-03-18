@extends('layouts.app')
@section('content')

    <div class="card">
        <div class="card-header">
            Edit Tag
        </div>

        @include('admin.includes.errors')

        <div class="card-body">
            <form action="{{ route('tag.update', ['id' => $tag->id]) }}" method="post">
                {{ csrf_field() }}

                <div class="form-group">
                    <label for="name">Tag Name</label>
                    <input class="form-control" type="text" name="tag" id="name" value="{{ $tag->tag }}">
                </div>

                <div class="form-group">
                    <button class="btn btn-success" type="submit">Update Tag</button>
                </div>
            </form>
        </div>
    </div>

@endsection