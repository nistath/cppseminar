@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">Refugee <b>{{ $refugee->fullname }}</b> Map</div>

                <div class="panel-body">
                    <div id="map"></div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('styles')
    <link href="/styles/hubs.css" rel='stylesheet' type='text/css'>
@endsection

@section('scripts')
    <script src="/scripts/refugees.js"></script>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAD-_lGwwWlTss8YJpOQrtLMx0N5MJnQ3Y&callback=initialization" async defer></script>
@endsection