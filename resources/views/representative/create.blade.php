@extends('layouts.master')
@section('content')
<div class="container">
    <div class="col-md-6">
        <br>
        <br>
        <br>
        <h2 class="text-center">Sales Representative create</h2>
       @include('representative.form', ['route' => route('representative.store'), 'method' => 'POST' , 'model' => null, 'patch' => false, 'routes' => $routes])
    </div>
</div>
@endsection
