@extends('layouts.app')
@section('content')

    <div class="card">
        <div class="card-header">
            Create a New Category
        </div>

        @include('admin.includes.errors')

        <div class="card-body">
            <form action="{{ route('category.store') }}" method="post">
                {{ csrf_field() }}

                <div class="form-group">
                    <label for="name">Category Name</label>
                    <input class="form-control" type="text" name="name" id="name">
                </div>

                <div class="form-group">
                    <button class="btn btn-success" type="submit">Store Category</button>
                </div>
            </form>
        </div>
    </div>

@endsection