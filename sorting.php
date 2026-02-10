<?php
include("include.php");
$query = "SELECT * FROM solutions ORDER BY orders ASC";
$result = mysqli_query($conn, $query);
?>
<html>
 <head>
  <title>Sorting Table Row using JQuery Drag Drop with Ajax PHP</title>
  
  
  
 </head>
 <body>
    <div class="container box">
        <h1 align="center">Sorting Table Row using JQuery Drag Drop with Ajax PHP</h1><br>
        <table><tbody class="list-unstyled" id="page_list">
        <?php 
            while($row = mysqli_fetch_array($result)) {
                $rand=rand(100,999);
                echo"<tr id='".$row["id"]."'>
                    <td>
                        <div class='card rounded-md radius-rounded p-1 mb-1 no-shadow' style='height:42px'>
                            <table style='width:100%'><tr>
                                <td style='width:90%;font-size:8pt'>".$row["name"]."</td>
                                <td style='width:100%;text-align:right'><div class='form-check form-switch'>
                                    <form name='saas$rand' method=post action='system/dataprocessor.php' target='dataprocessor'>
                                        <input type='hidden' name='processor' value='solutionswitch'><input type='hidden' name='id' value='".$row["id"]."'><input type='hidden' name='switchx' value=''>";
                                        if($row["dashboard"]==1) echo"<input class='form-check-input' type='checkbox' id='flexSwitchCheckChecked' checked name='switch' value='0' onclick=\"this.form.switchx.value=this.value\" onchange='this.form.submit()'/>";
                                        else echo"<input class='form-check-input' type='checkbox' id='flexSwitchCheckChecked' name='switch' value='1' onclick=\"this.form.switchx.value=this.value\" onchange='this.form.submit()'/>";
                                    echo"</form>
                                </div></td>
                            </tr></table>
                        </div>
                    </td>                    
                </tr>";
            }
        ?>
        </tbody></table>        
    </div>
    <script src="http://code.jquery.com/jquery-1.10.2.js"></script>
    <script src="http://code.jquery.com/ui/1.11.2/jquery-ui.js"></script>
  
</body>
</html>

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
                    url:"sorting_processor.php",
                    method:"POST",
                    data:{page_id_array:page_id_array},
                    success:function(data){
                        alert(data);
                    }
                });
            }
        });
    });
</script>