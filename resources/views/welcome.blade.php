<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Home App</title>

        <!-- Fonts -->
        <link rel="stylesheet" type="text/css" href="css/app.css">
        <script src="https://kit.fontawesome.com/0d6ad6dcf2.js" crossorigin="anonymous"></script>
        <!-- Styles -->
            
    </head>
    <body>
        <!-- Header -->
        <nav class="navbar is-dark">
            <div class="navbar-brand">
            <i class="fas fa-home fa-3x"></i>
                <h1 class="title navbar-item">Home App</h1>
            </div>
        </nav>
        <!-- Main Body -->
        <div class="container">
            <div class="tile is-ancestor">
                <!-- Calendar -->
                <div class="tile is-parent box">
                    <div class="tile is-child box">
                        <h2>Calendar</h2>
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                        tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
                        quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
                        consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
                        cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
                        proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
                        </p>
                    </div>
                
                    <div id="weather">
                        <h2>Weather</h2>
                    </div>
                    <div id="links">
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
                <div class="tile is-parent box">
                    <h2>Shopping List</h2>
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
                    
                    <form method="POST" action="/">
                        @csrf
                            <div>    
                                <label for="description"><h3>Description</h3></label>
                                <input type="text" name="description">
                            </div>
                            <div>
                                <button type="submit">Add Item</button>
                            </div>
                    </form>
                    <form method="POST" action="/contact">
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
            </div>
        </div>
    </body>
</html>
