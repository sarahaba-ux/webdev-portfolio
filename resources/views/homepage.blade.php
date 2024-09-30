@extends('Components.layout')

@section('additional-styles')
<link rel="stylesheet" href="/css/home.css">
@endsection

@section('content')
        <!--SECTION OF GET TO KNOW MINGKAI-->
        <section id="image-section">
            <div class="image-container left" style="color: #6b0024;">
                <img src="/css/assets/images/homepg.png" alt="Left Image">
                    <div class="text-container cute-font">
                        <h2 style="color: #d13469;">Get To Know Me!</h2>
                        <p>Meow! I’m Mingkai, and today I’m a catto! Here’s what my day looks like.</p>
                        <p>I start the day with a big stretch and soak up the morning sun. Then, I get breakfast—yum! After eating, I take a quick nap.</p>
                        <p>Around lunch, I eat, drink, poop, and play a bit. Then it’s nap time again. In the afternoon, I hang out with my best friend, Sarah. We chill in bed, or I just keep her company.</p>
                        <p>In the evening, I eat, drink, poop, and sleep some more. But at 3 AM, I run around like crazy under the bed, waking up Sarah. We get scolded, but it’s worth it. After that, I go back to sleep, dreaming of another fun day tomorrow.</p>
                    </div>
            </div>
    
            <div class="image-container right">
                <img src="/css/assets/images/mkhome.png" alt="Right Image">
            </div>
        </section>
        <!--END SECTION OF GET TO KNOW MINGKAI-->

        <!--SECTION OF MINGKAI CARE TIPS-->
        <div style="background: linear-gradient(135deg, #ffe6f3, #fffbc5, #ffe6f3);" class="text-container cute-font">
            <section id="text-image-container">

                <div class="section-title-container"> <br>
                    <h2 class="section-title">Care tips by mingkai the catto</h2>
                </div>

                <div style="background: linear-gradient(135deg, #ffe6f3, #fffbc5, #ffe6f3);" class="grid-container">
                    
                    <div class="box">
                        <div class="box-text">
                            <h3 style="color: #d13469;">The Litter Box is Sacred</h3> <br>
                            <p>Keep the litter box clean, or expect a 'surprise' elsewhere.</p>
                        </div>
                    </div>
        
                    <div class="box">
                        <div class="box-text">
                            <h3 style="color: #d13469;">Feed Us Right, Hooman</h3> <br>
                            <p>Don’t forget the treats—lots of treats. Just keep them coming!</p>
                        </div>
                    </div>
        
                    <div class="box">
                        <div class="box-text">
                            <h3 style="color: #d13469;">Playtime is Mandatory</h3> <br>
                            <p>We need daily fun—laser pointers, toys, or string, it doesn't matter.</p>
                        </div>
                    </div>
        
                    <div class="box">
                        <div class="box-text">
                            <h3 style="color: #d13469;">Respect the Paw-sition</h3> <br>
                            <p>If we decide to nap on your laptop or in your laundry basket, that's our throne now.</p>
                        </div>
                    </div>
        
                    <div class="box">
                        <div class="box-text">
                            <h3 style="color: #d13469;">Nap Like a Pro:</h3>
                            <p>If we're napping, don’t disturb—we're recharging.</p>
                        </div>
                    </div>
        
                    <div class="box">
                        <div class="box-text">
                            <h3 style="color: #d13469;">Understand Our Language:</h3>
                            <p><br>A meow is a language. It can mean feed me, pet me, or leave me alone. Learn to decode it!</p>
                        </div>
                    </div>
        
                    <div class="box">
                        <div class="box-text">
                            <h3 style="color: #d13469;">Hide the Scratchy Things!</h3>
                            <p><br>Get us scratching posts. We might still scratch furniture, but at least we have a choice!</p>
                        </div>
                    </div>
        
                    <div class="box">
                        <div class="box-text">
                            <h3 style="color: #d13469;">Give Us Space</h3> 
                            <p><br>We need our alone time. We’re not ignoring you; we’re just busy being fabulous.</p>
                        </div>
                    </div>
                </div>
            </section>
        </div>
        <!--END SECTION OF MINGKAI CARE TIPS-->

        <!-- Video Section -->
        <section id="video-section" class="text-container cute-font" style="background-image: url('/css/assets/images/pattern.jpg'); ">
            <div class="section-title-container" style="margin-top: 20px;">
                <h2 class="section-title">Mingkai being eepy and silly</h2>
            </div>
    
            <div class="video-container" style="display: flex; justify-content: center; align-items: center;">
                <div class="box" style="width: 50%; max-width: 400px;">
                    <video id="mingkai-video" controls style="width: 100%; height: auto;">
                        <source src="/css/assets/videos/mingkai_edit.mp4" type="video/mp4">
                        Your browser does not support the video tag.
                    </video>
                </div>
            </div>
        </section>
        <!-- END Video Section -->

         <!-- BACKGROUND MUSIC -->
        <audio id="background-music" src="/css/assets/audio/mizutama.mp3" preload="auto" loop></audio>

         <!-- JAVASCRIPT -->
        <script>
            document.addEventListener('DOMContentLoaded', function() {
                var audio = document.getElementById('background-music');
                var video = document.getElementById('mingkai-video');

                // Play background music when the page loads
                audio.play();

                // Pause audio when video starts playing
                video.addEventListener('play', function() {
                    audio.pause();
                });

                // Resume audio when video is paused or ends
                video.addEventListener('pause', function() {
                    audio.play();
                });

                video.addEventListener('ended', function() {
                    audio.play();
                });
            });
        </script>
@endsection
