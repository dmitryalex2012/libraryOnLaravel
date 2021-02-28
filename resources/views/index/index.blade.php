<?php
/* @var $books array */
/* @var $filters string */
?>

@extends('layout')

@section('content')

    <h1 class="h1IndexPage">Books list</h1>

<?php
//        echo $books[1]['title'];
?>

    <div class="container">

        <div class="row">

            <div class="col-md-3">
                <h3 class="h3Index">Filters</h3>

                <?php
//                if (isset($filters)):
                ?>
                <p><?php echo $filters; ?></p>
                <?php
//                endif;
                $filters = "ok";
                $array = "ok";
//                $array = ['filter' =>'ok'];
//                $array = json_encode($array);
                ?>

                <div class="booksOnPage dropdown">
                    <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-bs-toggle="dropdown" aria-expanded="false">
                        Books on page
                    </button>
                    <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton">
{{--                        <li><a class="dropdown-item" href={{ action('IndexController@filters', serialize($filter)) }}>10</a></li>--}}
                        <li><a class="dropdown-item" href={{ action('IndexController@filters', $array) }}>10</a></li>
                        <li><a class="dropdown-item" href="#">20</a></li>
                        <li><a class="dropdown-item" href="#">30</a></li>
                    </ul>
                </div>


                <p>Books on page</p>
                <select class="form-select" aria-label="Default select example">
                    <option selected value="1">10</option>
                    <option value="2">20</option>
                    <option value="3">30</option>
                </select>


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

        <nav class="paginationIndex" aria-label="Page navigation example">
            <ul class="pagination justify-content-center">
                <li class="page-item"><a class="page-link" href="#"><?php echo $i++; ?></a></li>
                <li class="page-item"><a class="page-link" href="#"><?php echo $i++; ?></a></li>
                <li class="page-item"><a class="page-link" href="#"><?php echo $i++; ?></a></li>
            </ul>
        </nav>

    </div>

{{--    <pre>--}}
{{--    <?php--}}
{{--        var_dump($books);--}}
{{--    ?>--}}
{{--    </pre>--}}

@endsection
