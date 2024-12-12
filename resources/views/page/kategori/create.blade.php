@extends('layouts.app')
@section('title', 'Create Kategori')
@section('content')
    <div class="py-6">
        <form class="" action="{{ route('kategori.store') }}" method="POST">
            @csrf
            @include('page.kategori.form')
        </form>
    </div>
@endsection
