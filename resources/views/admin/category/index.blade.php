@extends('layouts.app')

@section('content')

@include('msg')


<div class="row">
    <div class="{{ B_GRID }}">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">Category List</h5>
                <div class="card-text">
                    <div class="table-responsive">
                        <table class="table table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th width="10%">Sl. No.</th>
                                    <th width="40%">Name</th>
                                    <th width="10%">No. of Posts</th>
                                    <th width="10%">Edit</th>
                                    <th width="10%">Delete</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($categories as $category)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $category['name'] }}</td>
                                    <td></td>
                                    <td>Edit</td>
                                    <td>Delete</td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>


@endsection