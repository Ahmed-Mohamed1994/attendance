@extends('layouts.master')

@section('title')
    attendance dashboard
@endsection

@section('content')
    @include('includes.message-block')
    <section class="row">
        <div class="col-md-6 col-md-offset-3">
            <h3>Create New Attendance User</h3>
            <form action="{{ route('storeUser') }}" method="post">
                <div class="form-group {{ $errors->has('email') ? 'has-error' : '' }}">
                    <label for="email">Name</label>
                    <input class="form-control" type="text" name="name" id="name">
                </div>
                <div class="form-group {{ $errors->has('email') ? 'has-error' : '' }}">
                    <label for="email">Email</label>
                    <input class="form-control" type="text" name="email" id="email">
                </div>

                <button type="submit" class="btn btn-primary">Create</button>
                {{ csrf_field() }}
            </form>
        </div>
    </section>


@endsection