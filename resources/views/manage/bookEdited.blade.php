<?php

/* @var $books array */
/* @var $booksPagesQuantity int */
/* @var $filters array */
?>

@extends('layouts.manage')

@section('content')

    <div class="container">

        <h3 class="d-flex justify-content-center">{{$message}}</h3>

        <img src="{{ asset('/storage/' . $path) }}" width="100" height="100" alt="">
        <h3 class="d-flex justify-content-center">User '{{ asset('/storage/' . $path) }}' in DB</h3>
    </div>

@endsection
