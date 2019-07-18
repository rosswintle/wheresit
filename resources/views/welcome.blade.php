@extends('layouts.app')

@section('content')

    <div class="container">
        <div class="flex-center position-ref full-height">

            <div class="content">
                <h1>
                    Where is it?!
                </h1>
                <form class="subscribe-form" method="POST" action="{{ action('SubscribeController@create') }}">
                    @csrf
                    <p>
                        <label for="name">
                            My name is
                        </label>
                        <input type="text" name="name" id="name" required placeholder="Your name">
                    </p>
                    <p>
                        <label for="vendor-input">
                            and I want to know when
                        </label>
                        <select name="user_id" id="vendor-input">
                            <option value="">
                                Choose a vendor
                            </option>
                            @foreach ($vendors as $vendor)
                                <option value="{{ $vendor->id }}">
                                    {{ $vendor->name }}
                                </option>
                            @endforeach
                        </select>
                    </p>
                    <p>
                        <label for="location-input">
                            is at
                        </label>
                        <select name="location_id" id="location-input">
                            <option value="">
                                Choose a location
                            </option>
                            @foreach ($locations as $location)
                                <option data-vendor="{{ $location->vendor_id }}" value="{{ $location->id }}">
                                    {{ $location->description }}
                                </option>
                            @endforeach
                        </select>
                    </p>
                    <p>
                        <label for="email">
                            by getting an email to
                        </label>
                        <input type="email" name="email" id="email" required placeholder="Your email address">
                    </p>
                    <p>
                        <input type="submit" value="Subscribe">
                    </p>
                </form>

            </div>
        </div>
    </div>

@endsection
