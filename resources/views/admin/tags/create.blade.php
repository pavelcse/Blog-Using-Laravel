@extends('layouts.app')
@section('content')

    <div class="card">
        <div class="card-header">
            Create a New Tags
        </div>

        @include('admin.includes.errors')

        <div class="card-body">
            <form action="{{ route('tag.store') }}" method="post">
                {{ csrf_field() }}

                <div class="form-group">
                    <label for="name">Tag Name</label>
                    <input class="form-control" type="text" name="tag" id="name">
                </div>

                <div class="form-group">
                    <button class="btn btn-success" type="submit">Store Tag</button>
                </div>
            </form>
        </div>
    </div>

@endsection