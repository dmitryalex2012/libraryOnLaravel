<?php

use Illuminate\Support\Facades\Auth;

/* @var Auth Illuminate\Support\Facades\Auth */

?>

@extends('layouts.manage')

@section('content')

    <p class="d-flex justify-content-center">
        Dear, {{__(Auth::user()->name)}}, welcome to "manage" section.
    </p>

@endsection
