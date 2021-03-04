<?php
/* @var $books array */
/* @var $filters array */
?>

@extends('layout')

@section('content')

    <h1 class="h1IndexPage">Books list</h1>

<pre>
    <?php
    if (isset($filters)){
        print_r($filters);
    }
    ?>
{{--        {{print_r($filters)}};--}}
</pre>


    <div class="container">

        <div class="row">

            <div class="col-md-3">

                <h3 class="h3Index">Filters</h3>

                <form action="{{route('filter')}}" method="post">
{{--                <form action="{{route('index')}}" method="post">--}}

                    {{ csrf_field() }}

                    <p class="pFiltersIndex">Sorting by:</p>
                    <select class="form-select" aria-label="Default select example" name="sorting">
                        <option value="none">none</option>
                        <option value="publishingYearUp">publishing year up</option>
                        <option value="publishingYearUp">publishing year down</option>
                    </select>

                    <p class="pFiltersIndex">Displaying books:</p>
                    <select class="form-select" aria-label="Default select example" name="filtering">
                        <option value="all">all</option>
                        <option value="before1960">before 1960</option>
                        <option value="after1960">after 1960</option>
                    </select>

{{--                    <p class="pFiltersIndex">Books on page:</p>--}}
{{--                    <select class="form-select" aria-label="Default select example" name="booksOnPage">--}}
{{--                        <option value="5">5</option>--}}
{{--                        <option value="10">10</option>--}}
{{--                        <option value="20">20</option>--}}
{{--                    </select>--}}

                    <p class="pFiltersIndex">Find by author or title:</p>
                    <label>
                        <input type="text" name="findText">
                    </label>
                    <br>

                    <input class="buttonIndex" type="submit">

                </form>

            </div>

            <div class="col-md-9">

                <table class="indexTable">

                    <tr>
                        <th class="firstTd">Book cover</th>
                        <th class="secondTd">Book description</th>
                        <th class="thirdTd">Category</th>
                    </tr>

                    <?php foreach ($books as $book): ?>

                    <tr>
                        <td>
                            <p class="pImageIndex"><?php echo $book['bookCover']; ?></p>
                        </td>
                        <td>
                            <h5><?php echo '"' . $book['title'] . '"'; ?></h5>
                            <h6><?php echo "Author: " . $book['author']; ?></h6>
                            <h6><?php echo "Language: " . $book['language']; ?></h6>
                            <h6 class="h6DescriptionIndex"><?php echo "Description: " . $book['description']; ?></h6>
                            <h6><?php echo "Publishing year: " . $book['publishingYear']; ?></h6>
                        </td>
                        <td>
                            <h6><?php echo $book['category']; ?></h6>
                        </td>
                    </tr>

                    <?php endforeach; ?>

                </table>

            </div>

        </div>

        <?php $i =1; ?>
{{--        <form action="{{route('filter')}}" method="post">--}}

{{--        pageNumber=1--}}

            <nav class="paginationIndex" aria-label="Page navigation example" >
                <ul class="pagination justify-content-center">
                    <?php for ($i=1; $i < 4; $i++): ?>
{{--                    <li class="page-item"><a class="page-link" href="{{route('pageNumber', ['page' => 5])}}"><?php echo $i++; ?></a></li>--}}
                    <li class="page-item"><a class="page-link" href="{{route('pageNumber', ['pageNumber' => $i])}}"><?php echo $i; ?></a></li>
{{--                    <li class="page-item"><a class="page-link" href="#"><?php echo $i++; ?></a></li>--}}
{{--                    <li class="page-item"><a class="page-link" href="#"><?php echo $i++; ?></a></li>--}}
                    <?php endfor; ?>
                </ul>
            </nav>
{{--        </form>>--}}

    </div>

@endsection
