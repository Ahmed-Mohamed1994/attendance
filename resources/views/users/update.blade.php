@extends('layouts.master')

@section('title')
    attendance dashboard
@endsection

@section('content')
    @include('includes.message-block')
    <section class="row">
        <div class="col-md-6 col-md-offset-3">
            <h3>Edit Attendance User</h3>
            <form action="{{ route('updateUser',['user' => $user->id]) }}" method="post">
                <div class="form-group {{ $errors->has('email') ? 'has-error' : '' }}">
                    <label for="email">Name</label>
                    <input class="form-control" type="text" name="name" id="name" value="{{  isset($user) ? $user->name : '' }}">
                </div>
                <div class="form-group {{ $errors->has('email') ? 'has-error' : '' }}">
                    <label for="email">Email</label>
                    <input class="form-control" type="text" name="email" id="email" value="{{  isset($user) ? $user->email : '' }}">
                </div>

                <button type="submit" class="btn btn-primary">Update</button>
                {{ csrf_field() }}
            </form>
        </div>
    </section>


@endsection