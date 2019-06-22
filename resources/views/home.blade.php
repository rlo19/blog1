@extends('layouts.app')

@section('content')

<home-component uid="{{session()->get('uid')}}"></home-component>
@endsection
