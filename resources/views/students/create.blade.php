@extends('layouts.base')
@section('title','Create New Student')
@section('content')

    <article class="container">
        <section class="row">
            <h1 class="col alert alert-success text-center"> Create Student</h1>
        </section>
    </article>
    <article class="container">
        <section>

    <form action="/students" class="row" method="post">
        @csrf
        <div class="mb-3 col-6">
            <label for="code" class="form-label">Code</label>
            <input type="text" class="form-control" id="code" name="code" value="{{old('value')}}">
        </div>
        <div class="mb-3 col-6">
            <label for="document" class="form-label">Document</label>
            <input type="text" class="form-control" id="document" name="document" value="{{old('document')}}">
        </div>
        <div class="mb-3 col-6">
            <label for="name" class="form-label">Name</label>
            <input type="text" class="form-control" id="name" name="name" value="{{old('name')}}">
        </div>
        <div class="mb-3 col-6">
            <label for="lastname" class="form-label">Last Name</label>
            <input type="text" class="form-control" id="lastName" name="lastname" value="{{old('lastname')}}">
        </div>
        <div class="mb-3 col-6">
            <label for="average" class="form-label">Average</label>
            <input type="text" class="form-control" id="average" name="average" value="{{old('average')}}">
        </div>
        <div class="mb-3 col-6">
            <label for="birth_date" class="form-label">Birth Date</label>
            <input type="date" class="form-control" id="birth_date" name="birth_date" value="{{old('birth_date')}}">
        </div>
        <div class="mb-3 col-6">
            <label for="email" class="form-label">Email</label>
            <input type="text" class="form-control" id="email" name="email" value="{{old('email')}}">
        </div>
        <div class="mb-3 col-12 d-grid">
            <input type="submit" class="btn btn-success text-center">
        </div>
    </form>
{{--     la variable error que a continuacion usamos la entrega el framework laravel       --}}
    @if($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach($errors->all() as $error)
                <li>{{$error}}</li>
                @endforeach
            </ul>
        </div>
    @endif
        </section>
    </article>
@endsection
