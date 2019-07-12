<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Where's It?</title>

        <!-- Styles -->
        <style>
            * {
                box-sizing: border-box;
            }

            html, body {
                background-color: #fff;
                color: #111;
                font-family: sans-serif;
                font-weight: 200;
                height: 100vh;
                margin: 0;
            }

            .full-height {
                height: 100vh;
            }

            .flex-center {
                align-items: center;
                display: flex;
                justify-content: center;
            }

            .position-ref {
                position: relative;
            }

            .top-right {
                position: absolute;
                right: 10px;
                top: 18px;
            }

            .content {

            }

            label {
                display: block;
                font-size: 1.5rem;
                margin-bottom: 1rem;
            }

            input[type="text"],
            input[type="email"] {
                font-size: 1.5rem;
                padding: 0.5rem 1rem;
                outline: none;
                border: 1px solid #999;
                border-radius: 4px;
            }

            input[type="submit"] {
                font-size: 1.5rem;
                padding: 0.5rem 1rem;
                outline: none;
                background-color: transparent;
                border: 1px solid #999;
                border-radius: 4px;
                transition: all 0.3s;
            }

            input[type="submit"]:hover,
            input[type="submit"]:active,
            input[type="submit"]:focus {
                background-color: #CCC;
            }

            select {
                font-size: 1.5rem;
                padding: 1.5rem;
                width: 100%;
            }

        </style>
    </head>
    <body>
        <div class="flex-center position-ref full-height">
            @if (Route::has('login'))
                <div class="top-right links">
                    @auth
                        <a href="{{ url('/home') }}">Home</a>
                    @else
                        <a href="{{ route('login') }}">Vendor Login</a>
                    @endauth
                </div>
            @endif

            <div class="content">
                <h1>
                    Where is it?!
                </h1>
                <form method="POST" action="{{ action('SubscribeController@create') }}">
                    @csrf
                    <p>
                        <label for="name">
                            My name is
                        </label>
                        <input type="text" name="name" id="name" required>
                    </p>
                    <p>
                        <label for="vendor">
                            and I want to know when
                        </label>
                        <select name="user_id" id="vendor">
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
                        <label for="location">
                            is at
                        </label>
                        <select name="location_id" id="location">
                            <option value="">
                                Choose a location
                            </option>
                            @foreach ($locations as $location)
                                <option value="{{ $location->id }}">
                                    {{ $location->description }}
                                </option>
                            @endforeach
                        </select>
                    </p>
                    <p>
                        <label for="email">
                            by getting an email to
                        </label>
                        <input type="email" name="email" id="email" required>
                    </p>
                    <p>
                        <input type="submit" value="Subscribe">
                    </p>
                </form>

            </div>
        </div>
    </body>
</html>
