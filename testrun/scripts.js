// This will work if loaded after the content
document.getElementById('script-button').addEventListener('click', function() {
    alert('External JavaScript file works!');
});

// Hover effect for dynamic element
document.querySelector('.dynamic-element').addEventListener('mouseover', function() {
    console.log('Mouse over dynamic element');
});