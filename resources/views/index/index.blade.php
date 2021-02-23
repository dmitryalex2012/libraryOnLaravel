<?php
/* @var $books array */
?>

@extends('layout')

@section('content')

    <h1>Index page.</h1>


    <pre>
    <?php
        var_dump($books);
    ?>
    </pre>

@endsection
