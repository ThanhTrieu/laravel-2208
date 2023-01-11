@extends('layouts.admin_layout')
@section('title', 'Edit role')
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
            <form class="mt-3 p-3 border" method="POST" action="{{ route('admin.roles.update',['id' => $infoRole->id]) }}">
                @csrf
                <div class="mb-3">
                    <label for="nameRole" class="form-label">Name (*)</label>
                    <input type="text" class="form-control" id="nameRole" name="name" value="{{ $infoRole->name }}">
                </div>
                <div class="mb-3">
                    <label for="description" class="form-label">Descriptions</label>
                    <textarea class="form-control" id="description" name="description" rows="5">{!! $infoRole->description !!}</textarea>
                </div>
                <div class="mb-3">
                    <label for="statusRole" class="form-label">Status</label>
                    <select class="form-control" id="statusRole" name="status">
                        <option 
                            {{ $infoRole->status == ACTIVE_STATUS ? 'selected' : ''  }}
                            value="{{ ACTIVE_STATUS }}"
                        > Active </option>
                        <option
                            {{ $infoRole->status == DEACTIVE_STATUS ? 'selected' : ''  }}
                            value="{{ DEACTIVE_STATUS }}"
                        > Deactive</option>
                    </select>
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
                                    @foreach ($actions as $k => $val)
                                        <td>
                                            <input
                                                value="{{ $val['id'] }}"
                                                type="checkbox"
                                                name="permissions[{{ $item['id'] }}][]"
                                                @foreach ($arrModuleActionId as $i)
                                                    @if ($i['action_id'] == $val['id'] && $item['id'] == $i['module_id'])
                                                        checked
                                                    @endif
                                                @endforeach
                                            />
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
