@extends('layouts.app')
@section('title', 'Edit bahan')
@section('content')
    <div class="">
        <form class="" action="{{ route('bahan.update', $bahan->id) }}" method="POST">
            @csrf
            @method('PUT')
            @include('page.bahan.form')
        </form>
    </div>
@endsection
