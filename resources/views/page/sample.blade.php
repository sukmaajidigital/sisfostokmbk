@extends('layouts.app')
@section('title', 'Sample Page')
@section('content')
    <h1>Sample Page</h1>
    <p>This is a sample page.</p>
    <h1>icon</h1>
    @include('page.sample.icon')
    <h1>Sample UI alert</h1>
    @include('page.sample.alert')
    <h1>Sample UI button</h1>
    @include('page.sample.button')
    <h1>Sample UI card</h1>
    @include('page.sample.card')
    <h1>Sample UI form</h1>
    @include('page.sample.form')
    <h1>Sample UI typography</h1>
    @include('page.sample.typo')
@endsection
