@extends('layouts.app')

@section('content')

<div class="row">
    @include('msg')
    <div class="{{ B_GRID }}">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">Create New Post</h5>
                <div class="card-text">
                    <form action="{{ route('post.store') }}" method="POST">
                        @csrf
                        <div class="form-group">
                            <label for="title">Post Name*</label>
                            <input type="text" class="form-control" name="title" id="title">
                            @error('category')
                            {{ $message }}
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="category_id">Category*</label>
                            <select name="category_id" id="category_id" class="form-control">
                                @foreach($categories as $category)
                                <option value="{{ $category->id }}">{{ $category->name }}</option>
                                @endforeach
                            </select>
                            @error('category_id')
                            {{ $message }}
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="post">Post*</label>
                            <textarea name="post" class="form-control" id="post" cols="30" rows="10"></textarea>
                            @error('post')
                            {{ $message }}
                            @enderror
                        </div>

                        <div class="form-group">
                            <input type="submit" class="btn btn-info" value="ADD POST">
                        </div>
                    </form>
                </div>
                <a href="{{ route('category.index') }}" class="card-link">Back to List</a>
            </div>
        </div>
    </div>

</div>

@endsection