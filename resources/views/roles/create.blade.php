@extends('layout.app')
@section('content')
    <div class="container">
        <h1> Create Role : </h1>
        <form method="POST" action=" " >
            <div>
             <label for="name" class="form-label" > Role Name </label>
             <input type="text" name="name" class="form-control">
            </div>
            @foreach($permissions as $permission)
            <div>
                <input type="checkbox" name="permissions[]" value="{{ $permission->name }}" class="form-check-input" id="perm-{{ $permission->id }}">
                <label class="form-check-label" for="perm-{{ $permission->id }}">{{ $permission->name }}</label>
            </div>
            @endforeach
        </form>
    </div>
@endsection
