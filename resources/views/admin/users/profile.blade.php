@extends('layouts.app')
@section('content')

    <div class="card">
        <div class="card-header">
            Update User Information
        </div>

        @include('admin.includes.errors')

        <div class="card-body">
            <form action="{{ route('profile.update') }}" method="post" enctype="multipart/form-data">
                {{ csrf_field() }}

                <div class="form-group">
                    <label for="name">Name</label>
                    <input class="form-control" type="text" name="name" id="name" value="{{ $user->name }}">
                </div>

                <div class="form-group">
                    <label for="email">Email</label>
                    <input class="form-control" type="email" name="email" id="email" value="{{ $user->email }}">
                </div>

                <div class="form-group">
                    <label for="avatar">Avatar</label>
                    <input class="form-control" type="file" name="avatar" id="avatar">
                </div>

                <div class="form-group">
                    <label for="facebook">Facebook Profile</label>
                    <input class="form-control" type="text" name="facebook" id="facebook" value="{{ $user->profile->facebook }}">
                </div>

                <div class="form-group">
                    <label for="youtube">Youtube Channel</label>
                    <input class="form-control" type="text" name="youtube" id="youtube" value="{{ $user->profile->youtube }}">
                </div>

                <div class="form-group">
                    <label for="about">About</label>
                    <textarea class="form-control" name="about" id="about" cols="5" rows="5">{{ $user->profile->about }}</textarea>
                </div>

                <div class="form-group">
                    <label for="password">New Password</label>
                    <input class="form-control" type="password" name="password" id="password">
                </div>

                <div class="form-group">
                    <button class="btn btn-success" type="submit">Update User Profile</button>
                </div>
            </form>
        </div>
    </div>

@endsection