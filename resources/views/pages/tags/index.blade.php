@extends('layouts.app')

@section('title', 'Tags | DEV Dash')

@section('sidebar', true)

@section('content')
    @livewire('tags.index')
@endsection
