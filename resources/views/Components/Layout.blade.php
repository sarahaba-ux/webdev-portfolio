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
                <img src="/css/assets/pics/logo.png" alt="Logo">
            </div>
    
            <nav>
                <ul>
                    <li><a href="{{ url('/homepage') }}" class="button">Home</a></li>
                    <li><a href="{{ url('/lab1') }}" class="button">Laboratory 1</a></li>
                    <li><a href="{{ url('/lab2') }}"class="button">Laboratory 2</a></li>
                    <li><a href="{{ url('/lab3') }}" class="button">Laboratory 3</a></li>
                    <li><a href="{{ url('/lab4') }}" class="button">Laboratory 4</a></li>
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
