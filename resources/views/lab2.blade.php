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
                <p>This is about my <b>'Laboratory 2: Routes'</b> <br>Click the button to open the journal.</p>
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
    {
        title: "Creating the Homepage Route",
        content: 
        "I started by creating a simple route that returns a view for the homepage. The view displays a welcome message. " +
        "In the Homepage Blade Template <b>(homepage.blade.php)</b>, I crafted a straightforward Blade view where the welcome message is displayed. This message is passed to the view through the controller."
    },
    {
        title: "Controller Logic for Welcome Message",
        content: 
        "In the <b>LoginController</b>, I implemented a method called <code>homepage()</code>, which retrieves the username from the request and passes it to the view. " +
        "This function checks if a username is present in the URL or request, defaulting to 'Guest' if not provided, ensuring a personalized experience."
    },
    {
        title: "Route Logic in web.php",
        content: 
        "In the <code>web.php</code> file, the <code>Route::get()</code> functions map HTTP GET requests to specific controller methods. " +
        "This configuration ensures that the personalized message <b>('Welcome, [username]')</b> is displayed when a user visits the homepage, handling cases where a username is not provided."
    },
    {
        title: "Creating Additional Routes",
        content: 
        "I created additional routes to return a view for an <b>'About Us'</b> page, linking the <code>/about</code> URL to the about method in the LoginController. " +
        "I also set up a redirect from <code>/home</code> to <code>/</code>, directing users to the homepage, which prevents <b>404 errors.</b>"
    },
    {
        title: "Using Route Parameters",
        content: 
        "I defined a route with a required parameter, <code>{username}</code>, which allows for routes like <code>/user/johndoe</code> to pass the username to the userProfile method. " +
        "Additionally, I included an optional parameter <code>{username?}</code> to default to 'guest' when no username is provided."
    },
    {
        title: "Regular Expression Constraints",
        content: 
        "To enforce validation on route parameters, I applied regular expression constraints. The <code>where()</code> method ensures only alphabetic characters are accepted, enhancing security and integrity."
    },
    {
        title: "Server-side Validation",
        content: 
        "In the controller, I implemented a server-side validation rule of <code>'nullable|alpha'</code>. This ensures the username can be null or, if provided, must consist only of alphabetic characters, maintaining robustness."
    },
    {
        title: "Summary",
        content: 
        "This documentation outlines the steps taken in the WebDev_Lab2 project, detailing the creation of routes, controller logic, and validation methods. " +
        "The project structure effectively supports a personalized user experience while ensuring data integrity and security throughout."
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
