@extends('layouts.app')

@section('content')


<div class="container mainmargin">
    <div class="row justify-content-center">
        <div class="col-md-10 topatitraukimasnav">

            <div class= "rudasfonas">
                <div class="topatitraukimas">
                            <h2> {{$bird->item_name}} </h2>
                </div>
            </div>

                <div class="topatitraukimasdidelis">
                    <div class="row">
                        <div class="col-md-6">
                            <div>
                                <img class="produktopav" src="{{Storage::url($bird->photo)}}" alt="">
                            </div>
                        </div>

                        <div class="col-md-6">
                            <h5>
                                Aprašymas
                            </h5>
                            <div class="rudasfonas produktas">
                                <div class="col-md-12 topatitraukimas ">
                                    <p class="categorytitle">{{$bird->category}} </p>
                                    <p class="topatitraukimas">{{$bird->description}} </p>
                                </div>
                            </div>

                            <div class="col-md-10 sellrowapacioje">

                                <div class="desktop">
                                    <div class="row">
                                            <div class="col-md-2 sellrow">
                                                 <p>Kaina: </p>
                                            </div>
                                            <div class="col-md-5 sellrow">
                                                 <p>Išmatavimai: </p>
                                            </div>
                                            @auth()
                                            <div class="col-md-2 sellrow">
                                                <p>Kiekis: </p>
                                            </div>
                                            @endauth
                                    </div>

                                    <div class="row">
                                            <div class="col-md-2 rudasfonas sellrow"> <p>{{$bird->price}} </p> </div>
                                            <div class="col-md-5 rudasfonas  sellrow"> <p>{{$bird->dimensions}} </p> </div>

@auth()
                                            <div class="col-md-2 sellrow">
                                                {!! Form::open(['action' => 'CartController@store', $bird->id]) !!}

                                                {{Form::hidden('user_id', Auth::id())}}
                                                {{Form::hidden('item', $bird->id)}}
                                                {{Form::hidden('category', 6)}}

                                                <input style="width: 100%;" type="number" name="quantity" min="1" max="5" required>
                                            </div>

                                            <div class="col-md-2 rudasfonas  sellrow">

                                                <input type="image" class="cartimg" name="submit" src="/images/img/icone/bag.png" alt="Submit"/>

                                                {!! Form::close() !!}

                                            </div>
@endauth


                                    </div>
                                </div>

                                <div class="mobile">
                                    <div class="row">
                                            <div class="col-md-2 rudasfonas sellrow"> <p> Kaina: {{$bird->price}} </p> </div>
                                            <div class="col-md-5 rudasfonas  sellrow"> <p> Išmatavimai:{{$bird->dimensions}} </p> </div>

                                            @auth()
                                            <div class="col-md-2 rudasfonas sellrow">

                                                {!! Form::open(['action' => 'CartController@store', $bird->id]) !!}

                                                {{Form::hidden('user_id', Auth::id())}}
                                                {{Form::hidden('item', $bird->id)}}
                                                {{Form::hidden('category', 6)}}

                                                <input style="width: 100%;"  placeholder="Kiekis" type="number" name="quantity" min="1" max="5" required> </div>
                                                @endauth


                                            <div class="col-md-2 rudasfonas  sellrow">
                                                <input type="image" class="cartimg" name="submit" src="/images/img/icone/bag.png" alt="Submit"/>
                                                {!! Form::close() !!}
                                            </div>
                                    </div>
                                </div>

                        </div>
                    </div>
                </div>
            </div>

                    <div class="aligncenter topatitraukimas">
                        @auth()
                            @if(Auth::user()->admin == 1)
                                <a class="btn btn-primary" href="/pauksciai/{{$bird->id}}/edit">Keisti prekę</a>
                            @endif
                        @endauth
                    </div>


        </div>
    </div>
</div>




@endsection
