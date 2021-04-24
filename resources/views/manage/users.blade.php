<?php

/* @var $books array */
/* @var $booksPagesQuantity int */
/* @var $filters array */
?>

@extends('layouts.manage')

@section('content')

    <div class="container">

        <div class="row">

            <div class="col-md-2">

                {{-- "Filters" section--}}
                <h3 class="fw-light fs-5 text-center">Filters</h3>

                <form method="Get" action="{{route('manage.users')}}">
                    <p class="pt-3 pb-1 mb-0 d-flex justify-content-center">Sorting by:</p>
                    <select class="form-select" aria-label="Default select example" name="sorting">
                        <option value="none" @if ($request['sorting'] === 'none') selected @endif>none</option>
                        <option value="alphabetOrder" @if ($request['sorting'] === 'alphabetOrder') selected @endif>
                            names in alphabet order
                        </option>
                        <option value="reverseAlphabetOrder"
                            @if ($request['sorting'] === 'reverseAlphabetOrder') selected @endif>
                            names in reverse alphabet order
                        </option>
                    </select>

                    <p class="pt-3 pb-1 mb-0 d-flex justify-content-center">Displaying users:</p>
                    <select class="form-select" aria-label="Default select example" name="filtering">
                        <option value="all" @if ($request['filtering'] === 'all')  selected @endif>all</option>
                        <option value="before2020" @if ($request['filtering'] === 'before2020') selected @endif>
                            published before 2020
                        </option>
                        <option value="after2020" @if ($request['filtering'] === 'after2020') selected @endif>
                            published after 2020
                        </option>
                    </select>

                    <p class="pt-3 pb-1 mb-0 d-flex justify-content-center">Find by user name:</p>
                    <label class="d-flex justify-content-center">
                        <input class="w-100" type="text" name="findText">
                    </label>
                    <br>

                    <div class="d-flex justify-content-center">
                        <input class="buttonIndex" type="submit">
                    </div>

                </form>

            </div>

            {{-- "Users list" section --}}
            <div class="col-md-10">

                <p class="d-flex justify-content-center">Users</p>

                <table class="table table-bordered border-success">
                    <thead>
                    <tr>
                        <th class="firstTd" scope="col">Id</th>
                        <th class="secondTd" scope="col">Name</th>
                        <th class="thirdTd" scope="col">Email</th>
                        <th class="fourthTd" scope="col">Created</th>
                        <th class="fourthTd" scope="col">Action</th>
                    </tr>
                    </thead>

                    @if (!empty($users))
                        @foreach ($users as $user)
                            <tbody>
                            <tr>
                                <th scope="row">
                                    <h6>{{$user['id']}}</h6>
                                </th>
                                <td>
                                    <h6>{{$user['name']}}</h6>
                                </td>
                                <td>
                                    <h6>{{$user['email']}}</h6>
                                </td>
                                <td>
                                    <h6>{{$user['created_at']}}</h6>
                                </td>
                                <td>
                                    <a href="{{route('manage.userEditing', $user->id)}}"
                                       class="btn btn-primary btn-sm" role="button">Edit
                                    </a>
                                </td>
                            </tr>
                            </tbody>
                        @endforeach
                    @endif
                </table>

                <div class="d-flex justify-content-center">
                    <a href="{{route('manage.addUser')}}"
                       class="btn btn-primary btn-sm" role="button">Add user
                    </a>
                </div>

            </div>

        </div>

        {{-- "Page numbering" part --}}
        <nav class="paginationIndex" aria-label="Page navigation example" >
            <ul class="pagination justify-content-center">
                {{$users->links()}}
            </ul>
        </nav>

    </div>

@endsection
