@extends('layouts.master')
@section('content')
<div class="container">
    <div class="col-md-6">
        <br>
        <br>
        <br>
        <h2 class="text-center">Sales Representative Update</h2>
       @include('representative.form', ['route' => route('representative.update', $model), 'method' => 'post' , 'model' => $model, 'patch' => true, 'routes' => $routes])
    </div>
</div>
@endsection
