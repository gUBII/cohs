<?php
    
    include("authenticator.php");
    
    echo"<div style='width:100%;background-color:$bodybc;color:$bodytc' id='datashiftX'>";

        if($cPath==9000) include("search.php");        
        if($cPath==134) include("index-main.php");
        if($cPath==7000) include("blog.php");
        if($cPath==7001) include("promo.php");
        
        if($cPath==4){
            if(isset($prodid)) include("productdetail.php");
            else include("pd.php");
        }

        if($cPath==80010) include("pages.php");

        if($cPath==90000){
            if($_GET["vt"]==1) include("dashboard.php");
            if($_GET["vt"]==2) include("dashboard.php");
            
            if($_GET["vt"]==3) include("security.php");
            if($_GET["vt"]==4)  include("security.php");
            if($_GET["vt"]==5)  include("security.php");
            if($_GET["vt"]==6)  include("security.php");

            if($_GET["vt"]==7)  include("pages.php");
            if($_GET["vt"]==8)  include("pages.php");
            if($_GET["vt"]==8)  include("pages.php");
            if($_GET["vt"]==10)  include("store.php");
        }
        
        if($cPath==80000){
            if($_GET["lid"]==1) include("product_compare.php");
            if($_GET["lid"]==2) include("product_favourite.php");
            if($_GET["lid"]==3) include("product_cart.php");
            if($_GET["lid"]==4)  include("product_checkout.php");
            if($_GET["lid"]==5)  include("security.php");
            if($_GET["lid"]==6)  include("item_request.php");
        }

    echo"</div>";
    
    if(!isset($_GET['section'])){
        
	    include("footer.php");
        
	}else{ ?>
        <script type="text/javascript">
            document.title = "<?= $title ?>";
        </script>
    <?php } ?>
    
    <script type="text/javascript">
        function shiftdatax(shiftidx,shiftidxx){
            $.ajax({
                url: ''+shiftidx,
                success: function(html) {
                    var ajaxDisplay = document.getElementById(shiftidxx);
                    ajaxDisplay.innerHTML = html;
                }
            });
        }
    </script>
    
<!---

    <script type="text/javascript">
        function shiftdata(shiftid1,shiftid11){
            $.ajax({
                url: 'pd.php?cPath=4&catid='+shiftid1, 
                success: function(html) {
                    var ajaxDisplay = document.getElementById(shiftid11);
                    ajaxDisplay.innerHTML = html;
                }
            });
        }
    </script>

    <script type="text/javascript">
        function shiftdata2(shiftid2,shiftid22){
            $.ajax({
                url: 'productdetail.php?cPath=4&prodid='+shiftid2, 
                success: function(html) {
                    var ajaxDisplay = document.getElementById(shiftid22);
                    ajaxDisplay.innerHTML = html;
                }
            });
        }
    </script>
    
    <script type="text/javascript">
        function shiftdata3(shiftid3,shiftid33){
            $.ajax({
                url: 'pages.php?cPath='+shiftid3, 
                success: function(html) {
                    var ajaxDisplay = document.getElementById(shiftid33);
                    ajaxDisplay.innerHTML = html;
                }
            });
        }
    </script>
--->