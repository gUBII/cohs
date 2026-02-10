const startButton = document.getElementById('startButton');
const output = document.getElementById('output');
const outputx = document.getElementById('outputx');
const outputform = document.getElementById('outputform');
const copyButton = document.getElementById('copyButton');
const clearButton = document.getElementById('clearButton');

copyButton.onclick = function() {
    const textToCopy = output.innerText;
    navigator.clipboard.writeText(textToCopy).then(() => {
        alert('Text copied to clipboard!');
    }).catch(err => {
        console.error('Failed to copy: ', err);
    });
};

clearButton.onclick = function() {
    output.innerText = '';
    outputx.value = '';
    // outputform.submit();
};

startButton.addEventListener('click', function() {
    var speech = true;
    window.SpeechRecognition = window.webkitSpeechRecognition;

    const recognition = new SpeechRecognition();
    recognition.interimResults = true;

    recognition.addEventListener('result', e => {
        const transcript = Array.from(e.results)
            .map(result => result[0])
            .map(result => result.transcript)
            .join('')

            output.innerHTML = transcript;
            outputx.value = transcript;
            document.cookie = "voiceresult="+transcript;+" expires=Thu, 18 Dec 2026 12:00:00 UTC";
            
        console.log(transcript);
        
    });

    if (speech == true) {
        recognition.start();
    }
});