@extends('layouts.app')

@section('title', 'Reports')


@section('content')
    <h2>File List</h2>
    @foreach ($files as $file)
        <a href="{{ $file }}">{{ $file }}</a><br />
    @endforeach
@endsection

