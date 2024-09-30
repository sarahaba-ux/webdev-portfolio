<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Mingkai's Life (Website)</title>

        <!-- CSS Styles goes here -->
        <link rel="stylesheet" href="/css/main.css"> <!-- Default CSS -->
        @yield('additional-styles')
    </head>

    <body>

        <!-- HEADER -->
        <header>

            <div class="logo">
                <img src="/css/assets/images/logo.png" alt="Logo">
            </div>
    
            <nav>
                <ul>
                    <li><a href="{{ url('/') }}" class="button">Home</a></li>
                    <li><a href="{{ url('/about') }}" class="button">About</a></li>
                    <li><a href="{{ url('/content') }}"class="button">Content</a></li>
                    <li><a href="{{ url('/contact') }}" class="button">Contact</a></li>
                </ul>
            </nav>
        </header>
        <!-- END OF HEADER -->

        <!-- CONTENT -->
        <div class="content">
            <!-- Page content goes here -->
            @yield ('content')   
        </div>
        <!-- END OF CONTENT -->

        <!-- FOOTER -->
        <footer>
            <p>&copy; Mingkai's Life Website.</p>
        </footer>
        <!-- END OF FOOTER -->
    </body>
</html>
