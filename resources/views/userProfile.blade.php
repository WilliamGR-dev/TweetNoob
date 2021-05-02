@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Dashboard') }}</div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif
                            <div class="page-content page-container" id="page-content">
                                <div class="padding">
                                    <div class="row container d-flex justify-content-center">
                                        <div class="col-xl-12 col-md-12">
                                            <div class="card user-card-full">
                                                <div class="row m-l-0 m-r-0">
                                                    <div class="col-sm-4 bg-c-lite-green user-profile">
                                                        <div class="card-block text-center text-white">
                                                            <div class="m-b-25"> @if(file_exists (public_path('users/'.auth()->user()->id.'.jpg')))<img src="/users/{{auth()->user()->id}}.jpg" class="img-radius" style="width: 100%" alt="User-Profile-Image">@else<img src="users/default.png" class="img-radius" alt="User-Profile-Image">@endif </div>
                                                            @if(file_exists (public_path('users/'.auth()->user()->id.'.jpg')))<a href="{{ url('/deletepicture') }}">Supprimer ma photo</a>@endif
                                                            <h6 class="f-w-600">{{auth()->user()->name}}</h6>
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-8">
                                                        <div class="card-block">
                                                            <h6 class="m-b-20 p-b-5 b-b-default f-w-600">Information</h6>
                                                            <div class="row">
                                                                <form action="{{ url('/modifyProfile') }}" method="post" enctype="multipart/form-data">
                                                                    @csrf
                                                                    <div class="col-sm-12">
                                                                        <p class="m-b-10 f-w-600">Nom</p>
                                                                        <input class="text-muted f-w-400" name="name" value="{{auth()->user()->name}}">
                                                                    </div>
                                                                    <div class="col-sm-12">
                                                                        <p class="m-b-10 f-w-600">Email</p>
                                                                        <input class="text-muted f-w-400" type="email" name="email" value="{{auth()->user()->email}}">
                                                                    </div>
                                                                    <div class="col-sm-12">
                                                                        <p class="m-b-10 f-w-600">Mot de passe</p>
                                                                        <input class="text-muted f-w-400" type="password" name="password" >
                                                                    </div>
                                                                    <div class="col-sm-12">
                                                                        <p class="m-b-10 f-w-600">Photo de profile</p>
                                                                        <p class="m-b-10 f-w-600 text-danger">Uniquement du jpg !!!!</p>
                                                                        <input class="text-muted f-w-400" type="file" name="picture">
                                                                    </div>
                                                                    <div class="col-sm-12 text-center">
                                                                        <button type="submit" class="btn btn-primary mt-4">Modifier</button>
                                                                    </div>
                                                                </form>
                                                            </div>
                                                            <ul class="social-link list-unstyled m-t-40 m-b-10">
                                                                <li><a href="#!" data-toggle="tooltip" data-placement="bottom" title="" data-original-title="facebook" data-abc="true"><i class="mdi mdi-facebook feather icon-facebook facebook" aria-hidden="true"></i></a></li>
                                                                <li><a href="#!" data-toggle="tooltip" data-placement="bottom" title="" data-original-title="twitter" data-abc="true"><i class="mdi mdi-twitter feather icon-twitter twitter" aria-hidden="true"></i></a></li>
                                                                <li><a href="#!" data-toggle="tooltip" data-placement="bottom" title="" data-original-title="instagram" data-abc="true"><i class="mdi mdi-instagram feather icon-instagram instagram" aria-hidden="true"></i></a></li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection


