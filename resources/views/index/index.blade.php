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
                        <option value="none" <?php if ($filters['sorting'] === 'none') echo "selected"; ?>>none</option>
                        <option value="newBooksFirst" <?php if ($filters['sorting'] === 'newBooksFirst') echo "selected"; ?>>new books first</option>
                        <option value="oldBooksFirst" <?php if ($filters['sorting'] === 'oldBooksFirst') echo "selected"; ?>>old books first</option>
                    </select>

                    <p class="pFiltersIndex">Displaying books:</p>
                    <select class="form-select" aria-label="Default select example" name="filtering">
                        <option value="all" <?php if ($filters['filtering'] === 'all') echo "selected"; ?>>all</option>
                        <option value="before1980" <?php if ($filters['filtering'] === 'before1980') echo "selected"; ?>>published before 1980</option>
                        <option value="after1980" <?php if ($filters['filtering'] === 'after1980') echo "selected"; ?>>published after 1980</option>
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

                <table class="indexTable">

                    <tr>
                        <th class="firstTd">Book cover</th>
                        <th class="secondTd">Book description</th>
                        <th class="thirdTd">Category</th>
                    </tr>

                    <?php
                    foreach ($books as $book):
                    ?>

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

                    <?php
                    endforeach;
                    ?>

                </table>

            </div>

        </div>

        {{-- "Page numbering" part --}}
        <nav class="paginationIndex" aria-label="Page navigation example" >
            <ul class="pagination justify-content-center">
                <?php for ($i=1; $i <= $booksPagesQuantity; $i++): ?>
                <li class="page-item"><a class="page-link" href="{{route('pageNumber', ['pageNumber' => $i])}}"><?php echo $i; ?></a></li>
                <?php endfor; ?>
            </ul>
        </nav>

    </div>

@endsection
