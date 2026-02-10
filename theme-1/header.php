<?php
// Header Windows.
echo"<header id='topx' class='header-area header-style-1 header-height-2'>
        <div class='header-top header-top-ptb-1 d-none d-lg-block' style='background-color:#333333;color:#ffffff;height:30px'>
            <div class='container' style='margin-top:-8px'>
                <div class='row align-items-center'>
                    <div class='col-xl-1 col-lg-1'>
                        <div class='header-info'>
                            <ul><li><i class='fi-rs-marker'></i><a  href='#top' style='color:white'>$mycountry</a></li></ul>
                        </div>
                    </div>
                    <div class='col-xl-6 col-lg-6'>
                        <div class='text-left'>
                            <div id='news-flash' class='d-inline-block' style='margin-top:3px'>
                                <ul>";
                                    $t=0;
                                    $randx=rand(123456,987654);
                                    $s30 = "select * from promo where status='ON' order by id desc limit 5";
                                    $r30 = $conn->query($s30);
                                    if ($r30->num_rows > 0) { while($rs30 = $r30->fetch_assoc()) {
                                        if($t==0) $act="active";
                                        else $act=" ";
                                        $s2 = "select * from sms_link where id='".$rs30["pid"]."' and status='ON' order by id desc limit 1";
                                        $r2 = $conn->query($s2);
                                        if ($r2->num_rows > 0) { while($rs2 = $r2->fetch_assoc()) { $linkn=$rs2["pam"]; } }
                                        echo"<li><a href='#top' style='cursor: pointer' onclick=\"ChangeUrl('index.php?cPath=7001&pcid=".$rs30["pid"]."&promoid=".$rs30["id"]."'); shiftdatax('promo.php?cPath=7001&pcid=".$rs30["pid"]."&promoid=".$rs30["id"]."&cm=1', 'datashiftX')\" target='_self' title='".$rs30["title"]."' target='_self'>
                                            <span style='font-size:10pt;color:$buttonbc;'>$linkn - </span><span style='font-size:10pt;color:$buttontc;'>".$rs30["title"]."</aspan>
                                        </a></li>";
                                        $t=($t+1);
                                    } }
                                echo"</ul>
                            </div>
                        </div>
                    </div>
                    <div class='col-xl-5 col-lg-5'>
                        <div class='header-info header-info-right'>
                            <ul>
                                <li>
                                    <a class='language-dropdown-active' href='#top' style='color:white'> <i class='fi-rs-world'></i> English <i class='fi-rs-angle-small-down'></i></a>
                                    <ul class='language-dropdown'>
                                        <li><a href='#top'><img src='assets/imgs/theme/flag-fr.png' alt=''>English</a></li>
                                    </ul>
                                </li>";
                                
                                $pages1 = "select * from sms_link where des1='TOP MENU' and placement='TOP' and status='ON' order by sorder asc";
                                $pages2 = $conn->query($pages1);
                                if ($pages2->num_rows > 0) { while($pages3 = $pages2->fetch_assoc()) {
                                    $tomtom=0;
                                    $pages4 = "select * from sms_link where des1='".$pages3["id"]."' and status='ON' order by sorder asc limit 1";
                                    $pages5 = $conn->query($pages4);
                                    if ($pages5->num_rows > 0) { while($pages6 = $pages5->fetch_assoc()) { $tomtom=1; } }
                                    echo"<li>";                                        
                                        if($tomtom=="1"){
                                            echo"<a href='#top' class='language-dropdown' href='#top' style='cursor: pointer' onclick=\"ChangeUrl('index.php?cPath=80010&pageid=".$pages3["id"]."'); shiftdatax('pages.php?cPath=80010&pageid=".$pages3["id"]."&cm=1', 'datashiftX')\" target='_self' title='".$pages3["pam"]."'><span style='color:white'>".$pages3["pam"]."</span><i class='fi-rs-angle-small-down'></i></a>
                                            <ul class='language-dropdown'>";
                                                $pages4 = "select * from sms_link where des1='".$pages3["id"]."' and status='ON' order by sorder asc";
                                                $pages5 = $conn->query($pages4);
                                                if ($pages5->num_rows > 0) { while($pages6 = $pages5->fetch_assoc()) {
                                                    echo"<li>
                                                        <a href='#top' style='cursor: pointer' onclick=\"ChangeUrl('index.php?cPath=80010&pageid=".$pages6["id"]."'); shiftdatax('pages.php?cPath=80010&pageid=".$pages6["id"]."&cm=1', 'datashiftX')\" target='_self' title='".$pages6["pam"]."'>
                                                            <span style='text-align:left;color:black;font-size:8pt'>".$pages6["pam"]."</span>
                                                        </a>
                                                    </li>";
                                                } }
                                            echo"</ul>";
                                        }else{
                                            echo"<a href='#top' style='cursor: pointer' onclick=\"ChangeUrl('index.php?cPath=80010&pageid=".$pages3["id"]."'); shiftdatax('pages.php?cPath=80010&pageid=".$pages3["id"]."&cm=1', 'datashiftX')\" target='_self' title='".$pages3["pam"]."'><span style='color:white'>".$pages3["pam"]."</span></a>";
                                        }
                                    echo"</li>";
                                } }
                                
                                if(isset($userid)){
                                    echo"<li><a href='logout.php' target='_self' title='Logout'><span style='color:white'>Logout</span></a></li>";
                                }else{
                                    echo"<li>
                                        <a class='language-dropdown' href='#' style='color:white'> <i class='fi-rs-user'></i> Account <i class='fi-rs-angle-small-down'></i></a>
                                        <ul class='language-dropdown'>
                                            <li><a href='#top' style='cursor: pointer' onclick=\"ChangeUrl('index.php?cPath=90000&vt=3'); shiftdatax('security.php?vt=3&cPath=90000&cm=1', 'datashiftX')\" target='_self' title='Login'><span style='text-align:left;color:black;font-size:10pt'>Login</span></a></li>
                                            <li><a href='#top' style='cursor: pointer' onclick=\"ChangeUrl('index.php?cPath=90000&vt=4'); shiftdatax('security.php?vt=4&cPath=90000&cm=1', 'datashiftX')\" target='_self' title='Register'><span  style='text-align:left;color:black;font-size:10pt'>Register</span></a></li>
                                        </ul>
                                    </li>";
                                }
                            echo"</ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
            
        <div class='header-middle header-middle-ptb-1 d-none d-lg-block' style='padding-top:5px;padding-bottom:0px'>
            <div class='container'>
                <div class='header-wrap'>

                    <div style='width:250px;padding-right:20px'>
                        <a style='cursor: pointer' href='index.php' target='_self'>
                            <img class='img-responsive' src='media/$clogo' style='margin-top:-9px;max-height:80px;width:100%;background-color:#ffffff;padding:5px;border-radius:5px' alt='$ccompanyname'>
                        </a>
                    </div>

                    <div class='header-right'>
                        <div class='search-style-2' style='padding-bottom:10px;background-color:$bodybc;color:$bodytc'>"; ?>
                            <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
                            <script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.13.2/jquery-ui.min.js"></script>
                            <script>
                                $(document).ready(function(){
                                    $( "#searchbox" ).autocomplete({
                                        source: "",
                                        minLength: 2
                                    });
                                });
                            </script>
                            <script>
                                $(document).ready(function() {
                                    $("#searchbox").autocomplete({
                                        minlength: 2,
                                        source: function(request, response) {
                                            $.ajax({
                                                url: "autocomplete_search.php",
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
                                            $('#searchbox').val(ui.item.label);
                                            $('#itemId').val(ui.item.value);
                                            $("#srcform").submit();
                                        }
                                    });
                                });
                            </script> <?php
                            echo"<form method='get' id='srcform' action='index.php' name='srcform'>
                                <input type=hidden name='cPath' value='9000'>
                                <select class='select' id='itemId' name='catid' style='background-color:$bodybc;color:$bodytc;min-width:170px'><option value='ALL'>All Categories</option>";
                                    $s13 = "select * from sms_link where des1='TOP CATEGORY' and panel='NO' and status='ON' order by sorder asc";
                                    $r13 = $conn->query($s13);
                                    if ($r13->num_rows > 0) { while($rs13 = $r13->fetch_assoc()) {
                                        $t=0;
                                        $s14 = "select * from sms_link where des1='".$rs13["id"]."' order by id asc";
                                        $r14 = $conn->query($s14);
                                        if ($r14->num_rows > 0) { while($rs14 = $r14->fetch_assoc()) { $t=($t+1); } }
                                        $idxx=$rs13["id"];
                                        if($t!=0){
                                            echo"<option value='$idxx'>".$rs13["pam"]."</option>";
                                            $s15 = "select * from sms_link where des1='$idxx' and status='ON' order by sorder asc";
                                            $r15 = $conn->query($s15);
                                            if ($r15->num_rows > 0) { while($rs15 = $r15->fetch_assoc()) {
                                                $idxxx=$rs15["id"];
                                                echo"<option value='$idxxx'>&nbsp;&nbsp;&nbsp;".$rs15["pam"]."</option>";
                                            } }
                                        }else{
                                            echo"<option value='$idxx'>".$rs13["pam"]."</option>";
                                        }
                                    } }
                                echo"</select>
                                <input type='text' name='src' id='searchbox' placeholder='Search for items...' style='background-color:$bodybc;color:$bodytc'>
                            </form>
                            
                        </div>
                        
                        <div class='header-action-right' style='min-width:200px;padding-bottom:20px'>
                            <p style='padding:20px;margin-top:10px'>";
                            if(!isset($userid)){
                                echo"<a href='#top' style='cursor: pointer' onclick=\"ChangeUrl('index.php?cPath=90000&vt=3'); shiftdatax('security.php?vt=3&cPath=90000&cm=1', 'datashiftX')\" target='_self' title='Login'>
                                    <span style='color:$buttontc;font-size:10pt;background-color:$buttonbc;padding-left:20px;padding-right:20px;padding-top:10px;padding-bottom:10px;border-radius:5px'>Login</span>
                                </a>";
                                echo"<a href='#top' style='cursor: pointer' onclick=\"ChangeUrl('index.php?cPath=90000&vt=4'); shiftdatax('security.php?vt=4&cPath=90000&cm=1', 'datashiftX')\" target='_self' title='Register'>
                                    <span style='color:$buttontc;font-size:10pt;background-color:$buttonbc;padding-left:20px;padding-right:20px;padding-top:10px;padding-bottom:10px;border-radius:5px'>Register</span>
                                </a>";
                            }else{
                                if($accounttype=="VENDOR" || $accounttype=="ADMIN"){
                                    echo"<a href='#top' style='cursor: pointer' onclick=\"ChangeUrl('index.php?cPath=90000&vt=10'); shiftdatax('dashboard.php?vt=10&cPath=90000&cm=1', 'datashiftX')\" target='_self' title='Store Page'>
                                        <span style='color:$buttontc;font-size:10pt;background-color:$buttonbc;padding-left:20px;padding-right:20px;padding-top:10px;padding-bottom:10px;border-radius:5px'>Store</span>
                                    </a>";
                                    echo"<a href='#top' style='cursor: pointer' onclick=\"ChangeUrl('index.php?cPath=90000&vt=1'); shiftdatax('dashboard.php?vt=1&cPath=90000&cm=1', 'datashiftX')\" target='_self' title='Seller Dashboard'>
                                        <span style='color:$buttontc;font-size:10pt;background-color:$buttonbc;padding-left:20px;padding-right:20px;padding-top:10px;padding-bottom:10px;border-radius:5px'>Account</span>
                                    </a>";
                                    
                                }
                                if($accounttype=="CUSTOMER"){
                                    echo"<a href='#top' style='cursor: pointer' onclick=\"ChangeUrl('index.php?cPath=90000&vt=2'); shiftdatax('dashboard.php?vt=2&cPath=90000&cm=2', 'datashiftX')\" target='_self' title='Buyer Dashboard'>
                                        <span style='color:$buttontc;font-size:10pt;background-color:$buttonbc;padding-left:20px;padding-right:20px;padding-top:10px;padding-bottom:10px;border-radius:5px'>Account</span>
                                    </a>";
                                    echo"<a href='#top' style='cursor: pointer' onclick=\"ChangeUrl('index.php?cPath=80000'); shiftdatax('order_tracker.php?cPath=80000&cm=1', 'datashiftX')\" target='_self' title='Order Tracker'>
                                        <span style='color:$buttontc;font-size:10pt;background-color:$buttonbc;padding-left:20px;padding-right:20px;padding-top:10px;padding-bottom:10px;border-radius:5px'>Orders</span>
                                    </a>";
                                }
                                    
                            }
                            echo"</p>
                            <p style='color:$bodytc'>
                                <i class='fi-rs-headset' style='color:$buttonbc'></i>
                                <span style='color:$buttonbc'>Hotline</span><br>$cphone
                            </p>
                        </div>

                    </div>
                </div>
            </div>
        </div>
        
        <div class='header-bottom header-bottom-bg-color sticky-bar' style='background-color:$topbc;color:$toptc'>
            <div class='container'>
                <div class='header-wrap header-space-between position-relative'>
                    <div class='logo logo-width-1 d-block d-lg-none'>
                        <a style='cursor: pointer' href='index.php' target='_self'>
                            <img class='img-responsive' src='media/$clogo' style='margin-top:2px;height:30px;background-color:#ffffff;padding:5px;border-radius:5px' alt='$ccompanyname'>
                        </a>
                    </div>
                    <div class='header-nav d-none d-lg-flex' >
                        <div class='main-categori-wrap d-none d-lg-block'>
                            <a class='categori-button-active' href='#' style='color:$toptc;font-size:12pt' onclick='clr_menu1()'>
                                <span class='fi-rs-apps' style='color:lightblue;font-size:16pt;margin-top:2px'></span>&nbsp;&nbsp; CATEGORIES
                            </a>
                            <form name='catmenux' class='categori-dropdown-wrap categori-dropdown-active-large' style='z-index:999;background-color:$bodybc;color:$bodytc'>
                            <div >
                                <ul>";
                                    $catcount=0;
                                    $c1 = "select * from sms_link where des1='TOP CATEGORY' and panel='NO' and status='ON' order by sorder asc";
                                    $c11 = $conn->query($c1);
                                    if ($c11->num_rows > 0) { while($c111 = $c11->fetch_assoc()) {
                                        $catcount=($catcount+1);
                                        if($catcount>=11) echo"<li><ul class='more_slide_open' style='display: none;'>";
                                            $t=0;
                                            $c2 = "select * from sms_link where des1='".$c111["id"]."' order by id asc";
                                            $c22 = $conn->query($c2);
                                            if ($c22->num_rows > 0) { while($c222 = $c22->fetch_assoc()) { $t=($t+1); } }
                                            $idxx=$c111["id"];
                                            if($t!=0){
                                                echo"<li onmouseup='clr_menu0()' class='has-children'>
                                                    <a href='#top' style='cursor: pointer' onclick=\"ChangeUrl('index.php?cPath=4&catid=$idxx'); shiftdatax('pd.php?cPath=4&catid=$idxx&cm=1', 'datashiftX')\" target='_self'>
                                                        <i class='fa ".$c111["icon"]."' style='color:$bodytc;font-size:12pt;margin-top:2px'></i>&nbsp;&nbsp;".$c111["pam"]."</span>
                                                    </a>
                                                    <div class='dropdown-menu' style='background-color:$bodybc'>
                                                        <ul class='mega-menu d-lg-flex'>
                                                            <li onmouseup='clr_menu0()' class='mega-menu-col col-lg-12'>
                                                                <ul class='d-lg-flex row'>";
                                                                    $c2 = "select * from sms_link where des1='$idxx' and status='ON' order by sorder asc";
                                                                    $c22 = $conn->query($c2);
                                                                    if ($c22->num_rows > 0) { while($c222 = $c22->fetch_assoc()) {
                                                                        $idxxx=$c222["id"];
                                                                        echo"<li class='mega-menu-col col-lg-4'>
                                                                            <ul>
                                                                                <li><a href='#top' style='cursor: pointer' onclick=\"ChangeUrl('index.php?cPath=4&catid=$idxxx'); shiftdatax('pd.php?cPath=4&catid=$idxxx&cm=1', 'datashiftX')\" target='_self'>
                                                                                    <span style='color:$bodytc;font-size:10pt'>".$c222["pam"]."</span>
                                                                                </a></li>";
                                                                                $c3 = "select * from sms_link where des1='$idxxx' order by sorder asc";
                                                                                $c33 = $conn->query($c3);
                                                                                if ($c33->num_rows > 0) { while($c333 = $c33->fetch_assoc()) {
                                                                                    $idxxxx=$c333["id"];
                                                                                    echo"<li>
                                                                                        <a href='#top' class='dropdown-item nav-link nav_item' style='cursor: pointer' onclick=\"ChangeUrl('index.php?cPath=4&catid=$idxxxx'); shiftdatax('pd.php?cPath=4&catid=$idxxxx&cm=1', 'datashiftX')\" target='_self'>
                                                                                            <span style='padding-left:10px;color:$buttonbc;font-size:8pt'>".$c333["pam"]."</span>
                                                                                        </a>
                                                                                    </li>";
                                                                                } }
                                                                            echo"</ul>
                                                                        </li>";
                                                                    } }
                                                                echo"</ul>
                                                            </li>";
                                                
                                                            // category wise banner
                                                            /*
                                                            echo"<li onmouseup='clr_menu0()' class='mega-menu-col col-lg-4'>
                                                                <div class='header-banner2'>
                                                                    <img src='assets/imgs/banner/menu-banner-2.jpg' alt='menu_banner1'>
                                                                    <div class='banne_info'><h6>10% Off</h6><h4>New Arrival</h4><a href='#'>Shop now</a></div>
                                                                </div>
                                                                <div class='header-banner2'>
                                                                    <img src='assets/imgs/banner/menu-banner-3.jpg' alt='menu_banner2'>
                                                                    <div class='banne_info'><h6>15% Off</h6><h4>Hot Deals</h4><a href='#'>Shop now</a></div>
                                                                </div>
                                                            </li>";
                                                            */
                                                        echo"</ul>
                                                    </div>
                                                </li>";
                                            }else{
                                                echo"<li onmouseup='clr_menu0()' ><a href='#top' style='cursor: pointer' onclick=\"ChangeUrl('index.php?cPath=4&catid=$idxx'); shiftdatax('pd.php?cPath=4&catid=$idxx&cm=1', 'datashiftX')\" target='_self'>
                                                    <span style='color:$bodytc;font-size:10pt'>
                                                    <i class='fa ".$c111["icon"]."' style='color:$bodytc;font-size:12pt;margin-top:2px'></i>&nbsp;&nbsp;".$c111["pam"]."</span>
                                                </a></li>";
                                            }
                                        
                                        if($catcount>=11) echo"</ul></li>";
                                    } }
                                    
                                echo"</ul>
                                <div class='more_categories' style='cursor: pointer;color:$bodytc;font-size:10pt'>Show more...</div>
                            </div>
                            </form>
                        </div>

                        <div class='main-menu main-menu-padding-1 main-menu-lh-2 d-none d-lg-block'>
                            <nav>
                                <ul>";
                                    $c7 = "select * from sms_link where des1='TOP CATEGORY' and panel='YES' and status='ON' order by sorder asc limit 3";
                                    $c77 = $conn->query($c7);
                                    if ($c77->num_rows > 0) { while($c777 = $c77->fetch_assoc()) {
                                        $idxx=$c777["id"];
                                        $t=0;
                                        $c8 = "select * from sms_link where des1='".$c777["id"]."' order by id asc";
                                        $c88 = $conn->query($c8);
                                        if ($c88->num_rows > 0) { while($c888 = $c88->fetch_assoc()) { $t=($t+1); } }
                                        if($t!=0){
                                            echo"<li class='position-static'><a style='cursor: pointer' onclick=\"ChangeUrl('index.php?cPath=4&catid=$idxx'); shiftdatax('pd.php?cPath=4&catid=$idxx&cm=1', 'datashiftX')\" target='_self'><span style='color:$toptc;font-size:10pt'>".$c777["pam"]." <i class='fi-rs-angle-down'></i></span></a>";
                                                if($c777["megamenu"]==1) echo"<ul class='mega-menu' style='background-color:$bodybc;color:$bodytc'>";
                                                else echo"<ul class='sub-menu' style='background-color:$bodybc;color:$bodytc'>";
                                                    $c8 = "select * from sms_link where des1='$idxx' and status='ON' order by sorder asc";
                                                    $c88 = $conn->query($c8);
                                                    if ($c88->num_rows > 0) { while($c888 = $c88->fetch_assoc()) {
                                                        $idxxx=$c888["id"];
                                                        $t1=0;
                                                        $c9 = "select * from sms_link where des1='".$c888["id"]."' order by id asc";
                                                        $c99 = $conn->query($c9);
                                                        if ($c99->num_rows > 0) { while($c999 = $c99->fetch_assoc()) { $t1=($t1+1); } }
                                                        if($t1!=0){
                                                            if($c777["megamenu"]==1){
                                                                echo"<li class='sub-mega-menu sub-mega-menu-width-25' style='width:25%;padding-bottom:20px'>
                                                                    <a href='#top' class='menu-title' style='cursor: pointer' onclick=\"ChangeUrl('index.php?cPath=4&catid=$idxxx'); shiftdatax('pd.php?cPath=4&catid=$idxxx&cm=1', 'datashiftX')\" target='_self'><span style='color:$buttonbc;font-size:10pt'><i class='evara-font-".$c888["icon"]."'></i> ".$c888["pam"]." <i class='fi-rs-angle-right'></i></span></a>
                                                                    <ul>";
                                                                        $c9 = "select * from sms_link where des1='".$c888["id"]."' order by sorder asc";
                                                                        $c99 = $conn->query($c9);
                                                                        if ($c99->num_rows > 0) { while($c999 = $c99->fetch_assoc()) {
                                                                            $idxxxx=$c999["id"];
                                                                            echo"<li><a href='#top' style='cursor: pointer' onclick=\"ChangeUrl('index.php?cPath=4&catid=$idxxxx'); shiftdatax('pd.php?cPath=4&catid=$idxxxx&cm=1', 'datashiftX')\" target='_self'><span style='color:$bodytc;font-size:8pt'>".$c999["pam"]."</span></a>";
                                                                        } }
                                                                    echo"</ul>
                                                                </li>";
                                                            }else{
                                                                echo"<li>
                                                                    <a href='#top' style='cursor: pointer' onclick=\"ChangeUrl('index.php?cPath=4&catid=$idxxx'); shiftdatax('pd.php?cPath=4&catid=$idxxx&cm=1', 'datashiftX')\" target='_self'><span style='color:$bodytc;font-size:10pt'>".$c888["pam"]." <i class='fi-rs-angle-right'></i></span></a>
                                                                    <ul class='level-menu'>";
                                                                        $c9 = "select * from sms_link where des1='".$c888["id"]."' order by id asc";
                                                                        $c99 = $conn->query($c9);
                                                                        if ($c99->num_rows > 0) { while($c999 = $c99->fetch_assoc()) {
                                                                            $idxxxx=$c999["id"];
                                                                            echo"<li><a href='#top' style='cursor: pointer' onclick=\"ChangeUrl('index.php?cPath=4&catid=$idxxxx'); shiftdatax('pd.php?cPath=4&catid=$idxxxx&cm=1', 'datashiftX')\" target='_self'><span style='color:$bodytc;font-size:10pt'>".$c999["pam"]."</span></a>";
                                                                        } }
                                                                    echo"</ul>
                                                                </li>";
                                                            }
                                                        }else{
                                                            if($c777["megamenu"]==1) echo"<li href='#top' class='sub-mega-menu sub-mega-menu-width-25' style='width:25%;padding-bottom:20px'><a style='cursor: pointer' onclick=\"ChangeUrl('index.php?cPath=4&catid=$idxxx'); shiftdata('$idxxx', 'datashiftX')\" target='_self'><span style='color:$buttonbc;font-size:10pt'><i class='evara-font-".$c888["icon"]."'></i> ".$c888["pam"]."</span></a></li>";
                                                            else echo"<li><a href='#top' style='cursor: pointer' onclick=\"ChangeUrl('index.php?cPath=4&catid=$idxxx'); shiftdata('$idxxx', 'datashiftX')\" target='_self'><span style='color:$bodytc;font-size:10pt'>".$c888["pam"]."</span></a></li>";
                                                        }
                                                    } }
                                                echo"</ul>
                                            </li>";
                                        }else{
                                            if($c777["pam"]=="Flash Sale") echo"<li><a href='#top' style='cursor: pointer' onclick=\"ChangeUrl('index.php?cPath=4&catid=$idxx'); shiftdatax('pd.php?cPath=4&catid=$idxx&cm=1', 'datashiftX')\" target='_self'><span class='blink' style='color:$toptc;font-size:10pt'>".$c777["pam"]."</span></a></li>";
                                            else echo"<li><a href='#top' style='cursor: pointer' onclick=\"ChangeUrl('index.php?cPath=4&catid=$idxx'); shiftdatax('pd.php?cPath=4&catid=$idxx&cm=1', 'datashiftX')\" target='_self'><span style='color:$toptc;font-size:10pt'>".$c777["pam"]."</span></a></li>";
                                        }
                                    } }
                                        
                                    /*
                                     // mega menu banner. for letter use
                                     echo"<li class='sub-mega-menu sub-mega-menu-width-34'>
                                                <div class='menu-banner-wrap'>
                                                    <a href='shop-product-right.html'><img src='assets/imgs/banner/menu-banner.jpg' alt='Evara'></a>
                                                    <div class='menu-banner-content'>
                                                        <h4>Hot deals</h4>
                                                        <h3>Don't miss<br> Trending</h3>
                                                        <div class='menu-banner-price'>
                                                            <span class='new-price text-success'>Save to 50%</span>
                                                        </div>
                                                        <div class='menu-banner-btn'>
                                                            <a href='shop-product-right.html'>Shop now</a>
                                                        </div>
                                                    </div>
                                                    <div class='menu-banner-discount'>
                                                        <h3>
                                                            <span>35%</span>
                                                            off
                                                        </h3>
                                                    </div>
                                                </div>
                                            </li>
                                        </ul>
                                    </li>
                                    */
                                    echo"<li><a href='#'><span style='color:$toptc;font-size:10pt'>Blog <i class='fi-rs-angle-down'></i></span></a>
                                        <ul class='sub-menu' style='background-color:$bodybc'>";
                                            $c10 = "select * from sms_link where des1='TOP BLOG CATEGORY' and status='ON' order by sorder asc";
                                            $c11 = $conn->query($c10);
                                            if ($c11->num_rows > 0) { while($c12 = $c11->fetch_assoc()) {
                                                $idxx=$c12["id"];
                                                $t=0;
                                                $c13 = "select * from sms_link where des1='".$c12["id"]."' order by id asc";
                                                $c14 = $conn->query($c13);
                                                if ($c14->num_rows > 0) { while($c15 = $c14->fetch_assoc()) { $t=($t+1); } }
                                                
                                                if($t!=0){
                                                    echo"<li>
                                                        <a href='#top' style='cursor: pointer' onclick=\"ChangeUrl('index.php?cPath=7000&bcid=".$c12["id"]."'); shiftdatax('blog.php?cPath=7000&bcid=".$c12["id"]."&cm=1', 'datashiftX')\" target='_self' title='".$c12["pam"]."' target='_self' style='color:$bodytc'>
                                                            <span style='color:$bodytc;font-size:10pt'>".$c12["pam"]." <i class='fi-rs-angle-right'></i></span>
                                                        </a>
                                                        <ul class='level-menu level-menu-modify' style='background-color:$bodybc'>";
                                                            $c13 = "select * from sms_link where des1='$idxx' and status='ON' order by sorder asc";
                                                            $c14 = $conn->query($c13);
                                                            if ($c14->num_rows > 0) { while($c15 = $c14->fetch_assoc()) {
                                                                $idxxx=$c15["id"];
                                                                echo"<li><a href='#top' style='cursor: pointer' onclick=\"ChangeUrl('index.php?cPath=7000&bcid=".$c12["id"]."'); shiftdatax('blog.php?cPath=7000&bcid=".$c12["id"]."&cm=1', 'datashiftX')\" target='_self' title='".$c12["pam"]."' target='_self' style='color:$bodytc'>
                                                                    <span style='color:$bodytc;font-size:10pt'>".$c15["pam"]."</span>
                                                                </a></li>";
                                                            } }
                                                        echo"</ul>
                                                    </li>";
                                                }else{
                                                    echo"<li><a href='#top' style='cursor: pointer' onclick=\"ChangeUrl('index.php?cPath=7000&bcid=".$c12["id"]."'); shiftdatax('blog.php?cPath=7000&bcid=".$c12["id"]."&cm=1', 'datashiftX')\" target='_self' title='".$c12["pam"]."' target='_self' style='color:$bodytc'>
                                                        <span style='color:$bodytc;font-size:10pt'>".$c12["pam"]."</span>
                                                    </a></li>";
                                                }
                                            } }
                                        echo"</ul>
                                    </li>

                                    <li><a href='#'><span style='color:$toptc;font-size:10pt'>Promo <i class='fi-rs-angle-down'></i></span></a>
                                        <ul class='sub-menu' style='background-color:$bodybc'>";
                                            $c16 = "select * from sms_link where des1='TOP PROMO CATEGORY' and status='ON' order by sorder asc";
                                            $c17 = $conn->query($c16);
                                            if ($c17->num_rows > 0) { while($c18 = $c17->fetch_assoc()) {
                                                $idxx=$c18["id"];
                                                $t=0;
                                                $c19 = "select * from sms_link where des1='".$c18["id"]."' order by id asc";
                                                $c20 = $conn->query($c19);
                                                if ($c20->num_rows > 0) { while($c21 = $c20->fetch_assoc()) { $t=($t+1); } }
                                                if($t!=0){
                                                    echo"<li><a href='#top' style='cursor: pointer' onclick=\"ChangeUrl('index.php?cPath=7001&pcid=".$c18["id"]."'); shiftdatax('promo.php?cPath=7001&pcid=".$c18["id"]."&cm=1', 'datashiftX')\" target='_self' title='".$c18["pam"]."'><span style='color:$bodytc;font-size:10pt'>".$c18["pam"]." <i class='fi-rs-angle-right'></i></span></a>
                                                        <ul class='level-menu level-menu-modify' style='background-color:$bodybc'>";
                                                            $c19 = "select * from sms_link where des1='$idxx' and status='ON' order by sorder asc";
                                                            $c20 = $conn->query($c19);
                                                            if ($c20->num_rows > 0) { while($c21 = $c20->fetch_assoc()) {
                                                                $idxxx=$c21["id"];
                                                                echo"<li><a href='#top' style='cursor: pointer' onclick=\"ChangeUrl('index.php?cPath=7001&pcid=".$c21["id"]."'); shiftdatax('promo.php?cPath=7001&pcid=".$c21["id"]."&cm=1', 'datashiftX')\" target='_self' title='".$c21["pam"]."'><span style='color:$bodytc;font-size:10pt'>".$c21["pam"]."</span></a></li>";
                                                            } }
                                                        echo"</ul>
                                                    </li>";
                                                }else{
                                                    echo"<li><a href='#top' style='cursor: pointer' onclick=\"ChangeUrl('index.php?cPath=7001&pcid=".$c18["id"]."'); shiftdatax('promo.php?cPath=7001&pcid=".$c18["id"]."&cm=1', 'datashiftX')\" target='_self' title='".$c18["pam"]."'><span style='color:$bodytc;font-size:10pt'>".$c18["pam"]."</span></a></li>";
                                                }
                                            } }
                                        echo"</ul>
                                    </li>
                                    
                                    <li><a href='#top' style='cursor: pointer' onclick=\"ChangeUrl('index.php?cPath=80000&lid=6'); shiftdatax('item_request.php?cm=1', 'datashiftX')\" target='_self' title='Request and Item'><span style='color:$toptc;font-size:10pt'>Request Item</span></a></li>";
                                    if(!isset($userid)){
                                        echo"<li><a href='#top' style='cursor: pointer' onclick=\"ChangeUrl('index.php?cPath=90000&vt=5'); shiftdatax('security.php?vt=5&cPath=90000&cm=1', 'datashiftX')\" target='_self' title='Become A Seller'>
                                            <span style='color:$buttontc;font-size:10pt;background-color:orange;padding-left:20px;padding-right:20px;padding-top:10px;padding-bottom:10px;border-radius:5px'>Become Seller</span>
                                        </a></li>";
                                    }
                                echo"</ul>
                            </nav>
                        </div>                        
                    </div>
                    
                    <div class='header-action-right' style='min-width:160px'>
                        <div class='header-action-2'>
                            <div class='header-action-icon-2'>
                                <a href='#top' style='cursor: pointer' onclick=\"ChangeUrl('index.php?cPath=80000&lid=1'); shiftdatax('product_compare.php?cm=1', 'datashiftX')\" target='_self' title='Compare Product'>
                                    <i class='fi-rs-shuffle' style='color:$toptc'></i>
                                    <span style='position:absolute;border-radius:50%;background-color:orange;color:white;text-align:center;height:20px;width:20px;margin-top:-8px;margin-left:-10px;font-size:8pt'>
                                        <p style='margin-top:-1px;color:white;font-size:10pt' class='minicart-number count-total-shopping absolute' id='comparediv'>0</p>
                                    </span>
                                </a>
                            </div>
                            <div class='header-action-icon-2'>
                                <a href='#top' style='cursor: pointer' onclick=\"ChangeUrl('index.php?cPath=80000&lid=2'); shiftdatax('product_favourite.php?cm=1', 'datashiftX')\" target='_self' title='Favourite Product'>
                                    <i class='fi-rs-heart' style='color:$toptc'></i>
                                    <span style='position:absolute;border-radius:50%;background-color:red;color:white;text-align:center;height:20px;width:20px;margin-top:-8px;margin-left:-10px;font-size:8pt'>
                                        <p style='margin-top:-1px;color:white;font-size:10pt' class='minicart-number count-total-shopping absolute' id='favouritediv'>0</p>
                                    </span>
                                </a>
                            </div>
                            <div class='header-action-icon-2'>
                                <a href='#top' style='cursor: pointer' onclick=\"ChangeUrl('index.php?cPath=80000&lid=3'); shiftdatax('product_cart.php?cm=1', 'datashiftX')\" target='_self' title='Shopping Cart'>
                                    <i class='fi-rs-shopping-bag' style='color:$toptc'></i>
                                    <span style='position:absolute;border-radius:50%;background-color:$bodybc;color:$bodytc;text-align:center;height:20px;width:20px;margin-top:-8px;margin-left:-10px;font-size:8pt'>
                                        <p style='margin-top:-1px;color:$bodytc;font-size:10pt' class='minicart-number count-total-shopping absolute' id='cartdiv'>0</p>
                                    </span>
                                </a>
                                <div class='cart-dropdown-wrap cart-dropdown-hm2' style='background-color:$bodybc;color:$bodytc'>
                                    <p id='cartcontainer1'></p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class='header-action-right d-block d-lg-none' style='width:50px'>
                        <div class='header-action-2'>
                            <div class='header-action-icon-2 d-block d-lg-none'>
                                    
                            <div class='burger-icon burger-icon-white'>
                                    <i class='fa fa-bars' style='color:$toptc;font-size:22pt;margin-top:-10px'></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header>";
    
    include("mobile.php");
?>
