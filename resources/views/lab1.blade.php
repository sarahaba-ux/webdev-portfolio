@extends('Components.layout')

@section('additional-styles')
<link rel="stylesheet" href="/css/content.css">
@endsection

@section('content')
        <!-- SECTION OF MINGKAI JOURNAL -->
        <div class="journal-container">
            <h1 style="color: #e65f8c;"> ˚ʚ♡ɞ˚ </h1>
    
            <div id="journal-cover" style="color: #b6446a;">
                <h2 style="color: #b6446a;">Documentation Journal</h2>
                <p>This is about my <b>'Laboratory 1: Setup'</b> <br>Click the button to open the journal.</p>
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
                { title: "Installing Laravel", content: "I started by installing Laravel, which was quite straightforward. I made sure to follow the official documentation for the best practices." },
                { title: "Configuring Laravel", content: "Next, I dove into the configuration settings. This step involved setting up my .env file to include my database connection details, which felt like a crucial part of the process." },
                { title: "Creating a Project", content: "Creating a new Laravel project was exciting! I used the command line to generate the project skeleton." },
                { title: "Editing PHP Files", content: "As I began editing the PHP files, I paid special attention to the 'variables_order'. Ensuring it included 'GPCS' was vital for maintaining compatibility with Laravel." },
                { title: "Setting Up Git Repository", content: "I decided to put my Laravel project in a Git repository. I created a new repository on GitHub and added it as a remote to my local project." },
                { title: "Creating Views", content: "With the setup done, I moved on to creating views for my application, specifically the Homepage, About, and Content pages." },
                { title: "Running Routes", content: "Next up was creating and running routes in my Laravel application. I had to edit 'web.php' to build connections and ensure everything was flowing smoothly." },
                { title: "Starting the Laravel Server", content: "After setting up my routes, I started the Laravel server. I was eager to test everything out." },
                { title: "Testing Routes", content: "Visiting the URLs in my browser was thrilling! I checked both 'localhost:8000' and '127.0.0.1:8000' to see my work in action." },
                { title: "Navigating the Pages", content: "Lastly, I focused on the navigation bar on my homepage. It was crucial to have buttons that allowed seamless navigation between the Home, About, and Content pages." },
                { title: "Final Output:", content: "After all the hard work, I finally saw my final output! It felt rewarding to see everything come together—Home, About, and Content were functioning perfectly. <br><br><b>It is titled 'Mingkai's Life'</b>" },
                { title: " ", content: 
        '<img src="/css/assets/pics/individual.png" alt="Image 1" style="width:100%; max-width:600px;">' +
        '<img src="/css/assets/pics/individual1.png" alt="Image 2" style="width:100%; max-width:600px;">' +
        '<img src="/css/assets/pics/individual2.png" alt="Image 3" style="width:100%; max-width:600px;">'
    }
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
