@extends('layouts.app')

@section('content')

<profile-component uid="{{ session()->get('uid') }}"></profile-blog-component>

@endsection
