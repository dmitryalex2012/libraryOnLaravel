<?php
/* @var $books array */
/* @var $booksPagesQuantity int */
/* @var $filters array */
?>

@extends('layout')

@section('content')

    <h1 class="h1IndexPage">Books list</h1>

    <?php
//        echo '<pre>';
//        if (isset($books)){
//            print_r($books);
//        }

    //    if (isset($filters)){
    //        print_r($filters);
    //    }
    //        echo '</pre>';
    ?>

    <div class="container">

        <div class="row">

            <div class="col-md-3">

                {{-- "Filters" section --}}
                <h3 class="h3Index">Filters</h3>

                <form action="{{route('filter')}}" method="post">

                    {{ csrf_field() }}

                    <p class="pFiltersIndex">Sorting by:</p>
                    <select class="form-select" aria-label="Default select example" name="sorting">
                        <option value="none" @if ($filters['sorting'] === 'none') selected @endif>none</option>
                        <option value="newBooksFirst" @if ($filters['sorting'] === 'newBooksFirst') selected @endif>
                            new books first
                        </option>
                        <option value="oldBooksFirst" @if ($filters['sorting'] === 'oldBooksFirst') selected @endif>
                            old books first
                        </option>
                    </select>

                    <p class="pFiltersIndex">Displaying books:</p>
                    <select class="form-select" aria-label="Default select example" name="filtering">
                        <option value="all" @if ($filters['filtering'] === 'all')  selected @endif>all</option>
                        <option value="before1980" @if ($filters['filtering'] === 'before1980') selected @endif>
                            published before 1980
                        </option>
                        <option value="after1980" @if ($filters['filtering'] === 'after1980') selected @endif>
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

                    @foreach ($books as $book)
                    <tbody>
                        <tr>
                            <th scope="row">
{{--                                <p class="pImageIndex">{{$book['book_cover']}}</p>--}}
                                <img src="{{$book['book_cover']}}" alt="">
                            </th>
                            <td>
                                <h6>"{{$book['title']}}"</h6>
                            </td>
                            <td>
                                <h6>Author: {{$book['author']}}</h6>
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
                </table>

            </div>

        </div>

        {{-- "Page numbering" part --}}
        <nav class="paginationIndex" aria-label="Page navigation example" >
            <ul class="pagination justify-content-center">
                @for ($i=1; $i <= $booksPagesQuantity; $i++)
                <li class="page-item">
                    <a class="page-link" href="{{route('pageNumber', ['pageNumber' => $i])}}">{{$i}}</a>
                </li>
                @endfor
            </ul>
        </nav>

    </div>

@endsection
