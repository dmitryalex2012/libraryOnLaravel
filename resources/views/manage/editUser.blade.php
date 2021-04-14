<?php

/* @var $books array */
/* @var $booksPagesQuantity int */
/* @var $filters array */
?>

@extends('layouts.manage')

@section('content')

    <div class="container">

                <h3 class="d-flex justify-content-center">User editing</h3>


                <form method="Get" action="#">

                    <label for="inputAddress2" class="form-label d-flex justify-content-center mb-2">Name</label>
                    <input type="text" class="form-control d-flex justify-content-center mb-2" id="inputAddress2"
                           placeholder="{{$user->name}}">

                    <div class="d-flex justify-content-center mb-2">
                        <input class="buttonIndex" type="submit">
                    </div>

                </form>

                <table class="table table-bordered border-success">
                    <thead>
                    <tr>
                        <th class="firstTd" scope="col">Id</th>
                        <th class="secondTd" scope="col">Name</th>
                        <th class="thirdTd" scope="col">Email</th>
                        <th class="fourthTd" scope="col">Created</th>
                    </tr>
                    </thead>

                    @if (!empty($user))
                            <tbody>
                            <tr>
                                <th scope="row">
                                    <h6>{{$user->id}}</h6>
                                </th>
                                <td>
                                    <h6>{{$user->name}}</h6>
                                </td>
                                <td>
                                    <h6>{{$user->email}}</h6>
                                </td>
                                <td>
                                    <h6>{{$user->created_at}}</h6>
                                </td>
                            </tr>
                            </tbody>
                    @endif
                </table>

    </div>

@endsection
