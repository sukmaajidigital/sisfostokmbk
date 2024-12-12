@extends('layouts.app')
@section('title', 'Edit Kategori')
@section('content')
    <div class="">
        <form class="" action="{{ route('kategori.update', $kategori->id) }}" method="POST">
            @csrf
            @method('PUT')
            @include('page.kategori.form')
        </form>
    </div>
@endsection
