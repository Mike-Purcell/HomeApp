<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Home App</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">

        <!-- Styles -->
        <style>
            * {
                margin: 0;
                padding: 0;
            }

            a {
                text-decoration: none;
                color: #e4e4ef;
            }

            a:hover {
                color: #f07878;
                cursor: pointer;
            }

            h2 {
                text-align: center;
                font-weight: 100;
            }

            h3 {
                text-align: center;
                font-weight: 100;
            }

            button {
                border: none;
                padding: 0.25rem;
                border-radius: 50px;
            }

            button:hover {
                cursor: pointer;
                background: #f07878;
            }
            
            /* Main Body */
            .container {
                display: grid;
                grid-template-areas: 
                    'header header header'
                    'calendar calendar list'
                    'weather links list';
                background: #404267;
                font-family: Nunito, sans-serif;
                color: #e4e4ef;
            }
            /* Header */
            .header {
                grid-area: header;
                height: 5vh;
                border-bottom: #ccc 1px solid;
                background: #201e45;
                font-size: 2rem;
                color: #f9faf5;
            }

            /* Calendar*/
            .calendar {
                grid-area: calendar;
                height: 60vh;
                border-bottom: #ccc 1px solid;
            }

            /* List*/
            .list {
                grid-area: list;
                border-left: #ccc 1px solid;
                padding: 0.5rem;
            }

            .list .submit {
                text-align: center;
                border-top: #ccc 1px solid;
            }

            .list .submit input {
                width: 90%;
                border: none;
                border-radius: 5px;
                padding: 0.5rem;
            }

            .list .items {
                padding-bottom: 1rem;
                font-size: 0.75rem;
            }

            .list .items div {
                padding: 0.2rem;
            }    


            /* Weather */
            .weather {
                grid-area: weather;
                height: 35vh;
                border-right: #ccc 1px solid;
            }

            /* Links*/
            .links {
                grid-area: links;
                height: 35vh;
                text-align: center;
            }
        </style>
            
    </head>
    <body>
        <div class="container">
            <div class="header">Home App</div> 
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
                                <button type="submit" name="delete">Delete</button>
                            </form>
                        </div>
                    @empty
                        Nothing on the list yet!
                    @endforelse
                </div>
                <form method="POST" action="/">
                    @csrf
                    <div class="submit">
                        <label for="description"><h3>Description</h3></label>
                        <input type="text" name="description">
                    </div>
                    <div>
                        <button type="submit">Add Item</button>
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
