@extends('layouts.base')
@section('title') Students list @endsection
@section('content')

    <article class="container">
        <section class="row">
            <h1 class="col alert alert-success text-center">Students</h1>
        </section>
    </article>
    <article class="container">
        <section class="row">
<div class="col">
    <table class="table table-bordered table-striped">
        <thead>
        <tr>
            <th>Code</th>
            <th>Document</th>
            <th>Name</th>
            <th>LastName</th>
            <th>Average</th>
            <th>Birth Date</th>
            <th>Email</th>
        </tr>
        </thead>
        <tbody>
        @foreach($students as $student)
        <tr>
            <td>{{$student->code}}</td>
            <td>{{$student->document}}</td>
            <td>{{$student->name}}</td>
            <td>{{$student->lastname}}</td>
            <td>{{$student->average}}</td>
            <td>{{$student->birth_date}}</td>
            <td>{{$student->email}}</td>
            <td><a href="/students/{{$student->id_student}}" class="btn btn-primary">Show</a></td>
            <td><a href="/students/{{$student->id_student}}/edit" class="btn btn-success">Edit</a></td>
            <td>
            <form action="/students/{{$student->id_student}}" method="POST">
                @csrf
                @method('DELETE')
                <input
                type="submit"
                value="Delete"
                class="btn btn-danger"
                onclick="return confirm('Are you Sure ?')"
                >
            </form>
            </td>
        </tr>
        @endforeach
        </tbody>
    </table>
</div>
        </section>
        <section class="row">
            <div class="col d-grid">
                <a href="/students/create" class="btn btn-success text-center">Create new Student</a>
            </div>
        </section>
    </article>
@endsection
