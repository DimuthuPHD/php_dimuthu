@extends('layouts.master')
@section('content')
<div class="container">
    <div class="col-md-6">
        <br>
        <br>
        <br>
        <h2 class="text-center">Route Update</h2>
       @include('routes.form', ['route' => route('route.update', $model), 'method' => 'post' , 'model' => $model, 'patch' => true])
    </div>
</div>
@endsection
