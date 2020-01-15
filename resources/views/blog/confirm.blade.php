@extends('layouts.app')

@section('content')
    <div class="container mainmargin">
        <div class="row justify-content-center">
            <div class="col-md-9">
                <div class="topatitraukimasnav">

                    <h1>Tvirtinimas</h1>

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

                                                {{Form::open(['action' => ['BlogController@confirm', $blog->id], 'method'  => 'put'])}}
                                                {{Form::button('Patvirtinti', array('type' => 'submit', 'class' => 'btn btn-success'))}}
                                                {!! Form::close() !!}

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
    </div>
@endsection
