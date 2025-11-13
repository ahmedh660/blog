@extends('layout.app')
@section('content')
<div class="d-grid gap-2 col-6 mx-auto">
    <div class="card">
        <h5 class="card-header">post info</h5>
        <div class="card-body">
            <h5 class="card-title">Title: {{$post -> title}}</h5>
            <p class="card-text">Description: {{$post -> description}}</p>
        </div>
</div>
    <div class="card">
    <h5 class="card-header">PostCreator</h5>
    <div class="card-body">
        <h5 class="card-title">Name: {{$post->user ? $post->user-> name:'not found'}} </h5>
        <p class="card-title">e-mail:{{$post->user ? $post->user-> email:'not found'}} </p>
        <p class="card-text">Creat_at:{{$post->user ? $post->user-> created_at:'not found'}} </p>
    </div>
</div>
@endsection('content')
