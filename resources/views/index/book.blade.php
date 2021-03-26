<?php
/* @var $books array */
/* @var $booksPagesQuantity int */
/* @var $filters array */
?>

@extends('layout')

@section('content')

    <h1 class="h1IndexPage">Books list</h1>

    <div class="container">

        <div class="row">

            <div class="col-md-3">

                {{-- "Filters" section --}}
                <h3 class="h3Index">Filters</h3>

                <form method="Get" action="{{route('filter')}}">
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
                    <label>
                        <input type="text" name="findText">
                    </label>
                    <br>

                    <input class="buttonIndex" type="submit">

                </form>

            </div>

            {{-- "Books list" section --}}
            <div class="col-md-9">

                <table class="table table-bordered border-success">
                    <thead>
                        <tr>
                            <th class="firstTd" scope="col">Book cover</th>
                            <th class="secondTd" scope="col">Book title</th>
                            <th class="thirdTd" scope="col">Book author</th>
                            <th class="fourthTd" scope="col">Book description</th>
                            <th class="fifthTd" scope="col">Book data</th>
                            <th class="sixthTd" scope="col">Category</th>
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
                            </tr>
                        </tbody>
                        @endforeach
                    @endif
                </table>

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
