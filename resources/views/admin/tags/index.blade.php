@extends('layouts.app')
@section('content')
<div class="card">
    <div class="card-header">Tags List</div>
    <div class="card-body">
        <table class="table table-striped table-hover">
            <thead>
                <th>Tag Name</th>
                <th>Action</th>
            </thead>
            @if($tags->count() > 0)
            @foreach($tags as $tag)
                <tbody>
                    
                    <td>{{ $tag->tag }}</td>
                    <td>
                        <a class="btn btn-sm btn-info" href="{{ route('tag.edit', ['id' => $tag->id]) }}">
                            Edit
                        </a>  
                        <a class="btn btn-sm btn-danger" href="{{ route('tag.delete', ['id' => $tag->id]) }}">
                            Delete
                        </a>
                    </td>
                </tbody>
            @endforeach
            @else
                <tbody>
                    <td colspan="2" class="text-center">No Tags Yet.</td>
                </tbody>
             @endif
        </table>
    </div>
</div>

@endsection