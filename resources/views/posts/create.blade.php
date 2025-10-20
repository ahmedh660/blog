@extends('layout.app')
@section('content')

<form method="POST" action="{{route('posts.store')}}" class="row g-3">
@csrf
    <div class="col-12">
        <label  class="form-label">title</label>
        <input name="title" type="text" class="form-control" required>
    </div>
    <div class="col-12">
        <label  class="form-label">description</label>
        <input name="description" type="text" class="form-control" required >
    </div>
    <div class="select" >
        <label class="kkk"> select creator </label>
    <select name="select"  class="form-select" aria-label="Default select example">
        @foreach($users as $user)
        <option value="{{$user->id}}">{{$user->name}}</option>
        @endforeach
    </select>
    </div>
    <div class="col-12">
        <button type="submit" class="btn btn-primary">submit</button>
    </div>
</form>
@endsection('content')
