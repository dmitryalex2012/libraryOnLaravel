<?php

use Illuminate\Support\Facades\Auth;

/* @var Auth Illuminate\Support\Facades\Auth */

?>

@extends('layouts.manage')

@section('content')

    <p class="d-flex justify-content-center">
        Dear, {{__(Auth::user()->name)}}, you are in "manage" section.
    </p>

@endsection