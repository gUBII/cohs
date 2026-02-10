<?php
    echo"<div class='mobile-header-active mobile-header-wrapper-style'>
        <div class='mobile-header-wrapper-inner'>
            <div class='mobile-header-top'>
                <div class='mobile-header-logo'><a href='index.php'><img src='media/$clogo' alt='$ccompanyname' style='position:absolute;width:180px;margin-top:-18px'></a></div>
                <div class='mobile-menu-close close-style-wrap close-style-position-inherit'>
                    <button class='close-style search-close'><i class='icon-top'></i><i class='icon-bottom'></i></button>
                </div>
            </div>
            <div class='mobile-header-content-area'>
                <div class='mobile-search search-style-3 mobile-header-border'>
                    <form method='get' action='index.php' name=srcform><input type=hidden name='cPath' value='9000'>"; ?>
                        <script>
                            $(document).ready(function(){
                                $( "#searchboxmobile" ).autocomplete({
                                    source: "",
                                    minLength: 2
                                });
                            });
                            
                            $(document).ready(function() {
                                $("#searchboxmobile").autocomplete({
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
                                        $('#searchboxmobile').val(ui.item.label);
                                    }
                                });
                            });
                        </script> <?php                        
                        echo"<input type='text' id='searchboxmobile' placeholder='Search for items…'><button type='submit'><i class='fi-rs-search'></i></button>";

                    echo"</form>
                </div><hr>
                <div class='mobile-menu-wrap mobile-header-border mobile-menu-close'>";
                    // <span class='fi-rs-apps'></span> <span style='font-size:15pt'>&nbsp;&nbsp;Categories</span>
                    echo"<nav>
                        <ul class='mobile-menu'>";
                            $c1 = "select * from sms_link where des1='TOP CATEGORY' and panel='NO' and status='ON' order by sorder asc";
                            $c11 = $conn->query($c1);
                            if ($c11->num_rows > 0) { while($c111 = $c11->fetch_assoc()) {
                                $idxx=$c111["id"];
                                $t=0;
                                $c2 = "select * from sms_link where des1='".$c111["id"]."' order by id asc";
                                $c22 = $conn->query($c2);
                                if ($c22->num_rows > 0) { while($c222 = $c22->fetch_assoc()) { $t=($t+1); } }
                                if($t!=0){
                                    echo"<li class='menu-item-has-children'><span class='menu-expand'></span>
                                       <a href='#top' class='dropdown-item nav-link nav_item' style='cursor: pointer' onclick=\"ChangeUrl('index.php?cPath=4&catid=$idxx'); shiftdatax('pd.php?cPath=4&catid=$idxx&cm=1', 'datashiftX')\" target='_self'>
                                            <span style='color:black;font-size:10pt'><i class='fa ".$c111["icon"]."' style='color:$bodytc;font-size:12pt;margin-top:2px'></i>".$c111["pam"]."</span>
                                        </a>
                                        <ul class='dropdown'>";
                                            $c2 = "select * from sms_link where des1='$idxx' and status='ON' order by sorder asc";
                                            $c22 = $conn->query($c2);
                                            if ($c22->num_rows > 0) { while($c222 = $c22->fetch_assoc()) {
                                                $idxxx=$c222["id"];
                                                $t1=0;
                                                $c3 = "select * from sms_link where des1='".$c222["id"]."' order by sorder asc";
                                                $c33 = $conn->query($c3);
                                                if ($c33->num_rows > 0) { while($c333 = $c33->fetch_assoc()) { $t1=($t1+1); } }
                                                if($t1!=0){
                                                    echo"<li class='menu-item-has-children'><span class='menu-expand'></span>
                                                        <a href='#top' class='dropdown-item nav-link nav_item' style='cursor: pointer' onclick=\"ChangeUrl('index.php?cPath=4&catid=$idxxx'); shiftdatax('pd.php?cPath=4&catid=$idxxx&cm=1', 'datashiftX')\" target='_self'>
                                                            <span style='color:black;font-size:10pt'>
                                                                <i class='fa ".$c222["icon"]."' style='color:$bodytc;font-size:10pt;margin-top:2px'></i> ".$c222["pam"]."
                                                            </span>
                                                        </a>
                                                        <ul class='dropdown'>";
                                                            $c3 = "select * from sms_link where des1='$idxxx' order by sorder asc";
                                                            $c33 = $conn->query($c3);
                                                            if ($c33->num_rows > 0) { while($c333 = $c33->fetch_assoc()) {
                                                                $idxxxx=$c333["id"];
                                                                echo"<li>
                                                                    <a href='#top' class='dropdown-item nav-link nav_item' style='cursor: pointer' onclick=\"ChangeUrl('index.php?cPath=4&catid=$idxxxx'); shiftdatax('pd.php?cPath=4&catid=$idxxxx&cm=1', 'datashiftX')\" target='_self'>
                                                                        <span style='padding-left:30px;color:black;font-size:10pt'>
                                                                            <i class='fa ".$c333["icon"]."' style='color:$bodytc;font-size:12pt;margin-top:2px'></i>".$c333["pam"]."
                                                                        </span>
                                                                    </a>
                                                                </li>";
                                                            } }
                                                        echo"</ul>
                                                    </li>";
                                                }else{
                                                    echo"<li><a href='#top' style='cursor: pointer' onclick=\"ChangeUrl('index.php?cPath=4&catid=$idxxx'); shiftdata('$idxxx', 'datashiftX')\" target='_self'>                                                    
                                                        <span style='color:black;font-size:10pt'>&nbsp;&nbsp;&nbsp;&nbsp;
                                                            <i class='fa ".$c222["icon"]."' style='color:$bodytc;font-size:10pt;margin-top:2px'></i> ".$c222["pam"]."
                                                        </span>
                                                    </a></li>";
                                                }
                                            } }
                                        echo"</ul>
                                    </li>";
                                }else{
                                    echo"<li>
                                        <a href='#top' class='dropdown-item nav-link nav_item' style='cursor: pointer' onclick=\"ChangeUrl('index.php?cPath=4&catid=$idxx'); shiftdatax('pd.php?cPath=4&catid=$idxx&cm=1', 'datashiftX')\" target='_self'>
                                        <span style='color:black;font-size:10pt'>
                                            <i class='fa ".$c111["icon"]."' style='color:$bodytc;font-size:10pt;margin-top:2px'></i>".$c111["pam"]."
                                        </span>
                                    </a></li>";
                                }
                            } }

                            echo"<hr>";

                            $c1x = "select * from sms_link where des1='TOP CATEGORY' and panel='YES' and status='ON' order by sorder asc";
                            $c11x = $conn->query($c1x);
                            if ($c11x->num_rows > 0) { while($c111x = $c11x->fetch_assoc()) {
                                $idxxa=$c111x["id"];
                                $tx=0;
                                $c2x = "select * from sms_link where des1='".$c111x["id"]."' order by id asc";
                                $c22x = $conn->query($c2x);
                                if ($c22x->num_rows > 0) { while($c222x = $c22x->fetch_assoc()) { $tx=($tx+1); } }
                                if($tx!=0){
                                    echo"<li class='menu-item-has-children'><span class='menu-expand'></span>
                                        <a href='#top' class='dropdown-item nav-link nav_item' style='cursor: pointer' onclick=\"ChangeUrl('index.php?cPath=4&catid=$idxxa'); shiftdatax('pd.php?cPath=4&catid=$idxxa&cm=1', 'datashiftX')\" target='_self'>
                                            <span style='color:black;font-size:10pt'><i class='fa ".$c111x["icon"]."' style='color:$bodytc;font-size:12pt;margin-top:2px'></i>".$c111x["pam"]."</span>
                                        </a>
                                        <ul class='dropdown'>";
                                            $c2x = "select * from sms_link where des1='$idxxa' and status='ON' order by sorder asc";
                                            $c22x = $conn->query($c2x);
                                            if ($c22x->num_rows > 0) { while($c222x = $c22x->fetch_assoc()) {
                                                $idxxxa=$c222x["id"];
                                                $t1x=0;
                                                $c3x = "select * from sms_link where des1='".$c222x["id"]."' order by sorder asc";
                                                $c33x = $conn->query($c3x);
                                                if ($c33x->num_rows > 0) { while($c333x = $c33x->fetch_assoc()) { $t1x=($t1x+1); } }
                                                if($t1x!=0){
                                                    echo"<li class='menu-item-has-children'><span class='menu-expand'></span>
                                                        <a href='#top' class='dropdown-item nav-link nav_item' style='cursor: pointer' onclick=\"ChangeUrl('index.php?cPath=4&catid=$idxxxa'); shiftdatax('pd.php?cPath=4&catid=$idxxxa&cm=1', 'datashiftX')\" target='_self'>
                                                            <span style='color:black;font-size:10pt'><i class='evara-font-".$c222x["icon"]."' style='font-size:10pt;color:black'></i> ".$c222x["pam"]."</span>
                                                        </a>
                                                        <ul class='dropdown'>";
                                                            $c3x = "select * from sms_link where des1='$idxxx' order by sorder asc";
                                                            $c33x = $conn->query($c3x);
                                                            if ($c33x->num_rows > 0) { while($c333x = $c33x->fetch_assoc()) {
                                                                $idxxxxa=$c333x["id"];
                                                                echo"<li>
                                                                    <a href='#top' class='dropdown-item nav-link nav_item' style='cursor: pointer' onclick=\"ChangeUrl('index.php?cPath=4&catid=$idxxxxa'); shiftdatax('pd.php?cPath=4&catid=$idxxxxa&cm=1', 'datashiftX')\" target='_self'>
                                                                        <span style='padding-left:30px;color:black;font-size:10pt'>".$c333x["pam"]."</span>
                                                                    </a>
                                                                </li>";
                                                            } }
                                                        echo"</ul>
                                                    </li>";
                                                }else{
                                                    echo"<li><a href='#top' class='dropdown-item nav-link nav_item' style='cursor: pointer' onclick=\"ChangeUrl('index.php?cPath=4&catid=$idxxa'); shiftdatax('pd.php?cPath=4&catid=$idxxa&cm=1', 'datashiftX')\" target='_self'>
                                                        <span style='color:black;font-size:10pt'><i class='evara-font-".$c222x["icon"]."' style='font-size:10pt;color:black'></i> ".$c222x["pam"]."</span>
                                                    </a></li>";
                                                }
                                            } }
                                        echo"</ul>
                                    </li>";
                                }else{
                                    echo"<li><a href='#top' class='dropdown-item nav-link nav_item' style='cursor: pointer' onclick=\"ChangeUrl('index.php?cPath=4&catid=$idxxa'); shiftdatax('pd.php?cPath=4&catid=$idxxa&cm=1', 'datashiftX')\" target='_self'>
                                        <span style='color:black;font-size:10pt'><i class='fa ".$c111x["icon"]."' style='color:$bodytc;font-size:12pt;margin-top:2px'></i>".$c111x["pam"]."</span>
                                    </a></li>";
                                }
                            } }
                        echo"</ul>
                    </nav>
                </div>
                <hr>
                <div class='mobile-social-icon'>
                    <h5 class='mb-15 text-grey-4'>Follow Us</h5>
                    <a href='$facebooklink'><img src='assets/imgs/theme/icons/icon-facebook.svg' alt='$facebooklink'></a>
                    <a href='$twitterlink'><img src='assets/imgs/theme/icons/icon-twitter.svg' alt='$twitterlink'></a>
                    <a href='$instagramlink'><img src='assets/imgs/theme/icons/icon-instagram.svg' alt='$instagramlink'></a>
                    <a href='$pinterestlink'><img src='assets/imgs/theme/icons/icon-pinterest.svg' alt='$pinterestlink'></a>
                    <a href='$youtubelink'><img src='assets/imgs/theme/icons/icon-youtube.svg' alt='$youtubelink'></a>
                </div>
            </div>
        </div>
    </div>";
?>
