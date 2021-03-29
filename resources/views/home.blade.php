<?php

use Illuminate\Support\Facades\Auth;

/* @var Auth Illuminate\Support\Facades\Auth */
?>

@extends('./layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-body d-flex justify-content-center">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    {{ __('You are logged in, ' . Auth::user()->name) . '!' }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
