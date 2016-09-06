@extends('layouts.app')

@section('content')
<div class="container">
    @if (session('status'))
        <div class="alert {{ session('status')->class }}" style="text-align: center;">
            {!! session('status')->message !!}
        </div>
    @endif
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">
                    Refugees Management <a class="close " aria-label="Close" href="{{ route('refugees.create') }}"><span aria-hidden="true"><i class="fa fa-plus text-success" aria-hidden="true"></i></a>
                </div>
                <div class="panel-body">
                    <table class="table table-bordered table-hover">
                        <thead>
                          <tr>
                            <th>User ID</th>
                            <th>Username</th>
                            <th>Fullname</th>
                            <th>Meals Left</th>
                            <th>Drinks Left</th>
                            <th></th>
                          </tr>
                        </thead>
                        <tbody>
                            @if (count($refugees) == 0)
                                <tr>
                                    <td colspan="6" style="text-align: center;"> No refugees found!</td>
                                </tr>
                            @endif
                            @foreach ($refugees as $refugee)
                                <tr class="valign" data-refugee="{{ $refugee->id }}">
                                    <td>{{ $refugee->id }}</td>
                                    <td>{{ $refugee->username }}</td>
                                    <td>{{ $refugee->fullname }}</td>
                                    <td>{{ (integer)$refugee->data('meals_left') }}</td>
                                    <td>{{ (integer)$refugee->data('drinks_left') }}</td>
                                    <td style="width: 75px; font-size:1.2em;">
                                        <a class="text-info" href="{{ route('refugees.show', $refugee->id) }}"><span aria-hidden="true"><i class="fa fa-search" aria-hidden="true"></i></a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('styles')
    <link href="/styles/hubs.css" rel='stylesheet' type='text/css'>
@endsection