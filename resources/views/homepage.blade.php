@extends('Components.layout')

@section('additional-styles')
<link rel="stylesheet" href="/css/home.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
@endsection

@section('content')
<!-- SECTION OF WELCOME MESSAGE -->
<section id="intro-section">
    <div class="intro-container">
        <img src="/css/assets/pics/profile.jpg" alt="Profile Image" class="profile-image">
        <div class="text-container cute-font">
            <h2 style="color: #d13469;">Welcome to My Portfolio!</h2>
            <p>Hello! I'm Sarah C. Abane, a BSIT 3C student. <br>This portfolio showcases my web development lab activities and projects as part of my academic journey.</p>
            <p>Feel free to browse through various projects I've worked on. <br>You’ll find detailed documentation, installation steps, and configurations for each project, along with the code samples and visuals that illustrate my learning process.</p>
            
            <!-- SECTION OF CONTACT -->
            <div class="contact-container" style="margin-top: 20px;">
                <h2 style="color: #d13469;">Contact Me</h2>
                <div class="social-icons" style="font-size: 1.5em;">
                    <a href="https://www.facebook.com/sarah.casiban.1" target="_blank" style="margin-right: 10px; color: #d13469;">
                        <i class="fab fa-facebook-square"></i>
                    </a>
                    <a href="https://www.instagram.com/_zersa" target="_blank" style="margin-right: 10px; color: #d13469;">
                        <i class="fab fa-instagram-square"></i>
                    </a>
                    <a href="abanesarah6@gmail.com" style="color: #d13469;">
                        <i class="fas fa-envelope"></i>
                    </a>
                </div>
            </div>
            <!-- END SECTION OF CONTACT -->

        </div>
    </div>
</section>
<!-- END SECTION OF WELCOME MESSAGE -->

<!-- SECTION OF PORTFOLIO DETAILS -->
<div style="background: linear-gradient(135deg, #f2f2f2, #ffffff);" class="text-container cute-font">
    <section id="portfolio-section">

        <div class="section-title-container">
            <h2 class="section-title">Web Development Lab Activities & Projects</h2>
        </div>

        <div class="grid-container">
            <div class="box">
                <div class="box-text">
                    <h3 style="color: #d13469;">Homework: August 21, 2024</h3>
                    <p>Examples of websites or apps for each framework architecture.</p>
                </div>
            </div>

            <div class="box">
                <div class="box-text">
                    <h3 style="color: #d13469;">Laboratory 1</h3>
                    <p>Setup: August 26, 2024</p>
                    <p>Installation of Laravel</p>
                    <a href="https://github.com/sarahaba-ux/laravel" target="_blank">View Repository</a>
                </div>
            </div>

            <div class="box">
                <div class="box-text">
                    <h3 style="color: #d13469;">Laboratory 2</h3>
                    <p>Routes: September 5, 2024</p>
                    <p>Defining Basic Routes, Using Route Parameters, and Documentation</p>
                    <a href="https://github.com/sarahaba-ux/webdev_lab2" target="_blank">View Repository</a>
                </div>
            </div>

            <div class="box">
                <div class="box-text">
                    <h3 style="color: #d13469;">Laboratory 3</h3>
                    <p>Layout: September 18, 2024</p>
                    <p>Creating a Layout file, Creating view, Updating routes, and Documentation</p>
                    <a href="https://github.com/alyxvkeniii/webdev_lab3" target="_blank">View Repository</a>
                </div>
            </div>

            <div class="box">
                <div class="box-text">
                    <h3 style="color: #d13469;">Laboratory 4</h3>
                    <p>Middleware: October 2, 2024</p>
                    <p>Creating and Registering New Middleware, Assigning Middleware to Routes.</p>
                    <a href="https://github.com/alyxvkeniii/webdev_lab4" target="_blank">View Repository</a>
                </div>
            </div> 
        </div>
        <div class="button-container">
    <a href="{{ route('lab1') }}" class="button1">Laboratory 1</a>
    <a href="{{ route('lab2') }}" class="button1">Laboratory 2</a>
    <a href="{{ route('lab3') }}" class="button1">Laboratory 3</a>
    <a href="{{ route('lab4') }}" class="button1">Laboratory 4</a>
    <br><br>
</div>
    
    </section>
</div>
<!-- END SECTION OF PORTFOLIO DETAILS -->

@endsection
