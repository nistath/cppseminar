@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">Dashboard</div>

                <div class="panel-body">
                    <p>Welcome {{ Auth::user()->username }}!</p>
                    <p>Something will eventually go here...</p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
