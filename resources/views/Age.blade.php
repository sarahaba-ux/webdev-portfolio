<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Mingkai's Life Age Verification</title>
    
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
                    <h2>Verify Your Age to Log In</h2>
            
                    <form action="{{ route('age.verify') }}" method="POST" class="age-verification-form">
                        @csrf
                        <label for="age">Please Type your age:</label>
                        <input type="number" name="age" id="age" required min="1" class="age-input">
                        <button type="submit" class="submit-btn">Submit</button>
                    </form>
                <!-- End of Login Form Container -->
                </div>
            </div>
        </main>

        @if ($errors->has('age'))
            <div class="error-message">
                {{ $errors->first('age') }}
            </div>
        @endif

    </body>
</html>