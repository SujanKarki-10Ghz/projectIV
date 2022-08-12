@extends('layouts.frontend')
@section('title')
    Thank You
@endsection
@section('content')
    <section class="bg-success">
        <div class="container">
            <div class="row">
                <div class="col-md-12 mt-2 py-2">
                    <h5><a href="/" class="text-dark">Home</a> › Thank You</h5>
                </div>
            </div>
        </div>
    </section>
    <div class="container">
        <div class="row">
            <div class="col-md-12 text-center">
                <div class="shadow border py-5">
                    <h4>Thank You for Shopping.</h4>
                   @if(session('status'))
                       <h3>{{session('status')}}</h3>
                    @endif
                </div>
            </div>
        </div>
    </div>
@endsection
