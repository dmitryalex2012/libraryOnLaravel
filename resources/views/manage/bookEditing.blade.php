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

            <form method="POST" action="{{ route('manage.bookEdited', $book['id']) }}" enctype="multipart/form-data">
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
                    <label for="description" class="form-label d-flex justify-content-center mb-2">Description</label>
                    <input type="text" class="form-control d-flex justify-content-center mb-2" id="description"
                           name="description" placeholder="{{$book['description']}}" value="{{ old('description') }}">
                </div>

                <div class="form-group mb-4">
                    @error('userCover')
                    <div class="alert alert-danger">{{$errors->first('book_cover')}}</div>
                    @enderror
                    <label for="userCover" class="form-label d-flex justify-content-center">Book cover</label>
                    <div class="d-flex justify-content-center mb-2">
                        <img src="{{$book['book_cover']}}" width="100" height="100" alt="">
                    </div>
                    <div class="d-flex justify-content-center">
                        <label for="userCover">For change book cover </label>
                        <input id="userCover" type="file" name="userCover">
                    </div>

                </div>

                <div class="form-group mb-4">
                    @error('category')
                    <div class="alert alert-danger">{{$errors->first('category')}}</div>
                    @enderror
                    <label for="category" class="form-label d-flex justify-content-center mb-2">Category</label>
                    <input type="text" class="form-control d-flex justify-content-center mb-2" id="category"
                           name="category" placeholder="{{$book['category']}}" value="{{ old('category') }}">
                </div>

                <div class="form-group mb-4">
                    @error('language')
                    <div class="alert alert-danger">{{$errors->first('language')}}</div>
                    @enderror
                    <label for="language" class="form-label d-flex justify-content-center mb-2">Language</label>
                    <input type="text" class="form-control d-flex justify-content-center mb-2" id="language"
                           name="language" placeholder="{{$book['language']}}" value="{{ old('language') }}">
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

                <div class="form-group mb-4">
                    @error('created_at')
                    <div class="alert alert-danger">{{$errors->first('created_at')}}</div>
                    @enderror
                    <label for="created_at" class="form-label d-flex justify-content-center mb-2">Created at
                    </label>
                    <input type="text" class="form-control d-flex justify-content-center mb-2" id="created_at"
                           name="created_at" placeholder="{{$book['created_at']}}"
                           value="{{ old('created_at') }}">
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
