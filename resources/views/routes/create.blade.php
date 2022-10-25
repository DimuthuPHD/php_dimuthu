@extends('layouts.master')
@section('content')
<div class="container">
    <div class="col-md-6">
        <br>
        <br>
        <br>
        <h2 class="text-center">Route create</h2>
       @include('routes.form', ['route' => route('route.store'), 'method' => 'POST' , 'model' => null, 'patch' => false])
    </div>
</div>
@endsection
