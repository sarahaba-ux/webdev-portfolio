<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Mingkai's Life Log In</title>
    
        <!-- Google Font link here -->
        <link href="https://fonts.googleapis.com/css2?family=Baloo+2&display=swap" rel="stylesheet">
        <link rel="stylesheet" type="text/css" href="/css/login.css">
    </head>

    <body>

        <!-- HEADER -->
        <header>
    
            <div class="logo">
                <img src="/css/assets/images/logo.png" alt="Mingkai's Life Logo">
            </div>
    
        </header>
        <!-- END OF HEADER -->

        <main>
            <div class="cat-container-wrapper">
                <!-- Login Form Container -->
                <div class="login-container">
                    <div class="cat-holder">
                        <img src="/css/assets/images/kit.png" alt="Cat holding the login container" class="cat-image">
                    </div>
                    <h2>Mingkai Access</h2>
            
                    <form action="/homepage" method="POST" class="login-form">
                        @csrf
                            <input type="text" name="username" placeholder="Enter your username" class="form-input"
                            value="{{ old('username') }}" pattern="[A-Za-z]+" title="Please enter only alphabetic characters">

                        @if ($errors->has('username'))
                            <div class="error-message">
                                {{ $errors->first('username') }}
                            </div>
                        @endif
                            <button type="submit" name="login_type" value="user" class="submit-btn">Please Access</button><br>
                            <button type="submit" name="login_type" value="guest" class="submit-btn">Guest</button>
                    </form>
                <!-- End of Login Form Container -->
                </div>
            </div>
        </main>

    </body>
</html>