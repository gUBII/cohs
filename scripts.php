<?php
    echo"<iframe name='dataprocessor' src='x.php' height='5' width='5' scrolling='no' border='0' frameborder='0'>&nbsp;</iframe>";
    
    // NOTIFICATION MODAL WINDOW
    echo"<div class='modal fade' id='notifModal' tabindex='-1' aria-hidden='true'>
        <div class='modal-dialog modal-dialog-centered modal-lg modal-dialog-scrollable'>
            <div class='modal-content'>
                <div class='modal-header'>
                    <h5 class='modal-title m-0'>New Notifications</h5>
                    <button type='button' class='btn-close' data-bs-dismiss='modal' aria-label='Close' id='notifCloseX'></button>
                </div>
                <div class='modal-body'>
                    <div class='d-flex justify-content-between align-items-center mb-3'>
                        <div class='notif-actions'>
                            <table><tr>
                                <td style='padding:10px'><div class='form-check m-0'><input class='form-check-input' type='checkbox' id='selectAll'></div></td>
                                <td style='padding:10px'><button class='btn btn-outline-success btn-sm' id='markSelected'>Mark Selected As Read</button></td>";
                                // <td style='padding:10px'><button class='btn btn-outline-info btn-sm' id='clearSelected'>Clear</button></td>
                            echo"</tr></table>
                        </div>
                        <button class='btn btn-outline-danger btn-sm' id='markAllRead'>Mark all as read</button>
                    </div>
                    <div id='notifBody'></div>
                </div>";
                // <div class='modal-footer'><button type='button' class='btn btn-secondary' data-bs-dismiss='modal' id='notifCloseBtn'>Close</button></div>
            echo"</div>
        </div>
    </div>";


    // echo"<script src='js/vendor/jquery-3.5.1.min.js'></script>";
    echo"<script src='https://code.jquery.com/jquery-3.7.1.min.js' integrity='sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=' crossorigin='anonymous'></script>
    
    <script src='js/vendor/bootstrap.bundle.min.js'></script>
    <script src='js/vendor/OverlayScrollbars.min.js'></script>
    <script src='js/vendor/autoComplete.min.js'></script>
    <script src='js/vendor/clamp.min.js'></script>
    <script src='icon/acorn-icons.js'></script>
    <script src='icon/acorn-icons-interface.js'></script>
    <script src='js/cs/scrollspy.js'></script>
    <script src='js/vendor/datatables.min.js'></script>

    <script src='js/vendor/bootstrap-notify.min.js'></script>
    <script src='js/plugins/notifies.js'></script>

    <script src='js/vendor/list.js'></script>    
    <script src='js/plugins/lists.js'></script>
    
    <script src='js/base/helpers.js'></script>
    <script src='js/base/globals.js'></script>
    <script src='js/base/nav.js'></script>
    <script src='js/base/search.js'></script>
    <script src='js/base/settings.js'></script>
    <script src='js/cs/datatable.extend.js'></script>
    <script src='js/plugins/datatable.boxedvariations.js'></script>
    <script src='js/common.js'></script>
    <script src='js/scripts.js'></script>

    <script src='js/vendor/Chart.bundle.min.js'></script>
    <script src='js/vendor/chartjs-plugin-datalabels.js'></script>
    <script src='js/vendor/chartjs-plugin-rounded-bar.min.js'></script>
    <script src='js/vendor/glide.min.js'></script>
    <script src='js/vendor/intro.min.js'></script>
    <script src='$mainurl/js/vendor/select2.full.min.js'></script>
    <script src='js/vendor/plyr.min.js'></script>
    <script src='js/cs/responsivetab.js'></script>
    <script src='js/cs/glide.custom.js'></script>
    <script src='js/cs/charts.extend.js'></script>
    <script src='js/pages/dashboard.default.js'></script>
    <script src='js/vendor/bootstrap-submenu.js'></script>
    <script src='js/vendor/mousetrap.min.js'></script>
    
    <script src='js/vendor/moment-with-locales.min.js'></script>
    <script src='js/vendor/chartjs-plugin-crosshair.js'></script>
    <script src='js/vendor/chartjs-plugin-streaming.min.js'></script>
    <script src='js/plugins/charts.js'></script>
    
    <script src='$mainurl/js/forms/controls.select2.js'></script>
    
    ";
    
    // echo"<script src='js/plugins/datatable.editablerows.js'></script>";
    // echo"<script src='assets/ui/jquery-ui.min.js'></script>";
    
    if(isset($_GET["url"])){
        if($_GET["url"]=="task_manager.php"){
            echo"<script src='js/jquery-ui.min.js'></script>
            <script src='js/inspinia.js'></script>";
        }
    }
    if(isset($_GET["url"])){
        if($_GET["url"]=="appointment_manager.php"){
            echo"<script src='js/jquery-ui.min.js'></script>
            <script src='js/inspinia.js'></script>";
        }
    }
    
?>
    <script src='https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.5.1/jspdf.umd.min.js'></script>
    <script src='https://cdnjs.cloudflare.com/ajax/libs/html2canvas/1.4.1/html2canvas.min.js'></script>
    <script>
        async function printPDF() {
            const { jsPDF } = window.jspdf;
            const section = document.getElementById("lineChartTitlex");
            // Use html2canvas to render the section
            const canvas = await html2canvas(section, {
                scale: 2,
                useCORS: true
            });
            
            const imgData = canvas.toDataURL("image/png");
            const pdf = new jsPDF("p", "mm", "a4");
            const pageWidth = pdf.internal.pageSize.getWidth();
            const pageHeight = pdf.internal.pageSize.getHeight();
            const imgProps = pdf.getImageProperties(imgData);
            const imgWidth = pageWidth;
            const imgHeight = (imgProps.height * imgWidth) / imgProps.width;
            let heightLeft = imgHeight;
            let position = 0;
                
            // Add first page
            pdf.addImage(imgData, "PNG", 0, position, imgWidth, imgHeight);
            heightLeft -= pageHeight;
            
            // Add more pages if necessary
            while (heightLeft > 0) {
                position = heightLeft - imgHeight;
                pdf.addPage();
                pdf.addImage(imgData, "PNG", 0, position, imgWidth, imgHeight);
                heightLeft -= pageHeight;
            }
            
            pdf.save("Budget_Breakdown.pdf");
            
        }
        
        async function printPDF2() {
            const { jsPDF } = window.jspdf;
            const section = document.getElementById("lineChartTitlex2");
            // Use html2canvas to render the section
            const canvas = await html2canvas(section, {
                scale: 2,
                useCORS: true
            });
            
            const imgData = canvas.toDataURL("image/png");
            const pdf = new jsPDF("p", "mm", "a4");
            const pageWidth = pdf.internal.pageSize.getWidth();
            const pageHeight = pdf.internal.pageSize.getHeight();
            const imgProps = pdf.getImageProperties(imgData);
            const imgWidth = pageWidth;
            const imgHeight = (imgProps.height * imgWidth) / imgProps.width;
            let heightLeft = imgHeight;
            let position = 0;
                
            // Add first page
            pdf.addImage(imgData, "PNG", 0, position, imgWidth, imgHeight);
            heightLeft -= pageHeight;
            
            // Add more pages if necessary
            while (heightLeft > 0) {
                position = heightLeft - imgHeight;
                pdf.addPage();
                pdf.addImage(imgData, "PNG", 0, position, imgWidth, imgHeight);
                heightLeft -= pageHeight;
            }
            
            pdf.save("client_sos_quotation.pdf");
            
        }
    </script>
    
    <script type="text/javascript">
        
        /*
        function shiftdata1(shiftid1,shiftid2){
            $.ajax({
                url: 'schedule-list.php?<?php // echo"days=$d1&months=$mm1&years=$y&" ?>sid='+shiftid1, 
                success: function(html) {
                    var ajaxDisplay = document.getElementById(shiftid2);
                    ajaxDisplay.innerHTML = html;
                }
            });
        }
        */

        function smain(smain1,smain2){
            $.ajax({
                url: 'main.php?nexis=0&smsbd='+smain1, 
                success: function(html) {
                    var ajaxDisplay = document.getElementById(smain2);
                    ajaxDisplay.innerHTML = html;
                }
            });
        }

        function smenu(smenu1,smenu2){
            $.ajax({
                url: 'menu_loaded.php?cm='+smenu1,
                success: function(html) {
                    var ajaxDisplay = document.getElementById(smenu2);
                    ajaxDisplay.innerHTML = html;
                }
            });
        }

        function shiftdataV1(shiftdataV11,shiftdataV12){
            $.ajax({
                url: shiftdataV11+'.php', 
                success: function(html) {
                    var ajaxDisplay = document.getElementById(shiftdataV12);
                    ajaxDisplay.innerHTML = html;
                }
            });
        }

        function menuZ(menu1,menu2){
            $.ajax({
                url: menu1+'.php', 
                success: function(html) {
                    var ajaxDisplay = document.getElementById(menu2);
                    ajaxDisplay.innerHTML = html;
                }
            });
        }

        function shiftdataV2(shiftdataV21,shiftdataV22){
            $.ajax({
                url: './modules/'+shiftdataV21+'&smsbd=786', 
                success: function(html) {
                    var ajaxDisplay = document.getElementById(shiftdataV22);
                    ajaxDisplay.innerHTML = html;
                }
            });
        }

        function shiftdataV3(shiftdataV21,shiftdataV22){
            $.ajax({
                url: ''+shiftdataV21+'&smsbd=786', 
                success: function(html) {
                    var ajaxDisplay = document.getElementById(shiftdataV22);
                    ajaxDisplay.innerHTML = html;
                }
            });
        }
        
        function voicedataV2(voicedataV21,voicedataV22){
            $.ajax({
                url: './'+voicedataV21+'&smsbd=786', 
                success: function(html) { 
                    var ajaxDisplay = document.getElementById(voicedataV22);
                    ajaxDisplay.innerHTML = html;
                }
            });
        }
    </script>

    <script>
        $(document).ready(function(){
            $( "#page_list" ).sortable({
                placeholder : "ui-state-highlight",
                update  : function(event, tbody) {
                    var page_id_array = new Array();
                    $('#page_list tr').each(function(){
                        page_id_array.push($(this).attr("id"));
                    });
                    $.ajax({
                        url:"sorting_processor_solutions.php",
                        method:"POST",
                        data:{page_id_array:page_id_array},
                        success:function(data){
                           // alert(data);
                        }
                    });
                }
            });
            $( "#page_list_2" ).sortable({
                placeholder : "ui-state-highlight",
                update  : function(event, tbody) {
                    var page_id_array = new Array();
                    $('#page_list tr').each(function(){
                        page_id_array.push($(this).attr("id"));
                    });
                    $.ajax({
                        url:"sorting_processor_modules.php",
                        method:"POST",
                        data:{page_id_array:page_id_array},
                        success:function(data){
                            // alert(data);
                        }
                    });
                }
            });
        });
    </script> 
    
    
    <!--- table search and sorting --->
    <script>
        function sortTable(n) {
            var table, rows, switching, i, x, y, shouldSwitch, dir, switchcount = 0;
            table = document.getElementById("myTable");
            switching = true;            
            dir = "asc";             
            while (switching) {                
                switching = false;
                rows = table.rows;
                for (i = 1; i < (rows.length - 1); i++) {
                    shouldSwitch = false;
                    x = rows[i].getElementsByTagName("TD")[n];
                    y = rows[i + 1].getElementsByTagName("TD")[n];
                    if (dir == "asc") {
                        if (x.innerHTML.toLowerCase() > y.innerHTML.toLowerCase()) {
                            shouldSwitch= true;
                            break;
                        }
                    } else if (dir == "desc") {
                        if (x.innerHTML.toLowerCase() < y.innerHTML.toLowerCase()) {
                            shouldSwitch = true;
                            break;
                        }
                    }
                }

                if (shouldSwitch) {
                    rows[i].parentNode.insertBefore(rows[i + 1], rows[i]);
                    switching = true;
                    switchcount ++;      
                } else {
                    if (switchcount == 0 && dir == "asc") {
                        dir = "desc";
                        switching = true;
                    }
                }
            }
        }

        function myFunction() {
            var input, filter, table, tr, td, i, txtValue;
            input = document.getElementById("myInput");
            filter = input.value.toUpperCase();
            table = document.getElementById("myTable");
            tr = table.getElementsByTagName("tr");
            for (i = 0; i < tr.length; i++) {
                td = tr[i].getElementsByTagName("td")[0];
                if (td) {
                    txtValue = td.textContent || td.innerText;
                    if (txtValue.toUpperCase().indexOf(filter) > -1) {
                        tr[i].style.display = "";
                    } else {
                        tr[i].style.display = "none";
                    }
                }       
            }
        }
        
        function myFunctionX() {
            var input, filter, table, tr, td, i, txtValue;
            input = document.getElementById("myInputX");
            filter = input.value.toUpperCase();
            table = document.getElementById("myTableX");
            tr = table.getElementsByTagName("tr");
            for (i = 0; i < tr.length; i++) {
                td = tr[i].getElementsByTagName("td")[0];
                if (td) {
                    txtValue = td.textContent || td.innerText;
                    if (txtValue.toUpperCase().indexOf(filter) > -1) {
                        tr[i].style.display = "";
                    } else {
                        tr[i].style.display = "none";
                    }
                }       
            }
        }
        
        function sortTable0() {
            var table, rows, switching, i, x, y, shouldSwitch;
            table = document.getElementById("myTable");
            switching = true;
            /*Make a loop that will continue until no switching has been done:*/
            while (switching) {            
                switching = false;
                rows = table.rows;    
                for (i = 1; i < (rows.length - 1); i++) {
                    shouldSwitch = false;
                    x = rows[i].getElementsByTagName("TD")[0];
                    y = rows[i + 1].getElementsByTagName("TD")[0];
                    if (x.innerHTML.toLowerCase() > y.innerHTML.toLowerCase()) {
                        shouldSwitch = true;
                        break;
                    }
                }
                if (shouldSwitch) {
                    rows[i].parentNode.insertBefore(rows[i + 1], rows[i]);
                    switching = true;
                }
            }
        }
        function sortTable1() {
            var table, rows, switching, i, x, y, shouldSwitch;
            table = document.getElementById("myTable");
            switching = true;
            /*Make a loop that will continue until no switching has been done:*/
            while (switching) {            
                switching = false;
                rows = table.rows;    
                for (i = 1; i < (rows.length - 1); i++) {
                    shouldSwitch = false;
                    x = rows[i].getElementsByTagName("TD")[1];
                    y = rows[i + 1].getElementsByTagName("TD")[1];
                    if (x.innerHTML.toLowerCase() > y.innerHTML.toLowerCase()) {
                        shouldSwitch = true;
                        break;
                    }
                }
                if (shouldSwitch) {
                    rows[i].parentNode.insertBefore(rows[i + 1], rows[i]);
                    switching = true;
                }
            }
        }
        function sortTable2() {
            var table, rows, switching, i, x, y, shouldSwitch;
            table = document.getElementById("myTable");
            switching = true;
            /*Make a loop that will continue until no switching has been done:*/
            while (switching) {            
                switching = false;
                rows = table.rows;    
                for (i = 1; i < (rows.length - 1); i++) {
                    shouldSwitch = false;
                    x = rows[i].getElementsByTagName("TD")[2];
                    y = rows[i + 1].getElementsByTagName("TD")[2];
                    if (x.innerHTML.toLowerCase() > y.innerHTML.toLowerCase()) {
                        shouldSwitch = true;
                        break;
                    }
                }
                if (shouldSwitch) {
                    rows[i].parentNode.insertBefore(rows[i + 1], rows[i]);
                    switching = true;
                }
            }
        }
        function sortTable3() {
            var table, rows, switching, i, x, y, shouldSwitch;
            table = document.getElementById("myTable");
            switching = true;
            /*Make a loop that will continue until no switching has been done:*/
            while (switching) {            
                switching = false;
                rows = table.rows;    
                for (i = 1; i < (rows.length - 1); i++) {
                    shouldSwitch = false;
                    x = rows[i].getElementsByTagName("TD")[3];
                    y = rows[i + 1].getElementsByTagName("TD")[3];
                    if (x.innerHTML.toLowerCase() > y.innerHTML.toLowerCase()) {
                        shouldSwitch = true;
                        break;
                    }
                }
                if (shouldSwitch) {
                    rows[i].parentNode.insertBefore(rows[i + 1], rows[i]);
                    switching = true;
                }
            }
        }
        function sortTable4() {
            var table, rows, switching, i, x, y, shouldSwitch;
            table = document.getElementById("myTable");
            switching = true;
            /*Make a loop that will continue until no switching has been done:*/
            while (switching) {            
                switching = false;
                rows = table.rows;    
                for (i = 1; i < (rows.length - 1); i++) {
                    shouldSwitch = false;
                    x = rows[i].getElementsByTagName("TD")[4];
                    y = rows[i + 1].getElementsByTagName("TD")[4];
                    if (x.innerHTML.toLowerCase() > y.innerHTML.toLowerCase()) {
                        shouldSwitch = true;
                        break;
                    }
                }
                if (shouldSwitch) {
                    rows[i].parentNode.insertBefore(rows[i + 1], rows[i]);
                    switching = true;
                }
            }
        }
        function sortTable5() {
            var table, rows, switching, i, x, y, shouldSwitch;
            table = document.getElementById("myTable");
            switching = true;
            /*Make a loop that will continue until no switching has been done:*/
            while (switching) {            
                switching = false;
                rows = table.rows;    
                for (i = 1; i < (rows.length - 1); i++) {
                    shouldSwitch = false;
                    x = rows[i].getElementsByTagName("TD")[5];
                    y = rows[i + 1].getElementsByTagName("TD")[5];
                    if (x.innerHTML.toLowerCase() > y.innerHTML.toLowerCase()) {
                        shouldSwitch = true;
                        break;
                    }
                }
                if (shouldSwitch) {
                    rows[i].parentNode.insertBefore(rows[i + 1], rows[i]);
                    switching = true;
                }
            }
        }
        function sortTable6() {
            var table, rows, switching, i, x, y, shouldSwitch;
            table = document.getElementById("myTable");
            switching = true;
            /*Make a loop that will continue until no switching has been done:*/
            while (switching) {            
                switching = false;
                rows = table.rows;    
                for (i = 1; i < (rows.length - 1); i++) {
                    shouldSwitch = false;
                    x = rows[i].getElementsByTagName("TD")[6];
                    y = rows[i + 1].getElementsByTagName("TD")[6];
                    if (x.innerHTML.toLowerCase() > y.innerHTML.toLowerCase()) {
                        shouldSwitch = true;
                        break;
                    }
                }
                if (shouldSwitch) {
                    rows[i].parentNode.insertBefore(rows[i + 1], rows[i]);
                    switching = true;
                }
            }
        }
        function sortTable7() {
            var table, rows, switching, i, x, y, shouldSwitch;
            table = document.getElementById("myTable");
            switching = true;
            /*Make a loop that will continue until no switching has been done:*/
            while (switching) {            
                switching = false;
                rows = table.rows;    
                for (i = 1; i < (rows.length - 1); i++) {
                    shouldSwitch = false;
                    x = rows[i].getElementsByTagName("TD")[7];
                    y = rows[i + 1].getElementsByTagName("TD")[7];
                    if (x.innerHTML.toLowerCase() > y.innerHTML.toLowerCase()) {
                        shouldSwitch = true;
                        break;
                    }
                }
                if (shouldSwitch) {
                    rows[i].parentNode.insertBefore(rows[i + 1], rows[i]);
                    switching = true;
                }
            }
        }
        function sortTable8() {
            var table, rows, switching, i, x, y, shouldSwitch;
            table = document.getElementById("myTable");
            switching = true;
            /*Make a loop that will continue until no switching has been done:*/
            while (switching) {            
                switching = false;
                rows = table.rows;    
                for (i = 1; i < (rows.length - 1); i++) {
                    shouldSwitch = false;
                    x = rows[i].getElementsByTagName("TD")[8];
                    y = rows[i + 1].getElementsByTagName("TD")[8];
                    if (x.innerHTML.toLowerCase() > y.innerHTML.toLowerCase()) {
                        shouldSwitch = true;
                        break;
                    }
                }
                if (shouldSwitch) {
                    rows[i].parentNode.insertBefore(rows[i + 1], rows[i]);
                    switching = true;
                }
            }
        }
    </script>

    <!-- print with table --->
    <script>
        function printDivTable() {
            let divContents = document.getElementById("GFG").innerHTML;
            let printWindow = window.open('', '', 'height=500, width=500');
            printWindow.document.open();
            printWindow.document.write(`
                <html>
                <head>
                    <title>Print Div Content</title>
                    <style>
                        body { font-family: Arial, sans-serif; }
                        table { width: 100%; border-collapse: collapse; }
                        th, td { border: 1px solid #ddd; padding: 8px; }
                        th { background-color: #f4f4f4; }
                    </style>
                </head>
                <body>                    
                    ${divContents}
                </body>
                </html>
            `);
            printWindow.document.close();
            printWindow.print();
        }
    </script>

    <!-- General Print --->
    <script>
        function printDivGeneral() {
            let divContents = document.getElementById("GFG").innerHTML;
            let printWindow = window.open('', '', 'height=500, width=500');
            printWindow.document.open();
            printWindow.document.write(`
                <html>
                <head>
                    <title>Print Div Content</title>
                    <style>
                        body { font-family: Arial, sans-serif; }
                        h1 { color: #333; }
                    </style>
                </head>
                <body>
                    <h1>Div Contents:</h1>
                    ${divContents}
                </body>
                </html>
            `);
            printWindow.document.close();
            printWindow.print();
        }
    </script>
    
    <!--- data copy ---->
    <script>
        function CopyToClipboard(id){
            var r = document.createRange();
            r.selectNode(document.getElementById(id));
            window.getSelection().removeAllRanges();
            window.getSelection().addRange(r);
            document.execCommand('copy');
            window.getSelection().removeAllRanges();
        }
    </script>
    
    <script>
        function openForm() {
            document.getElementById("myForm").style.display = "block";
        }
        function closeForm() {
            document.getElementById("myForm").style.display = "none";
        }
    </script>
    
    
    <script>
        function speak() {
            const text = document.getElementById('text').value;
            if (!text) {
                alert('Please enter some text to speak.');
                return;
            }

            const utterance = new SpeechSynthesisUtterance(text);
            utterance.lang = 'en-US'; // Set language

            const initializeVoices = () => {
                const voices = window.speechSynthesis.getVoices();
                if (voices.length > 0) {
                    utterance.voice = voices.find(voice => voice.lang === 'en-US') || voices[0];
                }
                window.speechSynthesis.speak(utterance);
            };

            // Ensure voices are loaded
            if (speechSynthesis.getVoices().length === 0) {
                speechSynthesis.addEventListener('voiceschanged', initializeVoices);
            } else {
                initializeVoices();
            }
        }
        function speak2() {
            const text = document.getElementById('text2').value;
            if (!text) {
                alert('Please enter some text to speak.');
                return;
            }

            const utterance = new SpeechSynthesisUtterance(text);
            utterance.lang = 'en-US'; // Set language

            const initializeVoices = () => {
                const voices = window.speechSynthesis.getVoices();
                if (voices.length > 0) {
                    utterance.voice = voices.find(voice => voice.lang === 'en-US') || voices[0];
                }
                window.speechSynthesis.speak(utterance);
            };

            // Ensure voices are loaded
            if (speechSynthesis.getVoices().length === 0) {
                speechSynthesis.addEventListener('voiceschanged', initializeVoices);
            } else {
                initializeVoices();
            }
        }
    </script>
    
    
    <script>
        // ===================== Location Access =====================
        function getLocation() {
          if (navigator.geolocation) {
            navigator.geolocation.getCurrentPosition(showPosition, showError);
          } else {
            alert("Geolocation is not supported by your browser.");
          }
        }
    
        function showPosition(position) {
          const lat = position.coords.latitude;
          const lon = position.coords.longitude;
          document.getElementById("location").innerText = `Latitude: ${lat}, Longitude: ${lon}`;
    
          // Send location data to PHP
          fetch('index.php', {
            method: 'POST',
            headers: { 'Content-Type': 'application/json' },
            body: JSON.stringify({ action: 'location', latitude: lat, longitude: lon })
          }).then(response => response.text()).then(data => console.log(data));
        }
    
        function showError(error) {
          alert(`Error accessing location: ${error.message}`);
        }

        // ===================== Camera Access =====================
        const video = document.getElementById('video');
        const canvas = document.getElementById('canvas');
        const context = canvas.getContext('2d');

        function startCamera() {
          navigator.mediaDevices.getUserMedia({ video: true })
            .then(stream => {
              video.style.display = 'block';
              document.getElementById('captureBtn').style.display = 'inline-block';
              video.srcObject = stream;
            })
            .catch(err => alert(`Error accessing camera: ${err.message}`));
        }

        function capturePhoto() {
          canvas.width = video.videoWidth;
          canvas.height = video.videoHeight;
          context.drawImage(video, 0, 0, canvas.width, canvas.height);
    
          // Convert the image to base64 and send to PHP
          const imageData = canvas.toDataURL('image/png');
          fetch('index.php', {
            method: 'POST',
            headers: { 'Content-Type': 'application/json' },
            body: JSON.stringify({ action: 'camera', image: imageData })
          }).then(response => response.text()).then(data => console.log(data));
        }

        // ===================== Push Notifications =====================
        if ('serviceWorker' in navigator && 'PushManager' in window) {
          navigator.serviceWorker.register('./assets/sw.js').then(reg => {
            console.log('Service Worker Registered:', reg);
          }).catch(err => console.error('Service Worker Error:', err));
        }

        function subscribeToNotifications() {
          navigator.serviceWorker.ready.then(reg => {
            reg.pushManager.subscribe({
              userVisibleOnly: true,
              applicationServerKey: '<Your Public VAPID Key>'
            }).then(subscription => {
              fetch('index.php', {
                method: 'POST',
                headers: { 'Content-Type': 'application/json' },
                body: JSON.stringify({ action: 'subscribe', subscription })
              }).then(response => response.text()).then(data => console.log(data));
            }).catch(err => alert(`Error subscribing to notifications: ${err.message}`));
          });
        }
    </script>
    
    <script>
        function checkInternet(event) {
            if (!navigator.onLine) {
                alert("Internet Connection lost...");
                event.preventDefault(); // Prevent navigation
                return false;
            }
            return true;
        }

        window.addEventListener('offline', function() {
            alert("Internet Connection lost...");
        });
    </script>
    
    <script>
        // --- NOTIFICATION MANAGER SCRIPTS ---
        
        let lastId = 0;
        let isOpen = false;
        const shownIds = new Set();
        const modalEl = document.getElementById('notifModal');
        const modal = new bootstrap.Modal(modalEl);
        
        // --- Utilities ---
        function escapeHtml(s){
          return String(s)
            .replace(/&/g,'&amp;')
            .replace(/</g,'&lt;')
            .replace(/>/g,'&gt;')
            .replace(/"/g,'&quot;')
            .replace(/'/g,'&#39;');
        }
        function nl2br(s){ return String(s).replace(/\n/g,'<br>'); }
        
        // Card renderer with checkbox
        function renderItem(n){
          const id = Number(n.id);
          return `
            <div class="notif-card d-flex gap-2 align-items-start" data-id="${id}">
              <div class="form-check mt-1">
                <input class="form-check-input notif-check" type="checkbox" value="${id}">
              </div>
              <div class="flex-grow-1">
                <div class="notif-title">${escapeHtml(n.title)}</div>
                <div class="mt-1">${nl2br(n.message)}</div>
                <div class="notif-time mt-1 text-muted">${escapeHtml(n.created_at)}</div>
              </div>
            </div>
          `;
        }

        
        // --- Polling (auto-append new items; pop modal if closed) ---
        function poll() {
          $.getJSON("notify_check.php", { last_id: lastId }, function(res){
            if(!res || !Array.isArray(res.new)) return;
        
            let appended = 0;
            res.new.forEach(n => {
              const nid = Number(n.id);
              if(!shownIds.has(nid)){ // avoid duplicates
                $("#notifBody").append(renderItem(n));
                shownIds.add(nid);
                appended++;
              }
              if(nid > lastId) lastId = nid;
            });
        
            if(appended > 0 && !isOpen){
              modal.show();
              isOpen = true;
            }
          });
        }
        
        // --- Selection helpers ---
        function getSelectedIds(){
          const ids = [];
          $(".notif-check:checked").each(function(){ ids.push(parseInt(this.value,10)); });
          return ids;
        }
        function setAllSelection(checked){
          $(".notif-check").prop("checked", checked);
        }
        
        // --- Events ---
        modalEl.addEventListener('hidden.bs.modal', () => { isOpen = false; });
        
        $("#selectAll").on("change", function(){
          setAllSelection(this.checked);
        });
        
        $("#clearSelected").on("click", function(){
          setAllSelection(false);
          $("#selectAll").prop("checked", false);
        });
        
        $("#markSelected").on("click", function(){
          const ids = getSelectedIds();
          if(ids.length === 0) return;
        
          $.ajax({
            url: "notify_read_selected.php",
            type: "POST",
            data: { ids: ids },
            success: function(resp){
              // Remove only those cards from UI
              ids.forEach(id => {
                $(`.notif-card[data-id='${id}']`).remove();
                shownIds.delete(Number(id));
              });
              // If nothing left, you can optionally hide the modal
              if($("#notifBody").children().length === 0){
                modal.hide();
              }
              // Reset selection toggles
              $("#selectAll").prop("checked", false);
            }
          });
        });
        
        $("#markAllRead").on("click", function(){
          $.post("notify_read.php", function(){
            // Clear UI
            $("#notifBody").html("");
            shownIds.clear();
            $("#selectAll").prop("checked", false);
            modal.hide();
          });
        });
        
        // Optional: manual open (loads current unread list quickly)
        $("#openManually").on("click", function(){
          // Force showing whatever is already stacked
          modal.show();
          isOpen = true;
        });
        
        // Start polling (adjust interval as you like)
        setInterval(poll, 5000);
    </script>