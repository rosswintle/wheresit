@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row flex-center">
        <div class="col-12 col-md-8">
            <h2>Check In</h2>

            <p>
                <small>Last check in</small><br>
                @if ($user->last_location_timestamp)
                    {{ $user->last_location->description }}, {{ Carbon\Carbon::create($user->last_location_timestamp)->diffForHumans() }}
                @else
                    You've not checked in yet
                @endif
            </p>
            <ul class="check-in-list">
                @foreach ($locations as $location)
                    <li>
                        <a class="button" href="{{ action( 'CheckinController@create', [ 'location' => $location ] ) }}">
                            {{ $location->description }}
                        </a>
                    </li>
                @endforeach
            </ul>

        </div>
    </div>
</div>
@endsection
