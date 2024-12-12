@extends('layouts.app')
@section('title', 'Create bahan')
@section('content')
    <div class="py-6">
        <form class="" action="{{ route('bahan.store') }}" method="POST">
            @csrf
            @include('page.bahan.form')
        </form>
    </div>
@endsection
