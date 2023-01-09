@extends('layouts.admin_layout')
@section('title','List of roles')
@section('content_row')
    <div class="row">
        <div class="col">
            <h5>List of roles</h5>
            <a class="btn btn-primary" href="{{ route('admin.roles.create') }}"><i class="fas fa-plus"></i> Create</a>
        </div>
    </div>
@endsection