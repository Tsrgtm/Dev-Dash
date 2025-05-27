@extends('layouts.app')

@section('content')
    @livewire('user.index', ['username' => $username])
@endsection
