<?php
    include('auth.php');
    echo"<!DOCTYPE HTML><html lang='en'>";
        include("head.php");
        if(isset($_COOKIE["uid"])){
            // echo"<body onload=\"shiftdataV1('dashboard', 'datashiftX')\" id='top'>";
            echo"<body id='top'>";
            include("sidebar.php");
            echo"<main class='main-wrap'>";
                include("topbar.php");
                echo"<div style='width:100%;' id='datashiftX'>";
                    include("dashboard.php");
                echo"</div>
            </main>";
        }else{
            echo"<body onload=\"shiftdataV1('login', 'datashiftX')\" style='background-color:black' />
            <div style='width:100%;' id='datashiftX'></div>";
        }
        include("footer.php");
        include("scripts.php");
        echo"</body>
    </html>";

       
       
/*
       <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.13.2/themes/base/jquery-ui.min.css" />
       <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
       <script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.13.2/jquery-ui.min.js"></script>
       <script>
           $(document).ready(function(){
            $( "#textbox" ).autocomplete({
                 source: "",
                 minLength: 2
               });
           });
       </script>

       <script>
           $(document).ready(function() {
               $("#textbox").autocomplete({
                   minlength: 2,
                   source: function(request, response) {
                       $.ajax({
                           url: "autocomplete.php",
                           type: "POST",
                           dataType: "json",
                           data: { q: request.term, limit: 10 },
                           success: function(data) {
                               response($.map(data, function(item) {
                                   return {
                                       label: item.title,
                                       value: item.postId

                                   };
                               }));
                           }
                       });
                   },
                   select: function(event, ui) {
                       event.preventDefault();
                       $('#textbox').val(ui.item.label);
                       $('#itemId').val(ui.item.value);
                   }
               });
           });
       </script>
       <input id="textbox" class="full-width" />
*/

?>
