@extends('layouts.app')


@section('pageHeader')
Add New Category
@endsection

@section('content')

<div class="row">
    @include('msg')
    <div class="{{ B_GRID }}">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">Create New Category</h5>
                <div class="card-text">
                    <form action="{{ route('category.store') }}" method="POST">
                        @csrf
                        <div class="form-group">
                            <label for="exampleInputEmail1">Category Name*</label>
                            <input type="text" class="form-control" name="category" id="category">
                            @error('category')
                            {{ $message }}
                            @enderror
                        </div>
                        <div class="form-group">
                            <input type="submit" class="btn btn-info" value="ADD CATEGORY">
                        </div>
                    </form>
                </div>
                <a href="{{ route('category.index') }}" class="card-link">Back to List</a>
            </div>
        </div>
    </div>

</div>

@endsection