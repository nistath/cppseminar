@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
            <div class="panel-heading">Hub Details</div>

                <div class="panel-body">
                    <div class="form-group form-map">
                        <div class="col-md-6 form-map">
                            <div id="location_map"></div>
                        </div>
                        <div class="col-md-6">
                            <table class="table table-bordered">
                                <tbody>
                                    <tr>
                                        <th>Hub ID</th>
                                        <td class="bg-info">{{ $hub->id }}</td>
                                    </tr>
                                    <tr>
                                        <th>Active</th>
                                        @if ($hub->active)
                                            <td class="bg-success">True</td>
                                        @else
                                            <td class="bg-danger">False</td>
                                        @endif
                                    </tr>
                                        @if (($hub->capacity_meals == null)||($hub->capacity_drinks == null))
                                            <tr>
                                                <th>Status</th>
                                                <td class="bg-warning"><i>Awaiting deployment</i></td>
                                            </tr>
                                        @else
                                            <tr>
                                                <th>Meals</th>
                                                <td>{{ (integer)$hub->data('meals_left') }} / {{ $hub->capacity_meals }}</td>
                                            </tr>
                                            <tr>
                                                <th>Drinks</th>
                                                <td>{{ (integer)$hub->data('drinks_left') }} / {{ $hub->capacity_drinks }}</td>
                                            </tr>
                                        @endif
                                    <tr>
                                        <th>Battery</th>
                                        @if ($hub->battery == null)
                                            <td class="bg-danger"><i>Unknown</i></td>
                                        @else
                                            <td>{{ $hub->battery }} %</td>
                                        @endif
                                    </tr>
                                    <tr>
                                        <th>Latitude</th>
                                        <td class="bg-info">{{ $hub->latitude }}</td>
                                    </tr>
                                    <tr>
                                        <th>Longitude</th>
                                        <td class="bg-info">{{ $hub->longitude }}</td>
                                    </tr>
                                    @permission('manage.hubs')
                                    @if (!($hub->active))
                                    <form role="form" method="POST" action="{{ route('hubs.update', $hub->id) }}">
                                        {!! csrf_field() !!}
                                        <input name="_method" type="hidden" value="PUT">
                                        <input name="key" type="hidden" value="regenerate">
                                    @endif
                                        <tr>
                                            <th>Key</th>
                                            <td class="bg-danger">
                                                {{ $hub->key }}
                                                @if (!($hub->active) && (($hub->capacity_meals == null)||($hub->capacity_drinks == null)))
                                                <button type="submit" class="close " aria-label="Close" href="{{ route('hubs.create') }}"><span aria-hidden="true"><i class="fa fa-refresh text-danger" aria-hidden="true"></i></button>
                                                @endif
                                            </td>
                                        </tr>
                                    </form>
                                    @endpermission
                                </tbody>
                            </table>
                            @permission('manage.hubs')
                                <a href="{{ route('hubs.edit', $hub->id) }}" class="btn btn-warning btn-block">
                                    <i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit Hub
                                </a>
                                <form role="form" method="POST" action="{{ route('hubs.destroy', $hub->id) }}">
                                    <input name="_method" type="hidden" value="DELETE">
                                    {!! csrf_field() !!}
                                    @if ($hub->active)
                                        <button type="submit" class="btn btn-danger btn-block topmargin">
                                            <i class="fa fa-ban" aria-hidden="true"></i> Deactivate Hub
                                        </button>
                                    @else
                                        <button type="submit" class="btn btn-success btn-block topmargin">
                                            <i class="fa fa-check" aria-hidden="true"></i> Activate Hub
                                        </button>
                                    @endif
                                </form>
                            @endpermission
                            <a href="{{ route('hubs.index') }}" class="btn btn-primary btn-block topmargin">
                                <i class="fa fa-undo" aria-hidden="true"></i> Back
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
            <div class="panel-heading">Hub Log</div>

                <div class="panel-body">
                    <table class="table table-bordered table-hover">
                        <thead>
                          <tr>
                            <th>Associated User ID</th>
                            <th>Event</th>
                            <th>Timestamp</th>
                          </tr>
                        </thead>
                        <tbody>
                            @if (count($hub->log()) == 0)
                                <tr>
                                    <td colspan="6" style="text-align: center;"> No activity recorded!</td>
                                </tr>
                            @else
                                @foreach ($hub->log() as $log)
                                <tr>
                                    <td>{{ $log->user_id }}</td>
                                    <td>{{ ucfirst($log->type) }}</td>
                                    <td>{{ $log->created_at->format('jS M Y - Hi\z') }}</td>
                                </tr>
                                @endforeach
                            @endif
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
    <link href="/styles/create_hubs.css" rel='stylesheet' type='text/css'>
@endsection

@section('scripts')
    <script src="/scripts/show_hub.js"></script>
    <script type="text/javascript">
        function loadDone(){
            updateMarkerPosition({lat: {{$hub->latitude}}, lng: {{$hub->longitude}} })
        }
    </script>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAD-_lGwwWlTss8YJpOQrtLMx0N5MJnQ3Y&callback=initialization" async defer></script>
@endsection