@extends('layouts.app')

@section('content')

    {!! Form::model($fish, ['action' => ['FishController@update', $fish->id], 'files' => true, 'method' => 'PUT']) !!}

    <div class="container mainmargin">
        <div class="row justify-content-center">
            <div class="col-md-9">
                <div class="topatitraukimasnav">

                <div class="alignright">
                    @auth()
                    @if(Auth::user()->admin == 1)
                        {{Form::open(['method'  => 'DELETE', 'action' => ['fishController@destroy', $fish->id]])}}
                        {{Form::button('Trinti prekę', array('type' => 'submit', 'class' => 'btn btn-danger'))}}
                        {!! Form::close() !!}
                    @endif
                    @endauth
                </div>

                    <div class="form-group">
                        {{Form::label('title', 'Prekės pavadinimas')}}
                        {{Form::text('title', $fish->item_name, ['class' => 'form-control', 'placeholder' => 'Prekės pavadinimas'])}}
                    </div>
                    <div class="form-group">
                        {{Form::label('description', 'Aprašymas')}}
                        {{Form::textarea('description', $fish->description, ['class' => 'form-control', 'placeholder' => 'Aprašymas'])}}
                    </div>
                    <div class="form-group">
                        {{Form::label('dimension', 'Dydis')}}
                        {{Form::text('dimension', $fish->dimension, ['class' => 'form-control', 'placeholder' => 'Dydis'])}}
                    </div>
                    <div class="form-group">
                        {{Form::label('quantity', 'Kiekis')}}
                        {{Form::number('quantity', $fish->quantity, ['class' => 'form-control', 'placeholder' => 'Kiekis'])}}
                    </div>
                    <div class="form-group">
                        {{Form::label('price', 'Kaina')}}
                        {{Form::number('price', $fish->price, ['class' => 'form-control', 'placeholder' => 'Kaina', 'step' => '0.01'])}}
                    </div>
                    <div class="aligncenter">{{Form::submit('Pakeisti prekę', ['class' => 'btn btn-primary'])}}</div>
                </div>
            </div>
        </div>
    </div>



    {!! Form::close() !!}


@endsection
