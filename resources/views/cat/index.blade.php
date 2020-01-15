@extends('layouts.app')

@section('content')
<div class="container mainmargin">
    <div class="row justify-content-center">
        <div class="col-md-9">
            <div class= "rudasfonas">
                <div class="topatitraukimasnav">
                    <img src="/images/img/home/ph/8.jpg" alt="">
                </div>
                <div class="topatitraukimas">
                    <h2>Prekės katėms</h2>
                </div>
            </div>

                <div class="aligncenter topatitraukimas">
                    @auth()
                    @if(Auth::user()->admin == 1)
                    <a class="btn btn-primary" href="/kates/create">Sukurti prekę</a>
                    @endif
                    @endauth
                </div>


                <div class="rudasfonas">
                    <div class="row">
                            <div class="col-md-3 ikona">
                                <a href="{{URL::route('catCategory', ['category' => 'pets'])}}">
                                <div class="ikonospav">
                                    <img src="/images/img/button/10.png" alt="">
                                </div>
                                <div>
                                    <h5>Gyvūnėliai</h5>
                                </div>
                                </a>
                                </a>
                            </div>
                            <div class="col-md-3 ikona">
                            <a href="{{URL::route('catCategory', ['category' => 'foods'])}}">
                                <div class="ikonospav">
                                    <img src="/images/img/button/4.png" alt="">
                                </div>
                                <div>
                                    <h5>Maistas</h5>
                                </div>
                                </a>
                            </div>
                            <div class="col-md-3 ikona">
                            <a href="{{URL::route('catCategory', ['category' => 'toilets'])}}">
                                <div class="ikonospav">
                                    <img src="/images/img/button/7.png" alt="">
                                </div>
                                <div>
                                    <h5>Tualetai</h5>
                                </div>
                                </a>
                            </div>
                    </div>


                    <div class="row">
                        <div class="col-md-3 ikona">
                        <a href="{{URL::route('catCategory', ['category' => 'toys'])}}">
                            <div class="ikonospav">
                                <img src="/images/img/button/8.png" alt="">
                            </div>
                            <div>
                                <h5>Žaislai</h5>
                            </div>
                            </a>
                        </div>
                        <div class="col-md-3 ikona">
                        <a href="{{URL::route('catCategory', ['category' => 'akse'])}}">
                            <div class="ikonospav">
                                <img src="/images/img/button/14.png" alt="">
                            </div>
                            <div>
                                <h5>Aksesuarai</h5>
                            </div>
                            </a>
                        </div>
                        <div class="col-md-3 ikona">
                        <a href="{{URL::route('catCategory', ['category' => 'beds'])}}">
                            <div class="ikonospav">
                                <img src="/images/img/button/9.png" alt="">
                            </div>
                            <div>
                                <h5>Guoliai</h5>
                            </div>
                        </a>
                        </div>
                    </div>
                </div>




        </div>
    </div>
</div>
@endsection
