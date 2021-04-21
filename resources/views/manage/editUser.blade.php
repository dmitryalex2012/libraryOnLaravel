<?php

/* @var $books array */
/* @var $booksPagesQuantity int */
/* @var $filters array */
?>

@extends('layouts.manage')

@section('content')

    <div class="container">

                <h3 class="d-flex justify-content-center">{{$pageTitle}}</h3>

        <div class="card-body">
            <form method="POST" action="{{ route('manage.userEdited', $user['id']) }}">
                @csrf

{{--                <div class="form-group mb-4">--}}
{{--                    @error('id')--}}
{{--                    <div class="alert alert-danger">{{$errors->first('id')}}</div>--}}
{{--                    @enderror--}}
{{--                    <label for="id" class="form-label d-flex justify-content-center mb-2">Id</label>--}}
{{--                    <input type="text" class="form-control d-flex justify-content-center mb-2" id="id"--}}
{{--                           name="id" placeholder="{{$user['id']}}" value="{{ old('id') }}">--}}
{{--                </div>--}}

                <div class="form-group mb-4">
                    @error('name')
                    <div class="alert alert-danger">{{$errors->first('name')}}</div>
                    @enderror
                    <label for="name" class="form-label d-flex justify-content-center mb-2">Name</label>
                    <input type="text" class="form-control d-flex justify-content-center mb-2" id="name"
                           name="name" placeholder="{{$user['name']}}" value="{{ old('name') }}">
                </div>

                <div class="form-group mb-4">
                    @error('email')
                    <div class="alert alert-danger">{{$errors->first('email')}}</div>
                    @enderror
                    <label for="email" class="form-label d-flex justify-content-center mb-2">Email</label>
                    <input type="text" class="form-control d-flex justify-content-center mb-2" id="email"
                           name="email" placeholder="{{$user['email']}}" value="{{ old('email') }}">
                </div>

                <div class="form-group mb-4">
                    @error('password')
                    <div class="alert alert-danger">{{$errors->first('password')}}</div>
                    @enderror
                    <label for="password" class="form-label d-flex justify-content-center mb-2">Password</label>
                    <input type="text" class="form-control d-flex justify-content-center mb-2" id="password"
                           name="password" placeholder="{{$user['password']}}" value="{{ old('password') }}">
                </div>

                <div class="form-group mb-4">
                    @error('created_at')
                    <div class="alert alert-danger">{{$errors->first('created_at')}}</div>
                    @enderror
                    <label for="created_at" class="form-label d-flex justify-content-center mb-2">Created at</label>
                    <input type="text" class="form-control d-flex justify-content-center mb-2" id="created_at"
                           name="created_at" placeholder="{{$user['created_at']}}" value="{{ old('created_at') }}">
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
