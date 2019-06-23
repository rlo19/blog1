@extends('layouts.app')

@section('content')

<blog-format-component uid="{{ $uid }}" aid="{{ $aid }}"></blog-format-component>

@endsection
