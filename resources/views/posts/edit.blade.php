@extends('layout.app')
@section('content')

    <form method="POST" action="{{route('posts.update',$post-> id)}}" class="row g-3">
        @csrf
        @method('put')
        <div class="col-12">
            <label  class="form-label">title</label>
            <input name="title" type="text" class="form-control" value="{{$post->title}}" >
        </div>
        <div class="col-12">
            <label  class="form-label">description</label>
            <input name="description" type="text" class="form-control" value="{{$post->description}}" >
        </div>
        <div class="select" >
            <label class="kkk"> select creator </label>
            <select name="select"  class="form-select" aria-label="Default select example">
                @foreach($users as $user)
                    <option @selected($post->user_id== $user->id ) value="{{$user->id}}">{{$user->name}}</option>
                @endforeach
            </select>
        </div>
        <div class="col-12">
            <button type="submit" class="btn btn-primary">update</button>
        </div>
    </form>
@endsection('content')

