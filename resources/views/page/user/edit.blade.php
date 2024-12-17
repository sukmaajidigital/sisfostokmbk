@extends('layouts.app')
@section('title', 'Edit user')
@section('content')
    <div class="">
        <form class="" action="{{ route('user.update', $user->id) }}" method="POST">
            @csrf
            @method('PUT')
            @include('page.user.form')
        </form>
    </div>
@endsection
