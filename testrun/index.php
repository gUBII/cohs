<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>AJAX Content Loading</title>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    
    <link href="https://cdn.jsdelivr.net/npm/summernote@0.9.0/dist/summernote-lite.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/summernote@0.9.0/dist/summernote-lite.min.js"></script>
                                    
    <style>
        #content-container {
            border: 1px solid #ccc;
            padding: 20px;
            margin: 20px 0;
            min-height: 100px;
        }
        button {
            padding: 8px 16px;
            background: #007bff;
            color: white;
            border: none;
            cursor: pointer;
        }
    </style>
</head>
<body>
    <h1>Dynamic Content Loading</h1>
    
    <button id="load-btn">Load Content</button>
    
    <div id="content-container">
        <!-- Content will be loaded here -->
        <p>Content will appear here when loaded.</p>
    </div>

    <script>
    $(document).ready(function() {
        // Load content when button is clicked
        $('#load-btn').click(function() {
            $('#content-container').load('content.php', function(response, status, xhr) {
                if (status === "success") {
                    // Process any scripts in the loaded content
                    $(response).filter('script').each(function() {
                        $.globalEval(this.text || this.textContent || this.innerHTML || '');
                    });
                    
                    // Alternative: Use event delegation for dynamic elements
                    $(document).on('click', '.dynamic-button', function() {
                        alert('Button from loaded content works!');
                    });
                }
            });
        });
        
        // Event delegation for any dynamically loaded elements
        $(document).on('click', '.dynamic-element', function() {
            console.log('Dynamic element clicked');
        });
    });
    </script>
</body>
</html>