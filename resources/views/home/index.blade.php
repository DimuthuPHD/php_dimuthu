@extends('layouts.master')
@section('content')
<div class="container">
     <br><br><br>
            <div class="row">
                    <div class="col-md-3"></div>
                    <div class="col-md-6">
                        <div class="col-md-3"></div>
                        <h3>Welcome to the Parker's Company</h3>
                    </div>

            </div>
            <br>
            <div class="row">
                <div class="col-md-3"></div>
                <div class="col-md-6">
                    <ul>
                        <li><a href="{{ route('representative.index') }}">Manage Representatives</a></li>
                        <li><a href="{{ route('route.index') }}">Manae Routes</a></li>
                    </ul>
                </div>
                <div class="col-md-3"></div>
            </div>
    </div>
@endsection
