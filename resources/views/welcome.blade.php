<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Home App</title>

        <!-- Fonts -->
        <link rel="stylesheet" type="text/css" href="css/app.css">
        <!-- Styles -->
            
    </head>
    <body>
        <!-- Header -->
        <nav class="nav"><h1>Home App</h1></nav> 
        <!-- Main Boduy -->
        <div class="container">
            <!-- Calendar -->
            <div class="calendar">
                <h2>Calendar</h2>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
                quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
                consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
                cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
                proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
                </p>
            </div>
            <div class="list">
                <h2>Shopping List</h2>
                <div class="items">
                    @forelse ($item as $item)
                        <div>
                            {{ $item->id }}. {{ $item->description }}
                            <form method="POST" action="/{{ $item->id }}">
                                @csrf
                                @method('DELETE')
                                <button type="submit" name="delete" class="btn">Delete</button>
                            </form>
                        </div>
                    @empty
                        Nothing on the list yet!
                    @endforelse
                </div>
                <form method="POST" action="/" class="submit-item">
                    @csrf
                        <div>    
                            <label for="description"><h3>Description</h3></label>
                            <input type="text" name="description">
                        </div>
                        <div>
                            <button type="submit">Add Item</button>
                        </div>
                </form>
                <form method="POST" action="/contact"  class="submit-email">
                    @csrf
                    <div>
                        <label for="email"><h3>Email Address</h3></label>
                        <input type="text" name="email">
                        @error('email')
                        <div>{{ $message }}</div>
                        @enderror
                    </div>
                    @if(session('message'))
                        <div>
                            {{ session('message') }}
                        </div>
                    @endif
                    <div>
                        <button>Send E-mail</button>
                    </div>

                </form>
            </div>
            <div class="weather">
                <h2>Weather</h2>
            </div>
            <div class="links">
            <h2>Links</h2>
                <a href="https://laravel.com/docs">Docs</a>
                <a href="https://laracasts.com">Laracasts</a>
                <a href="https://laravel-news.com">News</a>
                <a href="https://blog.laravel.com">Blog</a>
                <a href="https://nova.laravel.com">Nova</a>
                <a href="https://forge.laravel.com">Forge</a>
                <a href="https://vapor.laravel.com">Vapor</a>
                <a href="https://github.com/laravel/laravel">GitHub</a>
            </div>
        </div>
    </body>
</html>
