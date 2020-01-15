@extends('layouts.app')

@section('content')

<div class="container mainmargin">
    <div class="row justify-content-center">
        <div class="col-md-11 topatitraukimasnav">
            <div class= "rudasfonas">
                <div class="topatitraukimas">
                            <h2> Skelbimų lenta </h2>
                </div>
            </div>

            <div class="aligncenter topatitraukimas">
                @auth()
                    <a class="btn btn-primary" href="/skelbimai/create">Sukurti skelbimą</a>
                @endauth
            </div>


            <div class="topatitraukimas">
                <div class="rudasfonas">
                    <div class="row">
                            <div class="col-md-2 ikona">
                                <a href="">
                                <div class="skelbimoikona">
                                    <img src="/images/img/button/21.png" alt="">
                                </div>
                                <div>
                                    <h5>Dingo</h5>
                                </div>
                                </a>
                                </a>
                            </div>
                            <div class="col-md-2 ikona">
                            <a href="">
                                <div class="skelbimoikona">
                                    <img src="/images/img/button/22.png" alt="">
                                </div>
                                <div>
                                    <h5>Dovanoju</h5>
                                </div>
                                </a>
                            </div>
                            <div class="col-md-2 ikona">
                            <a href="">
                                <div class="skelbimoikona">
                                    <img src="/images/img/button/19.png" alt="">
                                </div>
                                <div>
                                    <h5>Ieško namų</h5>
                                </div>
                                </a>
                            </div>
                            <div class="col-md-2 ikona">
                            <a href="">
                                <div class="skelbimoikona">
                                    <img src="/images/img/button/20.png" alt="">
                                </div>
                                <div>
                                    <h5>Įvairūs</h5>
                                </div>
                                </a>
                            </div>
                            <div class="col-md-2 ikona">
                            <a href="">
                                <div class="skelbimoikona">
                                    <img src="/images/img/button/18.png" alt="">
                                </div>
                                <div>
                                    <h5>Keičiu</h5>
                                </div>
                                </a>
                            </div>
                    </div>

                    <div class="row">
                            <div class="col-md-2 ikona">
                                <a href="">
                                <div class="skelbimoikona">
                                    <img src="/images/img/button/25.png" alt="">
                                </div>
                                <div>
                                    <h5>Klaidžioja</h5>
                                </div>
                                </a>
                            </div>
                            <div class="col-md-2 ikona">
                            <a href="">
                                <div class="skelbimoikona">
                                    <img src="/images/img/button/23.png" alt="">
                                </div>
                                <div>
                                    <h5>Parduodu</h5>
                                </div>
                                </a>
                            </div>
                            <div class="col-md-2 ikona">
                            <a href="">
                                <div class="skelbimoikona">
                                    <img src="/images/img/button/24.png" alt="">
                                </div>
                                <div>
                                    <h5>Perku</h5>
                                </div>
                                </a>
                            </div>
                            <div class="col-md-2 ikona">
                            <a href="">
                                <div class="skelbimoikona">
                                    <img src="/images/img/button/17.png" alt="">
                                </div>
                                <div>
                                    <h5>Paslaugos</h5>
                                </div>
                                </a>
                            </div>
                            <div class="col-md-2 ikona">
                            <a href="">
                                <div class="skelbimoikona">
                                    <img src="/images/img/button/26.png" alt="">
                                </div>
                                <div>
                                    <h5>Rasta</h5>
                                </div>
                                </a>
                            </div>
                        </div>
                    </div>


                    <div class="topatitraukimas">
                        <div class= "rudasfonas">
                            <div class="topatitraukimas">
                                <h2> Naujausi skelbimai </h2>
                            </div>
                        </div>
                    </div>


                @foreach($blogs as $blog)
                <div class="topatitraukimas">
                    <div class="row ">
                        <div class="col-md-3">
                        <a href="">
                            <div class = "skelbimopav">
                                <img class="skelbimopav" src="{{Storage::url($blog->photo)}}" alt="">
                            </div>
                        </a>

                        </div>

                        <div class="col-md-9 ">
                            <div class="rudasfonas skelbimas">
                                <div class="row">
                                    <div class="col-md-8 topatitraukimas ">
                                        <h6> {{$blog->title}} </h6>
                                        <p class="topatitraukimas">{{$blog->description}}</p>
                                        <div class="topatitraukimas" style = "font-size:20px;">
                                            <a href="/skelbimai/{{$blog->id}}"> <p>  Peržiūrėti skelbimą... </p> </a>
                                        </div>
                                    </div>
                                    <div class="col-md-4 topatitraukimas">
                                        <p>{{$blog->created_at}}</p>
                                        <p>{{$blog->location}}</p>
                                        <p>Kaina: {{$blog->price}}</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach

        </div>
    </div>
</div>

@endsection
