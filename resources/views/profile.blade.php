@extends('layouts.app')

@section('content')

<profile-user-component user-id="{{ session()->get('uid') }}" api-token="{{session()->get(session()->get('uid').'_api_token')}}"></profile-user-component>
<br>
<profile-blog-component user-id="{{ session()->get('uid') }}"></profile-blog-component>

@endsection
