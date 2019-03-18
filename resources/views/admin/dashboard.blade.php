@extends('layouts.app')

@section('content')

<div class="card-columns text-white">
    <div class="card bg-info">
        <div class="card-header">
            <h3 class="text-center"> Posted</h3>
        </div>
        <div class="card-body text-center">
            <h3 class="card-text">{{ $posts_count }}</h3>
        </div>
    </div>

    <div class="card bg-danger">
        <div class="card-header">
            <h3 class="text-center"> Trashed </h3>
        </div>
        <div class="card-body text-center">
            <h3 class="card-text">{{ $trashed_count }}</h3>
        </div>
    </div>

    <div class="card bg-primary">
        <div class="card-header">
            <h3 class="text-center"> Category</h3>
        </div>
        <div class="card-body text-center">
            <h3 class="card-text">{{ $categories_count }}</h3>
        </div>
    </div>

    <div class="card bg-success">
        <div class="card-header">
            <h3 class="text-center">Users</h3>
        </div>
        <div class="card-body text-center">
            <h3 class="card-text">{{ $users_count }}</h3>
        </div>
    </div>

    <div class="card bg-dark">
        <div class="card-header">
            <h3 class="text-center"> Tags</h3>
        </div>
        <div class="card-body text-center">
            <h3 class="card-text">{{ $tags_count }}</h3>
        </div>
    </div>

</div>

@endsection
