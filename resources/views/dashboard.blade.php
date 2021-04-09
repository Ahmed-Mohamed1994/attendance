@extends('layouts.master')

@section('title')
    attendance dashboard
@endsection

@section('style')
    <link rel="stylesheet" href="//cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css">
@endsection

@section('content')
    @include('includes.message-block')
    <section class="row">
        <div class="col-md-12">
            <header><h3>All Attendance Users</h3></header>


            <table border="0" cellspacing="5" cellpadding="5">
                <tbody><tr>
                    <td>Minimum date:</td>
                    <td><input type="text" id="min" name="min"></td>
                </tr>
                <tr>
                    <td>Maximum date:</td>
                    <td><input type="text" id="max" name="max"></td>
                </tr>
                </tbody></table><table id="example" class="display" style="width:100%">
                <thead>
                <tr>
                    <th>id</th>
                    <th>name</th>
                    <th>email</th>
                    <th>code</th>
                    <th>date</th>
                    <th>time</th>
                    <th>Status</th>
                </tr>
                </thead>
                <tbody>
                @foreach($users as $user)
                    <tr>
                        <td>{{ $user->id }}</td>
                        <td>{{ $user->user_attend->name }}</td>
                        <td>{{ $user->user_attend->email }}</td>
                        <td>{{ $user->code }}</td>
                        <td>{{ $user->created_at->format('Y-n-d') }}</td>
                        <td>{{ $user->created_at->format('G:i:s A') }}</td>
                        <th>
                            @if($user->status == "Login")
                                <span class="label label-success">Login</span>
                            @else
                                <span class="label label-danger">Logout</span>
                            @endif
                        </th>
                    </tr>
                @endforeach
                </tbody>
            </table>

        </div>
    </section>


@endsection

@section('script')
    <script src="//cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
    <script type="application/javascript">
        /* Custom filtering function which will search data in column four between two values */
        $.fn.dataTable.ext.search.push(
            function( settings, data, dataIndex ) {
                var min = parseInt( $('#min').val(), 10 );
                var max = parseInt( $('#max').val(), 10 );
                var age = parseFloat( data[4] ) || 0; // use data for the age column

                if ( ( isNaN( min ) && isNaN( max ) ) ||
                    ( isNaN( min ) && age <= max ) ||
                    ( min <= age   && isNaN( max ) ) ||
                    ( min <= age   && age <= max ) )
                {
                    return true;
                }
                return false;
            }
        );

        $(document).ready(function() {
            var table = $('#example').DataTable();

            // Event listener to the two range filtering inputs to redraw on input
            $('#min, #max').keyup( function() {
                table.draw();
            } );
        } );
    </script>
@endsection