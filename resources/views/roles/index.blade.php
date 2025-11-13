@extends('layout.app')
@section('content')
        <div class="d-flex justify-content-center mb-3">
            <a href="{{route('roles.create')}}" class="btn btn-success">Create Roles</a>
        </div>

        <table class="table table-striped table-bordered text-center align-middle">
            <thead class="table-primary">
            <tr>
                <th>Name</th>
                <th>Permission</th>
                <th>Action</th>
            </tr>
            </thead>
            <tbody>
            @foreach($roles as $role)
                <tr>
                    <td>{{$role->name}}</td>
                    <td>
                        @foreach($role->permissions as $permission  )
                            <span class="badge bg-secondary">{{ $permission->name }}</span>
                        @endforeach
                    </td>
                    <td>
                        <a href="" class="btn btn-sm btn-warning">Edite</a>
                        <form action="" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-sm btn-danger" >Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>

    @endsection('content')











