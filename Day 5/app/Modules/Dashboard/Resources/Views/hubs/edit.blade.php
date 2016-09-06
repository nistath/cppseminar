@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
            <div class="panel-heading">Edit Hub</div>

                <div class="panel-body">
                    <div class="form-group form-map">
                        <div class="col-md-3 control-label"></div>
                        <div class="col-md-7 form-map">
                            <div class="alert alert-info" style="text-align: center;">
                                Drag the marker in the map below to change the coordinates of the hub.
                            </div>
                            <input id="pac-input" class="controls" type="text" placeholder="Search Box" >
                            <div id="location_map"></div>
                        </div>
                    </div>
                    <form class="form-horizontal" role="form" method="POST" action="{{ route('hubs.update', $hub->id) }}">
                        {!! csrf_field() !!}
                        <input name="_method" type="hidden" value="PUT">
                        <div class="form-group{{ $errors->has('latitude') ? ' has-error' : '' }}">
                            <label class="col-md-4 control-label">Latitude</label>

                            <div class="col-md-6">
                                <input readonly="readonly" type="username" class="form-control" id="latitude" name="latitude" value="{{ old('latitude') }}">

                                @if ($errors->has('latitude'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('latitude') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('longitude') ? ' has-error' : '' }}">
                            <label class="col-md-4 control-label">Longitude</label>

                            <div class="col-md-6">
                                <input readonly="readonly" type="username" class="form-control" id="longitude" name="longitude" value="{{ old('longitude') }}">

                                @if ($errors->has('longitude'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('longitude') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    <i class="fa fa-btn fa-pencil-square-o"></i>Edit Hub
                                </button>
                                <a href="{{ route('hubs.show', $hub->id) }}" class="btn btn-danger">
                                    Cancel
                                </a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('styles')
    <link href="/styles/hubs.css" rel='stylesheet' type='text/css'>
    <link href="/styles/create_hubs.css" rel='stylesheet' type='text/css'>
@endsection

@section('scripts')
    <script src="/scripts/hub.js"></script>
    <script type="text/javascript">
        function loadDone(){
            updateMarkerPosition({lat: {{ $hub->latitude }},lng: {{ $hub->longitude }} });
        }
    </script>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAD-_lGwwWlTss8YJpOQrtLMx0N5MJnQ3Y&libraries=places&callback=initialization" async defer></script>
@endsection