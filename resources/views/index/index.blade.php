<?php
/* @var $books array */
?>

@extends('layout')

@section('content')

    <h1 class="h1IndexPage">Books list</h1>

    <div class="container">

        <div class="row">

            <div class="col-md-3">
                <h3>Filters</h3>
            </div>

            <div class="col-md-9">

            <?php foreach ($books as $book):
            ?>

                    <table class="indexTable">
                        <tr>
                            <td class="firstTd"><?php echo $book['bookCover']; ?></td>
                            <td class="secondTd"><?php echo $book['title']; ?></td>
                        </tr>
                    </table>

            <?php endforeach;
            ?>

            </div>

        </div>

    </div>

    {{--    <img src="https://lorempixel.com/640/480/cats/?34816" alt="">--}}

{{--    <pre>--}}
<!--    --><?php
//        var_dump($books);
//    ?>
{{--    </pre>--}}

@endsection
