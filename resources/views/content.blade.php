@extends('Components.layout')

@section('additional-styles')
<link rel="stylesheet" href="/css/content.css">
@endsection

@section('content')
        <!-- SECTION OF MINGKAI JOURNAL -->
        <div class="journal-container">
            <h1 style="color: #e65f8c;"> ˚ʚ♡ɞ˚ </h1>
    
            <div id="journal-cover" style="color: #b6446a;">
                <h2 style="color: #b6446a;">Mingkai's Journal</h2>
                <p>Welcome to Mingkai's personal journal. <br>Click the button to open the journal.</p>
                <button onclick="openJournal()">Open Journal</button>
            </div>
    
            <div id="journal" style="display: none;">
                <button id="close" class="icon-button close-button" onclick="closeJournal()">&#x2715;</button>
        
                <div class="left-page">
                    <div id="entry-left"></div>
                </div>
        
                <div class="right-page">
                    <div id="entry-right"></div>
                </div>
        
                <button id="prev" class="icon-button prev-button" onclick="prevEntry()">&#x276E;</button>
                <button id="next" class="icon-button next-button" onclick="nextEntry()">&#x276F;</button>
            </div>
        </div>
        <!-- END SECTION OF MINGKAI JOURNAL -->

        <!-- JAVASCRIPT -->
        <script>
            const entries = [
                { title: "K-Drama or Movie Time!", content: "I and Sarah loves K-dramas. We get snacks while we watch, usually our favorite ones. It’s kind of fun!" },
                { title: "Preggy and Kittens Surprise!", content: "Tiny kittens arrived. They’re noisy but cute. My human’s very attentive." },
                { title: "Kittens Exploring", content: "The kittens are starting to explore. They’re wobbly but curious, and it’s entertaining to watch." },
                { title: "Meeting New Pets", content: "Met some new pets today. It’s a bit chaotic, but everyone seems to be getting along." },
                { title: "Spaying Day", content: "Had a vet visit and feel different now. Lots of extra cuddles while I recover." },
                { title: "New Fave Video", content: "Found a video on YouTube that Sarah shared. It’s all about rats and cockroaches! I can't stop watching!" },
                { title: "Midnight Zoomies", content: "I decided to have midnight zoomies, and Sarah and I both got scolded because I was too noisy. Hehe!" },
                { title: "Gift Sarah", content: "Today I decided to gift Sarah some lizards, thinking maybe she was hungry. She screamed, so I think she’s happy. :))" },
            ];

            let currentLeftEntry = 0;
            let currentRightEntry = 1;

            function updateEntry() {
                document.getElementById('entry-left').innerHTML = `
                    <h2>${entries[currentLeftEntry].title}</h2>
                    <p>${entries[currentLeftEntry].content}</p>
                `;
                document.getElementById('entry-right').innerHTML = `
                    <h2>${entries[currentRightEntry].title}</h2>
                    <p>${entries[currentRightEntry].content}</p>
                `;
                applyFont();
            }

            function nextEntry() {
                if (currentRightEntry < entries.length - 1) {
                    currentLeftEntry += 2;
                    currentRightEntry += 2;
                    updateEntry();
                }
            }

            function prevEntry() {
                if (currentLeftEntry > 0) {
                    currentLeftEntry -= 2;
                    currentRightEntry -= 2;
                    updateEntry();
                }
            }

            function openJournal() {
                document.getElementById('journal-cover').style.display = 'none';
                document.getElementById('journal').style.display = 'flex';
                updateEntry();  // Ensure the first entry is displayed when the journal is opened
            }

            let originalCover;

            function closeJournal() {
                document.getElementById('journal').style.display = 'none';

                // Check if the original cover is already present
                let existingCover = document.getElementById('journal-cover');
                if (existingCover) {
                    existingCover.style.display = 'block';
                } else {
                    const newCover = originalCover.cloneNode(true);  // Recreate the original cover element
                    document.querySelector('.journal-container').insertBefore(newCover, document.getElementById('journal'));
                }

                // Reassign event listeners to the new cover
                document.getElementById('journal-cover').querySelector('button').onclick = openJournal;

                // Reset entries to the first two pages
                currentLeftEntry = 0;
                currentRightEntry = 1;
            }

            function applyFont() {
                document.querySelectorAll('#scenario, #choices button, #entry-left, #entry-right').forEach(function(element) {
                    element.style.fontFamily = "'Baloo 2', sans-serif";
                });
            }

            window.onload = function() {
                originalCover = document.getElementById('journal-cover').cloneNode(true);
                applyFont();
            };
        </script>
@endsection