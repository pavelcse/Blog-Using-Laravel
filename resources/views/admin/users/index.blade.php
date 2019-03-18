@extends('layouts.app')
@section('content')
    <div class="card">
        <div class="card-header">User List List</div>
        <div class="card-body">
            <table class="table table-striped table-hover">
                <thead>
                    <th>Image</th>
                    <th> Name</th>
                    <th> Permission</th>
                    <th>Action</th>
                </thead>
                @if($users->count() > 0)
                    @foreach($users as $user)
                    <tbody>
                        <td><img style="border-radius: 50%;" width="60px;" height="60px" src="{{ asset($user->profile->avatar) }}"></td>
                        <td>{{ $user->name }}</td>
                        <td>
                            @if($user->admin)
                            <a href="{{ route('user.not.admin', ['id' => $user->id]) }}" class="btn btn-sm btn-danger">Remove Permission</a>
                            @else
                                <a href="{{ route('user.admin', ['id' => $user->id]) }}" class="btn btn-sm btn-success">Make Admin</a>
                            @endif
                        </td>
                        <td>
                        @if(Auth::id() !== $user->id)
                           <a href="{{ route('user.delete', ['id' => $user->id]) }}" class="btn btn-sm btn-danger">Delete</a>
                        @else
                            Delete
                        @endif
                        </td>
                    </tbody>
                    @endforeach
                @else
                    <tbody>
                        <td colspan="4" class="text-center">No Post Available</td>
                    </tbody>
                @endif
            </table>
        </div>
    </div>

@endsection