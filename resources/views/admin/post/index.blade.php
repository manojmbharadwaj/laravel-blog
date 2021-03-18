@extends('layouts.app')

@section('content')

@include('msg')


<div class="row">
    <div class="{{ B_GRID }}">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">Posts</h5>
                <div class="card-text table-responsive">
                    @if(!empty($posts))
                    <table class="table table-bordered table-hover">
                        <thead>
                            <tr>
                                <th width="10%">Sl. No.</th>
                                <th width="40%">Name</th>
                                <th width="10%">Category</th>
                                <th width="10%">Edit</th>
                                <th width="10%">Delete</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($posts as $post)
                            <tr>
                                <td class="text-center">{{ $loop->iteration }}</td>
                                <td>{{ $post->title }}</td>
                                <td>{{ $post->category }}</td>
                                <td>Edit</td>
                                <td>Delete</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    @else
                    <div class="alert alert-info">No Posts Added.</div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>


@endsection