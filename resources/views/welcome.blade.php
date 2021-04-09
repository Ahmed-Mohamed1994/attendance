@extends('layouts.master')

@section('title')
    Attendance System
@endsection

@section('content')
    @include('includes.message-block')
    <div class="row">
        <div class="col-md-6 col-md-offset-3">
            <h3>Attendance</h3>
            <form action="{{ route('attendance') }}" method="post">
                <div class="form-group {{ $errors->has('code') ? 'has-error' : '' }}">
                    <label for="code">Your Attendance Code</label>
                    <input class="form-control" type="text" name="code" id="code" value="{{ Request::old('code') }}">
                </div>

                <div class="form-group {{ $errors->has('attendance_status') ? 'has-error' : '' }}">
                    <label for="attendance_status">Select list:</label>
                    <select class="form-control" name="attendance_status" id="attendance_status">
                        <option value="" selected>Select Your Attendance</option>
                        <option value="Login">Login</option>
                        <option value="Logout">Logout</option>
                    </select>
                </div>

                <button type="submit" class="btn btn-primary">Submit</button>
                {{ csrf_field() }}
            </form>
        </div>
    </div>
@endsection