@extends('layouts.app')
@section('title', 'Edit bahanmasuk')
@section('content')
    <div class="">
        <form class="" action="{{ route('bahanmasuk.update', $bahanmasuk->id) }}" method="POST">
            @csrf
            @method('PUT')
            @include('page.bahanmasuk.form')
        </form>
    </div>
@endsection
