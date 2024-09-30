@extends('Components.layout')

@section('additional-styles')
<link rel="stylesheet" href="/css/contact.css">
@endsection

@section('content')
        <!--SECTION OF FORM  -->
            @if(session('flash')) 
                <p style="color: #ff80aa">{{ session('flash')}}</p>
            @endif
            <h1>CONTACT MINGKAI</h1>
            <p>If you want to pet me or have a little chat, just reach out to Mingkai!!!</p>
                <form class="contact" action="/contact" method="post">
                    @csrf
                    <div class="half left cf">
                        <input type="text" id="input-name" placeholder="Name" name="name" required>
                        <input type="email" id="input-email" placeholder="Email Address" name="email">
                        <input type="text" id="input-subject" placeholder="Subject" name="subject" required>
                        <textarea name="message" type="text" id="input-message" placeholder="Message" name="message" required></textarea>
                        <input type="submit" class="submit-button" value="Submit" id="input-submit">
                    </div>
                    <div class="image-container right">
                        <img src="/css/assets/images/contactmingkai.png" alt="Contact Mingkai">
                    </div>
                </form>         
        <!--END OF SECTION OF FORM  -->

        <!-- BACKGROUND MUSIC -->
        <audio id="background-music" src="/css/assets/audio/Cats_sped_up.mp3" preload="auto" loop></audio>

         <!-- JAVASCRIPT for (Background Music and Contact form) -->
        <script>
            document.addEventListener('DOMContentLoaded', function() {
                var audio = document.getElementById('background-music');
                audio.play();
            });

            document.getElementById('contact-form').addEventListener('submit', function(event) {
                var name = document.querySelector('input[name="name"]').value;
                var email = document.querySelector('input[name="email"]').value;
                var subject = document.querySelector('input[name="subject"]').value;
                var message = document.querySelector('input[name="message"]').value;
  
                if (!name || !email || !subject || !message) {
                    alert('Please fill out all required fields.');
                    event.preventDefault(); // Prevent form submission
                }
            });
        </script>
@endsection