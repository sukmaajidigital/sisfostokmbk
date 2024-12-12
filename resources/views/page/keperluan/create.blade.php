@extends('layouts.app')
@section('title', 'Create keperluan')
@section('content')
    <div class="py-6">
        <form class="" action="{{ route('keperluan.store') }}" method="POST">
            @csrf
            @include('page.keperluan.form')
        </form>
    </div>
@endsection
