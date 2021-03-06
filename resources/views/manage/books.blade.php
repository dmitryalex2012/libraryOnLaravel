<?php

/* @var $books array */
/* @var $booksPagesQuantity int */
/* @var $filters array */
?>

@extends('layouts.manage')

@section('content')

    <div class="container">

        <div class="row">

            <div class="col-lg-2">

                {{-- "Filters" section --}}
                <p class="fw-light fs-5 text-center">Filters</p>

                <form method="Get" action="{{route('manage.books')}}">
                    <p class="pFiltersIndex">Sorting by:</p>
                    <select class="form-select" aria-label="Default select example" name="sorting">
                        <option value="none" @if ($request['sorting'] === 'none') selected @endif>none</option>
                        <option value="newBooksFirst" @if ($request['sorting'] === 'newBooksFirst') selected @endif>
                            new books first
                        </option>
                        <option value="oldBooksFirst" @if ($request['sorting'] === 'oldBooksFirst') selected @endif>
                            old books first
                        </option>
                    </select>

                    <p class="pFiltersIndex">Displaying books:</p>
                    <select class="form-select" aria-label="Default select example" name="filtering">
                        <option value="all" @if ($request['filtering'] === 'all')  selected @endif>all</option>
                        <option value="before1980" @if ($request['filtering'] === 'before1980') selected @endif>
                            published before 1980
                        </option>
                        <option value="after1980" @if ($request['filtering'] === 'after1980') selected @endif>
                            published after 1980
                        </option>
                    </select>

                    <p class="pFiltersIndex">Find by author or title:</p>
                    <label class="d-flex justify-content-center">
                        <input class="w-100" type="text" name="findText">
                    </label>                <br>

                    <div class="d-flex justify-content-center">
                        <input class="buttonIndex" type="submit">
                    </div>

                </form>

            </div>

            {{-- "Books list" section --}}
            <div class="col-lg-10">

                <p class="fw-light fs-5 text-center">Books</p>

                <table class="table table-bordered border-success">
                    <thead>
                    <tr>
                        <th class="firstTd" scope="col">Book cover</th>
                        <th class="secondTd" scope="col">Book title</th>
                        <th class="thirdTd" scope="col">Book author</th>
                        <th class="fourthTd" scope="col">Book description</th>
                        <th class="fifthTd" scope="col">Published</th>
                        <th class="sixthTd" scope="col">Category</th>
                        <th class="sevenTd" scope="col">Language</th>
                        <th scope="col">Modifying</th>
                    </tr>
                    </thead>

                    @if (!empty($books))
                        @foreach ($books as $book)
                            <tbody>
                            <tr>
                                <th scope="row">
                                    <img src="{{$book['book_cover']}}" alt="">
                                </th>
                                <td>
                                    <h6>"{{$book['title']}}"</h6>
                                </td>
                                <td>
                                    <h6>{{$book['author']}}</h6>
                                </td>
                                <td>
                                    <h6 class="h6DescriptionIndex">Description: {{$book['description']}}</h6>
                                </td>
                                <td>
                                    <h6 class="h6Index">Language: {{$book['language']}}</h6>
                                    <h6 class="h6Index">Publishing year: {{$book['publishing_year']}}</h6>
                                </td>
                                <td>
                                    <h6 class="h6Index">{{$book['category']}}</h6>
                                </td>
                                <td>
                                    <h6 class="h6Index">{{$book['language']}}</h6>
                                </td>
                                <td>
                                    <div class="my-1">
                                        <a href="{{route('manage.bookEditing', $book['id'])}}"
                                           class="btn btn-outline-secondary btn-sm col-10 pt-pb-2" role="button">Edit
                                        </a>
                                    </div>
                                        <a href="{{route('manage.deleteBook', $book['id'])}}"
                                           class="btn btn-outline-danger btn-sm col-10" role="button">Delete
                                        </a>
                                </td>
                            </tr>
                            </tbody>
                        @endforeach
                    @endif
                </table>

                <div class="d-flex justify-content-center">
                    <a href="{{route('manage.addBook')}}"
                       class="btn btn-primary btn-sm" role="button">Add book
                    </a>
                </div>

            </div>

        </div>

        {{-- "Page numbering" part --}}
        <nav class="paginationIndex" aria-label="Page navigation example" >
            <ul class="pagination justify-content-center">
                {{$books->links()}}
            </ul>
        </nav>

    </div>

@endsection
