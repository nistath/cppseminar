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
                <div class="panel-heading">Hubs Map</div>

                <div class="panel-body">
                    <div id="map"></div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">
                    Hubs Management <a class="close " aria-label="Close" href="{{ route('hubs.create') }}"><span aria-hidden="true"><i class="fa fa-plus text-success" aria-hidden="true"></i></a>
                </div>
                <div class="panel-body">
                    <table class="table table-bordered table-hover">
                        <thead>
                          <tr>
                            <th>Hub ID</th>
                            <th>Meals</th>
                            <th>Drinks</th>
                            <th>Active</th>
                            <th>Battery</th>
                            <th></th>
                          </tr>
                        </thead>
                        <tbody>
                            @if (count($hubs) == 0)
                                <tr>
                                    <td colspan="6" style="text-align: center;"> No hubs found!</td>
                                </tr>
                            @endif
                            @foreach ($hubs as $hub)
                                <tr class="valign" data-hub="{{ $hub->id }}">
                                    <td >{{ $hub->id }}</td>
                                    @if (($hub->capacity_meals == null)||($hub->capacity_drinks == null))
                                        <td colspan="2"><i>Awaiting deployment</i></td>
                                    @else
                                        <td>{{ (integer)$hub->data('meals_left') }} / {{ $hub->capacity_meals }}</td>
                                        <td>{{ (integer)$hub->data('drinks_left') }} / {{ $hub->capacity_drinks }}</td>
                                    @endif
                                    @if ($hub->active)
                                        <td>True</td>
                                    @else
                                        <td>False</td>
                                    @endif
                                    @if ($hub->battery == null)
                                        <td><i>Unknown</i></td>
                                    @else
                                        <td>{{ $hub->battery }} %</td>
                                    @endif
                                    <td style="width: 75px; font-size:1.2em;">
                                        <a class="text-info" href="{{ route('hubs.show', $hub->id) }}"><span aria-hidden="true"><i class="fa fa-search" aria-hidden="true"></i></a>
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

@section('scripts')
    <script src="/scripts/hubs.js"></script>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAD-_lGwwWlTss8YJpOQrtLMx0N5MJnQ3Y&callback=initialization" async defer></script>
@endsection