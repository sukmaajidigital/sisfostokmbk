@extends('layouts.app')
@section('title', 'Create supplier')
@section('content')
    <div class="py-6">
        <form class="" action="{{ route('supplier.store') }}" method="POST">
            @csrf
            @include('page.supplier.form')
        </form>
    </div>
@endsection
