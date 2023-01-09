@extends('layouts.admin_layout')
@section('title','List of roles')
@section('content_row')
    <div class="row">
        <div class="col">
            <h5>List of roles</h5>
            <a class="btn btn-primary" href="{{ route('admin.roles.create') }}"><i class="fas fa-plus"></i> Create</a>

            <table class="table table-hover table-striped mt-3">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Name</th>
                        <th>Description</th>
                        <th>Create date</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($roles as $key => $item)
                        <tr>
                            <td>{{ $key + 1 }}</td>
                            <td>{{ $item->name }}</td>
                            <td>{!! $item->description !!}</td>
                            <td>{{ getFromDateAttribute($item->created_at) }}</td>
                            <td>
                                <a class="btn btn-info" href="{{ route('admin.roles.edit', ['id' => $item->id]) }}">Edit</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection