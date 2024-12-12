@extends('layouts.app')
@section('title', 'Edit keperluan')
@section('content')
    <div class="">
        <form class="" action="{{ route('keperluan.update', $keperluan->id) }}" method="POST">
            @csrf
            @method('PUT')
            @include('page.keperluan.form')
        </form>
    </div>
@endsection
