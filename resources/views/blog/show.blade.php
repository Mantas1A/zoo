@extends('layouts.app')

@section('content')


    <div class="container mainmargin">
        <div class="row justify-content-center">
            <div class="col-md-10 topatitraukimasnav">

            <div class="alignright">
                    @auth()
                    @if(Auth::user()->admin == 1)
                        {{Form::open(['method'  => 'DELETE', 'action' => ['BlogController@destroy', $blog->id]])}}
                        {{Form::button('Trinti skelbimą', array('type' => 'submit', 'class' => 'btn btn-danger'))}}
                        {!! Form::close() !!}
                    @endif
                    @endauth
                </div>

                <div class= "rudasfonas">
                    <div class="topatitraukimas">
                        <h2> {{$blog->title}} </h2>
                    </div>
                </div>

                <div class="topatitraukimasdidelis">
                    <div class="row">
                        <div class="col-md-6">
                            <div>
                                <img class="produktopav" src="{{Storage::url($blog->photo)}}" alt="">
                            </div>
                        </div>

                        <div class="col-md-6">
                            <h5>
                                Aprašymas
                            </h5>
                            <div class="rudasfonas produktas">
                                <div class="col-md-12 topatitraukimas ">
                                    <p class="topatitraukimas">{{$blog->description}} </p>
                                </div>
                            </div>

                            <div class="col-md-10 sellrowapacioje">

                                <div class="desktop">
                                    <div class="row">
                                        <div class="col-md-2 sellrow">
                                            <p>Kaina: {{$blog->price}} </p>
                                        </div>
                                    </div>
                                </div>

                                <div class="mobile">
                                    <div class="row">
                                        <div class="col-md-2 rudasfonas sellrow"> <p> Kaina: {{$blog->price}} </p> </div>
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
