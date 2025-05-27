@extends('layouts.app')

@section('content')
    @livewire('tags.show', ['tag' => $tag])
@endsection
