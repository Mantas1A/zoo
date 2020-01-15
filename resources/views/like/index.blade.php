@extends('layouts.app')

@section('content')

    <div class="container mainmargin">
        <div class="row justify-content-center">
            <div class="col-md-11 topatitraukimasnav">
                <div class= "rudasfonas">
                    <div class="topatitraukimas">
                        <h2> Prekių krepšelis </h2>
                    </div>
                </div>
            </div>
        </div>

        @foreach($items as $item)
            <div class="topatitraukimas">
                <div class="row ">
                    <div class="col-md-3">
                        <a href="">
                            <div class = "skelbimopav">
                                <img class="skelbimopav" src="{{Storage::url($item[0]->photo)}}" alt="">
                            </div>
                        </a>

                    </div>

                    <div class="col-md-9 ">
                        <div class="rudasfonas skelbimas">
                            <div class="row">
                                <div class="col-md-8 topatitraukimas ">
                                    <h6> {{$item[0]->item_name}} </h6>
                                    <p class="topatitraukimas">{{$item[0]->description}}</p>
                                </div>
                                <div class="col-md-4 topatitraukimas">
                                    <p>Kaina: {{$item[0]->price}}</p>
                                    <div>
                                        {{Form::open(['method'  => 'DELETE', 'action' => ['LikeController@destroy', $item->like_id]])}}
                                        {{Form::button('Pamiršti', array('type' => 'submit', 'class' => 'btn btn-danger'))}}
                                        {!! Form::close() !!}
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach


    </div>
@endsection
