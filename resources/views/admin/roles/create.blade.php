@extends('layouts.admin_layout')
@section('title', 'Create role')
@section('content_row')
    <div class="row">
        <div class="col">
            <a class="btn btn-primary" href="{{ route('admin.roles.list') }}"><i class="fas fa-plus"></i> List of roles</a>
            <form class="mt-3 p-3 border">
                <div class="mb-3">
                    <label for="nameRole" class="form-label">Name</label>
                    <input type="text" class="form-control" id="nameRole" name="name">
                </div>
                <div class="mb-3">
                    <label for="description" class="form-label">Descriptions</label>
                    <textarea class="form-control" id="description" name="description" rows="5"></textarea>
                </div>
                
                <button type="submit" class="btn btn-primary">Save</button>
            </form>
        </div>
    </div>
@endsection
