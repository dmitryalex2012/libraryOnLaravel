<?php

/* @var $books array */
/* @var $booksPagesQuantity int */
/* @var $filters array */
?>

@extends('layouts.manage')

@section('content')

    <div class="container">

                <h3 class="d-flex justify-content-center">User editing</h3>

        <pre>
        <?php
//            var_dump($user);
        ?>
        </pre>

        <div class="card-body">
            <form method="POST" action="{{ route('userEdited') }}">
                @csrf

                <div class="form-group mb-4">
                    <label for="id" class="form-label d-flex justify-content-center mb-2">Id</label>
                    <input type="text" class="form-control d-flex justify-content-center mb-2" id="id"
                           name="id" placeholder="{{$user['id']}}">
                </div>

                <div class="form-group mb-4">
                    <label for="name" class="form-label d-flex justify-content-center mb-2">Name</label>
                    <input type="text" class="form-control d-flex justify-content-center mb-2" id="name"
                           name="name" placeholder="{{$user['name']}}">
                </div>

                <div class="form-group mb-4">
                    <label for="email" class="form-label d-flex justify-content-center mb-2">Email</label>
                    <input type="text" class="form-control d-flex justify-content-center mb-2" id="email"
                           name="email" placeholder="{{$user['email']}}">
                </div>

                <div class="form-group mb-4">
                    <label for="created_at" class="form-label d-flex justify-content-center mb-2">Created at</label>
                    <input type="text" class="form-control d-flex justify-content-center mb-2" id="created_at"
                           name="created_at" placeholder="{{$user['created_at']}}">
                </div>

                <div class="form-group row mb-0">
                    <div class="col-md-12 offset-md-4">
                        <button type="submit" class="btn btn-primary">
                            {{ __('Send') }}
                        </button>
                    </div>
                </div>

            </form>
        </div>

    </div>

@endsection
