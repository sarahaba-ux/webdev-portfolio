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
                <p>This is about my <b>'Laboratory 4: Middleware'</b> <br>Click the button to open the journal.</p>
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
        title: "Part 1: Create and Register New Middleware - Steps",
        content: 
        "I opened the command prompt or git bash and created the CheckAge and LogRequests middleware.<br>" +
        "<br>❖ This created a new middleware file at <b>app/Http/Middleware/<br>CheckAge.php.</b><br>" +
        "<br>❖ This created a new middleware file at <b>app/Http/Middleware/<br>LogRequests.php.</b>" +
        "<strong><br><br>CheckAge middleware:</strong><br>" +
        "I designed the CheckAge middleware to check if a user's age is greater than or equal to 18.<br>" 
    },
    {
        title: " ",
        content: 
        "● If the user's age is greater than or equal to 18: If the age is 20 or below, it shows the home view. If the age is above 20, it shows the adults view. If the user's age is less than 18, it redirects them to a denied view (Access Denied page).<br>" +
        "● This ensures that users see different pages based on their age.<br>" +
        "<strong><br>LogRequests middleware:</strong><br>" +
        "This middleware captures the URL, HTTP method (e.g., GET, POST), and the current timestamp. The log message is saved to a file called log.txt, which adds new entries to the file. After logging, I pass the request to the next process using $next($request).<br>" +
        "❖ This middleware helps me keep track of every incoming request to my page."
    },
    {
        title: "- log.txt",
        content: 
        "❖ The <b>log.txt</b> consists of URL, Method, and Timestamp.<br>" +
        "<strong>Registration of CheckAge and LogRequests middleware:</strong><br>" +
        "Global Middleware:<br>" +
        "Route-Specific Middleware:<br>" +
        "<br>❖<b> Global Middleware:</b> These middleware run on every request to the application. By adding CheckAge and LogRequests here, I ensure that every request will have its age checked and the request logged. Global middleware applies to all requests.<br>" +
        "<br>❖<b> Route Middleware:</b> These middleware are applied only to specific routes where I explicitly include them. This allows me to control which routes should have age checking and logging functionality."
    },
    {
        title: "Explanation/Summary",
        content: 
        "1. I use middlewares to filter HTTP requests and responses. CheckAge validates the age of a user, and LogRequests logs incoming requests.<br>" +
        "<b>a. CheckAge: </b>This middleware helps control access to specific content based on the user's age, ensuring that the application responds appropriately to different age groups.<br>" +
        "<b>b. LogRequests: </b>This middleware is essential for tracking and auditing user activity, helping me understand how the application is being used and troubleshoot any issues that may arise.<br>" +
        "<br>2. By registering middleware as both global and route-specific, I can decide whether to apply the middleware universally or only to certain parts of the application, offering flexibility and control over how requests are processed."
    },
    {
        title: "Part 2: Assign Middleware to Routes - Welcome Page Route",
        content: 
        "<b>1. Welcome Page Route:<br></b>" +
        "a. Route: /<br>" +
        "b. Purpose: I display the age verification form (view called Age)." +
        "<br><br><b>2. Route Group</b> (with LogRequests Middleware):<br>" 
    },
    {
        title: "",
        content: 
        "a. Inside this group, all routes log the request details (like URL and timestamp) via the LogRequests middleware.<br>" +
        "<br>b. Age Verification Route:<br>" +
        "i. Route: /<br>" +
        "ii. Purpose: After submitting the age form, the CheckAge middleware is applied to ensure the user meets the age requirement. If the user is old enough, they are shown the adults view."
    },
    {
        title: "- Other Routes and Access Denied Page",
        content: 
        "c. Other Routes ( /homepage, /about, /content, etc.):<br>" +
        "i. These pages display content specific to the route but also benefit from logging due to the group middleware.<br>" +
        "<br><b>3. Access Denied Page:<br></b>" +
        "a. Route: /denied<br>" +
        "b. Purpose: This page is shown if the user fails the age check."
    },
    {
        title: "- Restricted Content Route",
        content: 
        "<b>4. Restricted Content Route (Adults Only):<br></b>" +
        "a. Route: /adults<br>" +
        "b. Purpose: Only users 21 years or older can access this route. <br>The CheckAge middleware checks the age and restricts access if the condition isn't met.<br>" +
        "Testing the middleware by simulating different age values in the request."
    },
    {
        title: "Part 2 - Testing Instances",
        content: 
        "<b>Instances:<br></b>" +
        "<b>Age Verification:<br></b>" +
        "<br><br><b>Adult and Minor:<br></b>" +
        "<br>Age: 15 (and below 18 years old)<br>" +
        "❖ If below 18: It goes to access denied page.<br>" +
        "<br>Age: 18<br>" +
        "❖ If 18-20 yrs old: Can access the page.<br>" +
        "If there’s entered username: (can see the entered username in the URL)<br>" +
        "If no entered username: (guest)<br>" +
        "Age: 21 (For Adults)"
    },
    {
        title: "Part 3: Create Middleware with Parameters",
        content: 
        "<b>1. Modified CheckAge Middleware:<br></b>" +
        "a. The CheckAge middleware now accepts a parameter ($minAge), which specifies the minimum required age for access.<br>" +
        "b. The middleware checks the user's age (from request input) against the provided minimum age.<br>" +
        "c. If the user meets the age requirement:<br>" +
        "○ If the age is between 18 and 20, the user is shown the 'home' view.<br>" +
        "○ If the age is above 20, the user is shown the 'adults' view.<br>" +
        "d. If the user does not meet the age requirement, they are redirected to an 'Access Denied' page (denied view)."
    },
    {
        title: "Part 3: Create Middleware with Parameters <br>- New Route",
        content: 
        "<b>2. New Route with Parameterized Middleware:<br></b>" +
        "a. The route /adults is protected by the CheckAge middleware, with a minimum age requirement of 21 (middleware(CheckAge::class, ':21')).<br>" +
        "b. This ensures only users who are 21 or older can access the /adults page. Users younger than 21 will be redirected to the 'Access Denied' page."
    },
    {
        title: "Summary",
        content: 
        "In this documentation, I created and registered new middleware, specifically CheckAge and LogRequests. " +
        "The CheckAge middleware is used to manage user access based on age, while the LogRequests middleware tracks incoming requests. " +
        "I assigned these middleware to various routes to ensure proper age verification and logging. " +
        "Additionally, I explored how to create parameterized middleware to enforce different age restrictions on specific routes, offering more flexibility in managing user access."
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
