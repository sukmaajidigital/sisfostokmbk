@extends('layouts.app')
@section('title', 'Edit bahankeluar')
@section('content')
    <div class="">
        <form class="" action="{{ route('bahankeluar.update', $bahankeluar->id) }}" method="POST">
            @csrf
            @method('PUT')
            @include('page.bahankeluar.form')
        </form>
    </div>
@endsection
