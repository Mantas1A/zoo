@extends('layouts.app')

@section('content')

{!! Form::open(['action' => 'HelpController@store']) !!}

<div class="container mainmargin">
    <div class="row justify-content-center">
        <div class="col-md-9">
            <div class="topatitraukimasnav">

                    <div class= "rudasfonas">
                            <div class="topatitraukimas">
                                        <h2> Pagalbos centras </h2>
                            </div>
                    </div>

                    <div class="topatitraukimas">
                        @auth()
                        <div class="form-group none">
                            {{Form::text('email', $user->email, ['class' => 'form-control', 'placeholder' => 'Jūsų e-mail adresas'])}}
                        </div>
                        @endauth
                        @guest()
                        <div class="form-group">
                            {{Form::text('email', '', ['class' => 'form-control', 'placeholder' => 'Jūsų e-mail adresas'])}}
                        </div>
                        @endguest
                        <div class="form-group">
                            {{Form::label('message', 'Pranešimas')}}
                            {{Form::textarea('message', '', ['class' => 'form-control', 'placeholder' => 'Aprašykite problemą, su kuria susidūrėte'])}}
                        </div>
                    </div>



    <div class="aligncenter"> {{Form::submit('Siųsti', ['class' => 'btn btn-primary'])}} </div>
{!! Form::close() !!}


            </div>
        </div>
    </div>
</div>




@endsection
