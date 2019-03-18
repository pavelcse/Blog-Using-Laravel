@extends('layouts.app')
@section('content')

    <div class="card">
        <div class="card-header">
            Create a New User
        </div>

        @include('admin.includes.errors')

        <div class="card-body">
            <form action="{{ route('user.store') }}" method="post">
                {{ csrf_field() }}

                <div class="form-group">
                    <label for="name">Name</label>
                    <input class="form-control" type="text" name="name" id="name">
                </div>

                <div class="form-group">
                    <label for="email">Email</label>
                    <input class="form-control" type="email" name="email" id="email">
                </div>

                <div class="form-group">
                    <button class="btn btn-success" type="submit">Add User</button>
                </div>
            </form>
        </div>
    </div>

@endsection