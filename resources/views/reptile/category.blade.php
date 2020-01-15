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

@foreach($reptiles->chunk(3) as $chunk)
    <div class="row topatitraukimas">
        @foreach($chunk as $reptiler)
            <div class="col-md-4">

                    <div class="card">
                            <img class="cardphoto" src="{{Storage::url($reptiler->photo)}}" alt="" style="width:100%">
                            <div class="cardcontainer">
                                <h5><b>{{$reptiler->item_name}}</b></h5>
                                <p>Išmatavimai: {{$reptiler->dimensions}} </p>
                                <p style="height: 44.8px;">{{ str_limit($reptiler->description, 30) }} </p>
                                <p>Kaina: {{$reptiler->price}} </p>
                                <a href="/ropliai/{{$reptiler->id}}"> <p>  plačiau apie produktą... </p> </a>
                                <div class="">
                                    <div class = "row topatitraukimasdidelis justify-content-center">

                                    <div class="col-md-3">
                                            {!! Form::open(['action' => 'CartController@store', $reptiler->id]) !!}

                                            {{Form::hidden('user_id', Auth::id())}}
                                            {{Form::hidden('item', $reptiler->id)}}
                                            {{Form::hidden('category', 5)}}
                                            {{Form::hidden('quantity', 1)}}
                                            <input type="image" class="cartimg" name="submit" src="/images/img/icone/bag.png" alt="Submit"/>

                                            {!! Form::close() !!}

                                        </div>
                                        <div class="col-md-3">
                                            {!! Form::open(['action' => 'LikeController@store', $reptiler->id]) !!}

                                            {{Form::hidden('user_id', Auth::id())}}
                                            {{Form::hidden('item', $reptiler->id)}}
                                            {{Form::hidden('category', 5)}}
                                            <input type="image" class="cartimg" name="submit" src="/images/img/icone/heart.png" alt="Submit"/>

                                            {!! Form::close() !!}
                                        </div>

                                        <div class="col-md-3">
                                            <img class="cardcart"src="/images/img/icone/bag.png">
                                        </div>
                                        <div class="col-md-3">
                                            <img class="cardcart"src="/images/img/icone/heart.png">
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

