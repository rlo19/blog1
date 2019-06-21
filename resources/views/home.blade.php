@extends('layouts.app')

@section('content')

<!-- <div class="container">
    <div class="row justify-content-center">            
        <div class="col-md-10">
            <div class="card">
                <div class="card-header">Create new article</div>

                <div class="card-body">

                    <form method="POST" action="{{ route('newArticle') }}">
                        @csrf

                        <div class="form-group row">
                            <div class="col-md-12">
                                <input type="text" name="title" placeholder="Title of your article" required>
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-md-12">
                                <textarea name="body" class="col-md-12" style="height: 150px" placeholder="What's on your mind?" required></textarea>
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-md-12 text-right">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Submit') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>    
        <div class="col-md-12"><br></div>                   
    </div>
</div>

<home-blog-component></home-blog-component> -->
<home-component api-token="{{session()->get(session()->get('uid').'_api_token')}}"></home-component>
@endsection
