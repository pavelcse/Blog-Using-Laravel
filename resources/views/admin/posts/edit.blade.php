@extends('layouts.app')
@section('content')

    <div class="card">
        <div class="card-header">
            Edit Post
        </div>
        
        @include('admin.includes.errors')
        
        <div class="card-body">
        <form action="{{ route('post.update', ['id' => $posts->id]) }}" method="post" enctype="multipart/form-data">
                {{ csrf_field() }}

                <div class="form-group">
                    <label for="title">Title</label>
                    <input class="form-control" type="text" name="title" id="title" value="{{ $posts->title }}">
                </div>

                <div class="form-group">
                    <label for="featured">Featured Image</label>
                    <input class="form-control" type="file" name="featured" id="featured">
                </div>

                <div class="form-group">
                    <label for="category">Select Category</label>
                    <select name="category_id" id="category" class="form-control">
                        @foreach($categories as $category)
                            <option value="{{ $category->id }}"
                                @if($posts->category->id == $category->id)
                                    selected
                                @endif
                            >{{ $category->name }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="form-group">
                    <label for="summernote">Content</label>
                    <textarea class="form-control" name="content" id="summernote" cols="5" rows="5">{{ $posts->content }}</textarea>
                </div>
                <div class="form-group">
                    <label for="tag"> Select Tags </label><br>
                    @foreach($tags as $tag)
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="checkbox" id="{{ $tag->tag }}" name="tags[]" value="{{ $tag->id }}"
                                @foreach($posts->tags as $t)
                                    @if($tag->id == $t->id)
                                        checked
                                    @endif
                                @endforeach
                            >
                            <label class="form-check-label" for="{{ $tag->tag }}">{{ $tag->tag }}</label>
                        </div>
                    @endforeach
                </div>

                <div class="form-group">
                    <button class="btn btn-success" type="submit">Update Post</button>
                </div>
            </form>
        </div>
    </div>

@endsection

@section('styles')
<link href="http://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.9/summernote.css" rel="stylesheet">
@endsection

@section('scripts')
<script src="http://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.9/summernote.js"></script>
<script>
    $(document).ready(function() {
        $('#summernote').summernote();
    });
</script>
@endsection