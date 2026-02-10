<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Text-to-Speech</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 20px;
            background-color: #f4f4f9;
        }
        .container {
            max-width: 600px;
            margin: 0 auto;
            padding: 20px;
            background: white;
            border-radius: 10px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }
        textarea {
            width: 100%;
            height: 100px;
            margin-bottom: 10px;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
            font-size: 16px;
            resize: none;
        }
    </style>
</head>
<body onload="initializeSpeech()">
    <div class="container">
        <h1>Text-to-Speech</h1>
        <textarea id="text" readonly>Nexis365 How Can I help you.</textarea>
    </div>

    <script>
        function initializeSpeech() {
            const text = document.getElementById('text').value;
            const utterance = new SpeechSynthesisUtterance(text);
            utterance.lang = 'en-US';

            function speak() {
                const voices = window.speechSynthesis.getVoices();
                if (voices.length > 0) {
                    utterance.voice = voices.find(voice => voice.lang === 'en-US') || voices[0];
                }
                window.speechSynthesis.speak(utterance);
            }

            if (window.speechSynthesis.getVoices().length === 0) {
                window.speechSynthesis.addEventListener('voiceschanged', speak);
            } else {
                speak();
            }
        }
    </script>
</body>
</html>
