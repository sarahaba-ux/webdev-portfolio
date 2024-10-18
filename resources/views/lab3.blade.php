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
                <p>This is about my <b>'Laboratory 3: Layouts'</b> <br>Click the button to open the journal.</p>
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
        title: "Blade Template Files",
        content: 
        "In my journey through web development, I discovered that the Views/Components/Layout.blade.php file plays a crucial role in defining the overall structure of our web pages. It’s located in the view directory and allows me to separate layout from content, which leads to better organization. This file includes common elements like headers, footers, and navigation. I love how it incorporates yield sections for dynamic content from individual views, promoting code reusability and simplifying maintenance by centralizing these layout components."
    },
    {
        title: "Individual View Files",
        content: 
        "As I delved deeper into the views directory, I found various files like homepage.blade.php, about.blade.php, contact.php, content.php, newsfeed.php, and emailtemplate.blade.php. Each of these files represents an individual view that contains specific content for different parts of my application. It was enlightening to realize that each of these files extends the main layout (layout.blade.php) and uses section directives to define their unique content. This modular approach allows the layout to remain consistent while the content varies across different pages."
    },
    {
        title: "<br>Output for Database (Layout)",
        content: 
        "I learned that extending the layout and inserting content is done through each view file by using the extends <b>('components.layout')</b> directive at the top. I insert specific content using section <b>('section_name')</b> to define the content for a particular section and endsection to close it. This way, every view can contribute its unique content while maintaining the overall layout, creating a harmonious design.<br>"
    },
    {
        title: "Routing Setup",
        content: 
        "I found that routing is defined in the routes/web.php file. Here, I map URLs to specific controllers or view files. The content page can be used for displaying specific content like articles or resources. Additionally, the contact page presents a contact form, and the contact form submission handles POST requests from the contact form, sends an email using the ContactMe Mailable, and redirects back to the contact page with a success message. The newsfeed displays a newsfeed based on an optional category parameter, utilizing the NewsfeedController."
    },
    {
        title: "Challenges Faced",
        content: 
        "Throughout this process, I encountered several challenges. I frequently had to modify the .env and database configuration files to accommodate different environments, which often made the setup cumbersome. Every time I cloned the project into a new environment, I needed to sync the configuration files to ensure everything was aligned properly. This added extra complexity and sometimes led to configuration mismatches. Managing these environment-specific settings became one of the more time-consuming aspects of my development, especially while working across multiple machines or deployment stages."
    },
    {
        title: "Difference Between slot and yield",
        content: 
        "As I worked more with Blade templates, grasping the difference between slot and yield became crucial for me. I used slot within components to create reusable UI elements that could accept dynamic content, which made my components more flexible and efficient. On the other hand, yield proved invaluable in my layouts, allowing me to define sections that could be filled by the content of extending views. This approach helped maintain consistency across my layouts while providing flexibility for each page's unique content. In summary, I realized that slot is for components, while yield is for views extending layouts."
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
