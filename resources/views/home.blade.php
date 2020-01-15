@extends('layouts.app')

@section('content')

<div class="container mainmargin">
    <div class="row justify-content-center">
        <div class="col-md-9 topatitraukimasnav">
            <div class= "rudasfonas">
                <div>
                    <img class="homepaper" src="/images/img/home/wallpaper.png" alt="">
                    <div  class="paperwrite col-md-9">
                        <div class="aligncenter">Namai nėra NAMAI</div>
                         <div class="aligncenter paperwritedidelis">be GYVŪNŲ</div>
                    </div>
                </div>
                    <div class="topatitraukimas">
                        <h2>Zoo Prekės</h2>
                    </div>
            </div>
        <div class="topatitraukimas">
            <div class="row">
                            <div class="col-md-3 ikona">
                                <a href="/sunys">
                                <div class="ikonospav">
                                    <img src="/images/img/button/2.png" alt="">
                                </div>
                                <div>
                                    <h5>Šunims</h5>
                                </div>
                                </a>
                            </div>
                            <div class="col-md-3 ikona">
                            <a href="/kates">
                                <div class="ikonospav">
                                    <img src="/images/img/button/1.png" alt="">
                                </div>
                                <div>
                                    <h5>Katėms</h5>
                                </div>
                                </a>
                            </div>
                            <div class="col-md-3 ikona">
                            <a href="/peles">
                                <div class="ikonospav">
                                    <img src="/images/img/button/13.png" alt="">
                                </div>
                                <div>
                                    <h5>Graužikams</h5>
                                </div>
                                </a>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-3 ikona">
                        <a href="/zuvys">
                            <div class="ikonospav">
                                <img src="/images/img/button/3.png" alt="">
                            </div>
                            <div>
                                <h5>Žuvims</h5>
                            </div>
                            </a>
                        </div>
                        <div class="col-md-3 ikona">
                        <a href="/ropliai">
                            <div class="ikonospav">
                                <img src="/images/img/button/16.png" alt="">
                            </div>
                            <div>
                                <h5>Ropliams</h5>
                            </div>
                            </a>
                        </div>
                        <div class="col-md-3 ikona">
                        <a href="/pauksciai">
                            <div class="ikonospav">
                                <img src="/images/img/button/15.png" alt="">
                            </div>
                            <div>
                                <h5>Paukščiams</h5>
                            </div>
                        </a>
                        </div>
                    </div>
                </div>
        <div class=" rudasfonas">
                    <div class="topatitraukimas">
                        <h2> Naujausi skelbimai </h2>
                    </div>
            <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
                <ol class="carousel-indicators">
                    <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active "></li>
                    <li data-target="#carouselExampleIndicators" data-slide-to="1" ></li>
                    <li data-target="#carouselExampleIndicators" data-slide-to="2" ></li>
                </ol>
                <div class="carousel-inner">
                    <div class="carousel-item active">
                    <img class="d-block w-100" src="/images/img/home/PH/1.jpg" alt="First slide">
                    </div>
                    <div class="carousel-item">
                    <img class="d-block w-100" src="/images/img/home/PH/5.jpg" alt="Second slide">
                    </div>
                    <div class="carousel-item">
                    <img class="d-block w-100" src="/images/img/home/PH/8.jpg" alt="Third slide">
                    </div>
                </div>
                <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="sr-only">Previous</span>
                </a>
                <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="sr-only">Next</span>
                </a>
                    </div>
                </div>


        <div class="topatitraukimas">
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
