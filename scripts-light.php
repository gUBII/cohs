<?php
    echo"<iframe name='dataprocessor' src='x.php' height='5' width='5' scrolling='no' border='0' frameborder='0'>&nbsp;</iframe>";

    echo"<script src='js/vendor/jquery-3.5.1.min.js'></script>
    <script src='js/vendor/bootstrap.bundle.min.js'></script>
    <script src='js/vendor/OverlayScrollbars.min.js'></script>
    <script src='js/vendor/autoComplete.min.js'></script>
    <script src='js/vendor/clamp.min.js'></script>
            
    <script src='icon/acorn-icons.js'></script>
    <script src='icon/acorn-icons-interface.js'></script>
            
    <script src='js/vendor/jquery.validate/jquery.validate.min.js'></script>
            
    <script src='js/vendor/jquery.validate/additional-methods.min.js'></script>

    <script src='js/cs/scrollspy.js'></script>

    <script src='js/base/helpers.js'></script>
    <script src='js/base/globals.js'></script>
    <script src='js/base/nav.js'></script>
    <script src='js/base/search.js'></script>
    <script src='js/base/settings.js'></script>
            
    <script src='js/cs/wizard.js'></script>
    <script src='js/forms/wizards.js'></script>
    
    <script src='js/vendor/select2.full.min.js'></script>
    <script src='js/forms/controls.select2.js'></script>
    
    <script src='js/common.js'></script>
    <script src='js/scripts.js'></script>"; ?>
   
    <script type="text/javascript">
        function slogin(slogin1,slogin2){
            $.ajax({
                url: 'login.php?nexis=0&smsbd='+slogin1, 
                success: function(html) {
                    var ajaxDisplay = document.getElementById(slogin2);
                    ajaxDisplay.innerHTML = html;
                }
            });
        }
    </script>
    
    <script type="text/javascript">
        function sfeature(sfeature1,sfeature2){
            $.ajax({
                url: 'features.php?nexis=0&smsbd='+sfeature1, 
                success: function(html) {
                    var ajaxDisplay = document.getElementById(sfeature2);
                    ajaxDisplay.innerHTML = html;
                }
            });
        }
    </script>
    
    <script type="text/javascript">
        function sregister(sregister1,sregister2){
            $.ajax({
                url: 'register.php?nexis=0&smsbd='+sregister1, 
                success: function(html) {
                    var ajaxDisplay = document.getElementById(sregister2);
                    ajaxDisplay.innerHTML = html;
                }
            });
        }
    </script>
    
    <script type="text/javascript">
        function sforget(sforget1,sforget2){
            $.ajax({
                url: 'forgot.php?nexis=0&smsbd='+sforget1, 
                success: function(html) {
                    var ajaxDisplay = document.getElementById(sforget2);
                    ajaxDisplay.innerHTML = html;
                }
            });
        }
    </script>
    
    <script type="text/javascript">
        function sserviceagreement(sserviceagreement1,sserviceagreement2){
            $.ajax({
                url: 'sservice_agreement.php?nexis=0&smsbd='+sforget1, 
                success: function(html) {
                    var ajaxDisplay = document.getElementById(sserviceagreement2);
                    ajaxDisplay.innerHTML = html;
                }
            });
        }
    </script>
    
    <script>
        $(document).ready(function() {
            $('.select-1').select2();
        });
        $(document).ready(function() {
            $('.select-2').select2();
        });
        $(document).ready(function() {
            $('.select-3').select2();
        });
        $(document).ready(function() {
            $('.select-4').select2();
        });
        $(document).ready(function() {
            $('.select-5').select2();
        });
        $(document).ready(function() {
            $('.select-6').select2();
        });
        $(document).ready(function() {
            $('.select-7').select2();
        });
        $(document).ready(function() {
            $('.select-8').select2();
        });
        $(document).ready(function() {
            $('.select-9').select2();
        });
    </script>
