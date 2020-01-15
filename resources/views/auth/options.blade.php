@extends('layouts.app')

@section('content')

    {!! Form::open(['action' => ['HomeController@updateuser', $user->id], 'method' => 'PUT']) !!}

    <div class="container mainmargin">
        <div class="row justify-content-center">
            <div class="col-md-9">
                <div class="topatitraukimasnav">

                    <div class="form-group">
                        {{Form::label('name', 'Vartotojo vardas')}}
                        {{Form::text('name', $user->name, ['class' => 'form-control', 'placeholder' => 'Vartotojo vardas'])}}
                    </div>

                    <div class="form-group">
                        {{Form::label('location', 'Vietovė')}}
                        {{Form::text('location', $user->location, ['class' => 'form-control', 'placeholder' => 'Vietovė'])}}
                    </div>

                    <div class="aligncenter">{{Form::submit('Keisti nustatymus', ['class' => 'btn btn-primary'])}}</div>

                </div>
            </div>
        </div>
    </div>

    {!! Form::close() !!}




@endsection
