<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Mingkai's Life Verified</title>
    
        <!-- Google Font link here -->
        <link href="https://fonts.googleapis.com/css2?family=Baloo+2&display=swap" rel="stylesheet">
        <link rel="stylesheet" type="text/css" href="/css/adults.css">
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
                    <h2>You are now verified to enter Mingkai's Content</h2>
                    <p>This content is only accessible to users over 18 years of age.</p>
                    <p>Thank you for verifying your age. Enjoy your stay!</p>

                    <form action="{{ route('homepage') }}" method="GET">
                        @csrf
                        <button type="submit" class="btn btn-primary"><b>View More</b></button>
                    </form>
                   
                <!-- End of Login Form Container -->
                </div>
            </div>
        </main>

    </body>
</html>
