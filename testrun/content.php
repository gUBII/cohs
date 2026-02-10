<div class="loaded-content">
    <h2>This content was loaded via AJAX</h2>
    <p>Current server time: <?php echo date('Y-m-d H:i:s'); ?></p>
    
    <textarea name='note_for_staff' id='summernote1' class='form-control'>24321342</textarea>
                                    
    <button class="dynamic-button">Click Me (Inline Handler)</button>
    <button id="script-button">Click Me (External Handler)</button>
    
    <div class="dynamic-element" style="padding:10px;background:#f0f0f0;margin-top:10px;">
        Hover over me (check console)
    </div>
</div>

<script>
// This inline script will execute because we process it
document.querySelector('.dynamic-button').addEventListener('click', function() {
    alert('Inline JavaScript works!');
});
</script>

<!-- Optional: Load external JS for this content -->
<script src="scripts.js"></script>