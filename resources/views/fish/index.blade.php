@extends('layouts.app')

@section('content')
<div class="container mainmargin">
    <div class="row justify-content-center">
        <div class="col-md-9">
            <div class= "rudasfonas">
                <div class="topatitraukimasnav">
                    <img src="/images/img/home/13.jpg" alt="">
                </div>
                <div class="topatitraukimas">
                    <h2>Prekės žuvims</h2>
                </div>
            </div>

                <div class="aligncenter topatitraukimas">
                    @auth()
                    @if(Auth::user()->admin == 1)
                    <a class="btn btn-primary" href="/zuvys/create">Sukurti prekę</a>
                    @endif
                    @endauth
                </div>

                <div class="rudasfonas">
                    <div class="row">
                            <div class="col-md-3 ikona">
                                <a href="{{URL::route('fishCategory', ['category' => 'pets'])}}">
                                <div class="ikonospav">
                                    <img src="/images/img/button/3.png" alt="">
                                </div>
                                <div>
                                    <h5>Žuvys</h5>
                                </div>
                                </a>
                                </a>
                            </div>
                            <div class="col-md-3 ikona">
                            <a href="{{URL::route('fishCategory', ['category' => 'foods'])}}">
                                <div class="ikonospav">
                                    <img src="/images/img/button/4.png" alt="">
                                </div>
                                <div>
                                    <h5>Maistas</h5>
                                </div>
                                </a>
                            </div>
                            <div class="col-md-3 ikona">
                            <a href="{{URL::route('fishCategory', ['category' => 'house'])}}">
                                <div class="ikonospav">
                                    <img src="/images/img/button/31.png" alt="">
                                </div>
                                <div>
                                    <h5>Akvariumai</h5>
                                </div>
                                </a>
                            </div>
                    </div>
                </div>







        </div>
    </div>
</div>
@endsection
