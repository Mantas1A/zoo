@extends('layouts.app')

@section('content')


<div class="container mainmargin">
        <div class="row justify-content-center">
            <div class="col-md-10 topatitraukimasnav">

                    <div class= "rudasfonas">
                            <div class="topatitraukimas">
                                        <h2> Gyvūnėliai </h2>
                            </div>
                    </div>

@foreach($birds->chunk(3) as $chunk)
    <div class="row topatitraukimas">
        @foreach($chunk as $birder)
            <div class="col-md-4">

                    <div class="card">
                            <img class="cardphoto" src="{{Storage::url($birder->photo)}}" alt="" style="width:100%">
                            <div class="cardcontainer">
                                <h5><b>{{$birder->item_name}}</b></h5>
                                <p>Išmatavimai: {{$birder->dimensions}} </p>
                                <p style="height: 44.8px;">{{ str_limit($birder->description, 30) }} </p>
                                <p>Kaina: {{$birder->price}} </p>
                                <a href="/pauksciai/{{$birder->id}}"> <p>  plačiau apie produktą... </p> </a>
                                <div class="">
                                    <div class = "row topatitraukimasdidelis justify-content-center">

                                    <div class="col-md-3">
                                            {!! Form::open(['action' => 'CartController@store', $birder->id]) !!}

                                            {{Form::hidden('user_id', Auth::id())}}
                                            {{Form::hidden('item', $birder->id)}}
                                            {{Form::hidden('category', 6)}}
                                            {{Form::hidden('quantity', 1)}}
                                            <input type="image" class="cartimg" name="submit" src="/images/img/icone/bag.png" alt="Submit"/>

                                            {!! Form::close() !!}

                                        </div>
                                        <div class="col-md-3">
                                            {!! Form::open(['action' => 'LikeController@store', $birder->id]) !!}

                                            {{Form::hidden('user_id', Auth::id())}}
                                            {{Form::hidden('item', $birder->id)}}
                                            {{Form::hidden('category', 6)}}
                                            <input type="image" class="cartimg" name="submit" src="/images/img/icone/heart.png" alt="Submit"/>

                                            {!! Form::close() !!}
                                        </div>

                                    </div>
                                </div>


                            </div>
                          </div>
            </div>
        @endforeach
    </div>
@endforeach

        </div>
    </div>
</div>

@endsection

