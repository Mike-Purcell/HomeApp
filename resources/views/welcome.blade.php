<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Home App</title>
        <link rel="stylesheet" type="text/css" href="css/app.css">
        <script src="https://kit.fontawesome.com/0d6ad6dcf2.js" crossorigin="anonymous"></script>            
    </head>
    <body>
        <!-- Header -->
        <nav class="navbar is-dark">
            <div class="navbar-brand">
                <div class="navbar-item">
                    <i class="fas fa-home fa-2x"></i>
                </div>
                <h1 class="title navbar-item">Home App</h1>
            </div>
        </nav>
        <!-- Main Body -->
        <div class="container">
            <div class="tile is-ancestor">
                <div class="tile is-parent is-vertical box is-10 has-background-grey-light">
                    <!-- Calendar -->
                    <div class="tile is-parent is-vertical box">
                        <div>
                            <h2 class="subtitle">Calendar</h2>
                        </div>
                        <div>
                            Calendar API in here......
                        </div>
                    </div>
                    <div class="tile is-parent">
                        <!-- Weather -->
                        <div class="tile is-parent is-vertical box">
                            <div>
                                <h2 class="subtitle">Weather</h2>
                            </div>
                            <div>
                                Weather API in here.......
                            </div>
                        </div>
                        <!-- Links -->
                        <div class="tile is-parent is-vertical box">
                            <h2 class="subtitle">Links</h2>
                            <div>
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
                    </div>
                </div>
                <!-- Shopping List -->
                <div class="tile is-parent is-vertical has-background-grey-light box">
                    <h2 class="subtitle">Shopping List</h2>
                    <div class="list">
                        @forelse ($item as $item)
                            <div>
                                <div class="list-item">{{ $item->description }}                          
                                <form method="POST" action="/{{ $item->id }}">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" name="delete" class="button is-small">Delete</button>
                                </form>
                                </div>
                            </div>
                        @empty
                            Nothing on the list yet!
                        @endforelse
                    </div>                    
                    <form method="POST" action="/">
                        @csrf
                        <div class="field">
                            <label for="description" class="label is-small">Description</label>
                            <div class="control has-icons-left has-icons-right">
                              <input class="input is-small is-info is-rounded" type="text" name="description" placeholder="Description">
                              <span class="icon is-small is-left">
                                <i class="fas fa-shopping-cart"></i>
                            </div>
                          </div>
                            <div>
                                <button type="submit">Add Item</button>
                            </div>
                    </form>
                    <form method="POST" action="/contact">
                        @csrf
                        <div class="field">
                            <label class="label is-small">Email Address</label>
                            <div class="control has-icons-left">
                              <input class="input is-small is-info is-rounded" type="email" placeholder="Email">
                              <span class="icon is-small is-left">
                                <i class="fas fa-envelope"></i>
                              </span>
                            @error('email')
                            <div>{{ $message }}</div>
                            @enderror
                            </div>
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
