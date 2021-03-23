<?php

?>

@extends('layout')

@section('content')

    <h2 class="h2Auth d-flex justify-content-center">Authorization</h2>

    <form class="row g-4 authForm d-flex justify-content-center">
        <div class="col-md-12">
            <label for="validationDefault01" class="form-label d-flex justify-content-center">First name</label>
            <input type="text" class="form-control" id="validationDefault01" required>
        </div>
        <div class="col-md-12">
            <label for="validationDefault02" class="form-label d-flex justify-content-center">Last name</label>
            <input type="text" class="form-control" id="validationDefault02" required>
        </div>
        <div class="col-md-12">
            <label for="validationDefault03" class="form-label d-flex justify-content-center">Nic</label>
            <input type="text" class="form-control" id="validationDefault03" required>
        </div>
        <div class="col-md-6">
            <label for="validationDefault04" class="form-label d-flex justify-content-center">Phone number</label>
            <input type="text" class="form-control" id="validationDefault04" required>
        </div>
        <div class="col-md-6">
            <label for="validationDefault05" class="form-label d-flex justify-content-center">Email</label>
            <input type="text" class="form-control" id="validationDefault05" required>
        </div>
        <div class="d-grid col-4 mx-auto">
            <button class="btn btn-primary" type="submit">Send</button>
        </div>
    </form>

@endsection