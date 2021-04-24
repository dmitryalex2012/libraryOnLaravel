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

            <form method="POST" action="{{ route('manage.bookEdited', $book['id']) }}">
                @csrf

                <div class="form-group mb-4">
                    @error('id')
                    <div class="alert alert-danger">{{$errors->first('id')}}</div>
                    @enderror

                    <label for="id" class="form-label d-flex justify-content-center mb-2">Id</label>
                    <input type="text" class="form-control d-flex justify-content-center mb-2" id="id"
                           name="id" placeholder="{{$book['id']}}" value="{{ old('id') }}">
                </div>

                <div class="form-group mb-4">
                    @error('title')
                    <div class="alert alert-danger">{{$errors->first('title')}}</div>
                    @enderror

                    <label for="title" class="form-label d-flex justify-content-center mb-2">Title</label>
                    <input type="text" class="form-control d-flex justify-content-center mb-2" id="title"
                           name="title" placeholder="{{$book['title']}}" value="{{ old('title') }}">
                </div>

                <div class="form-group mb-4">
                    @error('author')
                    <div class="alert alert-danger">{{$errors->first('author')}}</div>
                    @enderror
                    <label for="author" class="form-label d-flex justify-content-center mb-2">Author</label>
                    <input type="text" class="form-control d-flex justify-content-center mb-2" id="author"
                           name="author" placeholder="{{$book['author']}}" value="{{ old('author') }}">
                </div>

                <div class="form-group mb-4">
                    @error('description')
                    <div class="alert alert-danger">{{$errors->first('description')}}</div>
                    @enderror
                    <label for="description" class="form-label d-flex justify-content-center mb-2">description</label>
                    <input type="text" class="form-control d-flex justify-content-center mb-2" id="description"
                           name="description" placeholder="{{$book['description']}}" value="{{ old('description') }}">
                </div>

{{--                <div class="form-group mb-4">--}}
{{--                    @error('book_cover')--}}
{{--                    <div class="alert alert-danger">{{$errors->first('book_cover')}}</div>--}}
{{--                    @enderror--}}
{{--                    <label for="book_cover" class="form-label d-flex justify-content-center mb-2">Book cover</label>--}}
{{--                    <input type="text" class="form-control d-flex justify-content-center mb-2" id="book_cover"--}}
{{--                           name="book_cover" placeholder="{{$book['book_cover']}}" value="{{ old('book_cover') }}">--}}
{{--                </div>--}}

                <div class="form-group mb-4">
                    @error('category')
                    <div class="alert alert-danger">{{$errors->first('category')}}</div>
                    @enderror
                    <label for="category" class="form-label d-flex justify-content-center mb-2">Category</label>
                    <input type="text" class="form-control d-flex justify-content-center mb-2" id="category"
                           name="category" placeholder="{{$book['category']}}" value="{{ old('category') }}">
                </div>

                <div class="form-group mb-4">
                    @error('publishing_year')
                    <div class="alert alert-danger">{{$errors->first('publishing_year')}}</div>
                    @enderror
                    <label for="publishing_year" class="form-label d-flex justify-content-center mb-2">Publishing year
                    </label>
                    <input type="text" class="form-control d-flex justify-content-center mb-2" id="publishing_year"
                           name="publishing_year" placeholder="{{$book['publishing_year']}}"
                           value="{{ old('publishing_year') }}">
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
