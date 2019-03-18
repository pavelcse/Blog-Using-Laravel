@extends('layouts.app')
@section('content')
<div class="card">
    <div class="card-header">Category List</div>
    <div class="card-body">
        <table class="table table-striped table-hover">
            <thead>
                <th>Category Name</th>
                <th>Action</th>
            </thead>
            @if($categories->count() > 0)
            @foreach($categories as $categorie)
                <tbody>
                    
                    <td>{{ $categorie->name }}</td>
                    <td>
                        <a class="btn btn-sm btn-info" href="{{ route('category.edit', ['id' => $categorie->id]) }}">
                            Edit
                        </a>  
                        <a class="btn btn-sm btn-danger" href="{{ route('category.delete', ['id' => $categorie->id]) }}">
                            Delete
                        </a>
                    </td>
                </tbody>
            @endforeach
            @else
                <tbody>
                    <td colspan="2" class="text-center">No Category Yet.</td>
                </tbody>
             @endif
        </table>
    </div>
</div>

@endsection