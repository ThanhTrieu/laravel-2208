@extends('layouts.admin_layout')
@section('title', 'Create role')
@section('content_row')
    <div class="row">
        <div class="col">
            <a class="btn btn-primary" href="{{ route('admin.roles.list') }}"><i class="fas fa-plus"></i> List of roles</a>
            @if ($errors->any())
                <div class="alert alert-danger mt-3">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <form class="mt-3 p-3 border" method="POST" action="{{ route('admin.roles.store') }}">
                @csrf
                <div class="mb-3">
                    <label for="nameRole" class="form-label">Name (*)</label>
                    <input type="text" class="form-control" id="nameRole" name="name">
                </div>
                <div class="mb-3">
                    <label for="description" class="form-label">Descriptions</label>
                    <textarea class="form-control" id="description" name="description" rows="5"></textarea>
                </div>
                <div class="mb-3">
                    <p>Modules - actions (*)</p>
                    <table class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Module</th>
                                @foreach ($actions as $action)
                                    <th>{{ $action['name'] }}</th>
                                @endforeach
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($modules as $key => $item)
                                <tr>
                                    <td>{{ $key + 1 }}</td>
                                    <td>{{ $item['name'] }}</td>
                                    @foreach ($item['actions'] as $k => $val)
                                        <td>
                                            <input
                                                value="{{ $val['id'] }}"
                                                type="checkbox" name="permissions[{{ $item['id'] }}][]" />
                                        </td>
                                    @endforeach
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

                <button type="submit" class="btn btn-primary">Save</button>
            </form>
        </div>
    </div>
@endsection
