<?php
    echo"<iframe name='dataprocessor' src='x.php' height='5' width='5' scrolling='no' border='0' frameborder='0'>&nbsp;</iframe>";
    
    // echo"<script src='js/vendor/jquery-3.5.1.min.js'></script>";
    echo"<script src='https://code.jquery.com/jquery-3.7.1.min.js' integrity='sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=' crossorigin='anonymous'></script>";

    echo"<script src='js/vendor/bootstrap.bundle.min.js'></script>
    <script src='js/vendor/OverlayScrollbars.min.js'></script>
    <script src='js/vendor/autoComplete.min.js'></script>
    <script src='js/vendor/clamp.min.js'></script>
    <script src='icon/acorn-icons.js'></script>
    <script src='icon/acorn-icons-interface.js'></script>
    <script src='js/cs/scrollspy.js'></script>
    <script src='js/vendor/datatables.min.js'></script>

    <script src='js/vendor/bootstrap-notify.min.js'></script>
    <script src='js/plugins/notifies.js'></script>

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
    <script src='js/vendor/select2.full.min.js'></script>
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
    <script src='js/plugins/charts.js'></script>";
    
    // echo"<script src='https://code.jquery.com/ui/1.14.0/jquery-ui.js'></script>";     
    // echo"<script src='js/plugins/datatable.editablerows.js'></script>";    
    
    ?>
    <script type="text/javascript">
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
        function myFunction() {
            var input, filter, table, tr, td, i, txtValue;
            input = document.getElementById("myInput");
            filter = input.value.toUpperCase();
            table = document.getElementById("myTable");
            tr = table.getElementsByTagName("tr");
            for (i = 0; i < tr.length; i++) {
                td = tr[i].getElementsByTagName("td")[1];
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