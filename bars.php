<?php
echo"<div id='nav' class='nav-container d-flex' >
    <div class='nav-content d-flex'>
        <div class='row'>
            <div class='col-5 col-sm-12 col-xs-12 col-md-5 col-lg-5 col-xl-5' style='text-align:right'>
                <div class='user-container d-flex'>
                    <a href='#' class='d-flex user position-relative' data-bs-toggle='dropdown' aria-haspopup='true' aria-expanded='false'>
                        <img class='profile' alt='profile' src='img/profile/profile-9.webp' style='margin-left:30px' />
                    </a>                    
                    <div class='dropdown-menu dropdown-menu-end user-menu wide'>";
                        $m1x = "select * from menu where parent='0' and status='1' and profile='1' order by 'order' asc";
                        $m11x = $conn->query($m1x);
                        if ($m11x->num_rows > 0) { while($m111x = $m11x->fetch_assoc()) {
                            echo"<div class='row mb-3 ms-0 me-0'>";
                                $tt=0;
                                $m1a = "select * from menu where parent='".$m111x["id"]."' and status='1' order by 'order' asc";
                                $m11a = $conn->query($m1a);
                                if ($m11a->num_rows > 0) { while($m111a = $m11a->fetch_assoc()) { $tt=($tt+1); } }
                                $ttx=0;
                                $ttx=round ($tt/2);
                                $tty=0;
                                $tty=($tt-$ttx);
                                echo"<div class='col-12 ps-1 mb-2'><div class='text-extra-small text-primary'>".$m111x["name"]." ($tt)</div></div>
                                <div class='col-6 ps-1 pe-1'><ul class='list-unstyled'>";
                                    $lastid=0;
                                    $m1b = "select * from menu where parent='".$m111x["id"]."' and status='1' order by 'id' asc limit $ttx";
                                    $m11b = $conn->query($m1b);
                                    if ($m11b->num_rows > 0) { while($m111b = $m11b->fetch_assoc()) {
                                        echo"<li><i data-acorn-icon='arrow-double-right' class='me-2' data-acorn-size='10'></i><a href='".$m111b["name"].".php'><span class='label'>".$m111b["name"]."</span></a></li>";
                                        $lastid=$m111b["id"];
                                    } }
                                echo"</ul></div>
                                <div class='col-6 pe-1 ps-1'><ul class='list-unstyled'>";
                                    $m1c = "select * from menu where parent='".$m111x["id"]."' and status='1' and id>'$lastid' order by 'id' asc";
                                    $m11c = $conn->query($m1c);
                                    if ($m11c->num_rows > 0) { while($m111c = $m11c->fetch_assoc()) {
                                        echo"<li><i data-acorn-icon='arrow-double-right' class='me-2' data-acorn-size='10'></i><a href='".$m111c["name"].".php'><span class='label'>".$m111c["name"]."</span></a></li>";
                                    } }
                                echo"</ul></div>
                            </div>";
                        } }
                        
                    echo"</div>
                </div>
            </div>
            <div class='col-7 col-sm-12 col-xs-12 col-md-7 col-lg-7 col-xl-7 list-unstyled list-inline text-left menu-icons' style='padding:0px'>
                <div class='row'>
                    <div class='col-12' style='text-align:left;height:25px;margin-left:-10px'>
                        <h4>Lisa Jackson</h2>
                    </div><div class='col-12' style='text-align:left;margin-top:-25px;'>
                        <ul class='list-unstyled list-inline text-left menu-icons' style='width:140px'>
                            <li class='list-inline-item'><a href='#' data-bs-toggle='modal' data-bs-target='#searchPagesModal'><i data-acorn-icon='search' data-acorn-size='18'></i></a></li>
                            <li class='list-inline-item'><a href='#' id='pinButton' class='pin-button'>
                                <i data-acorn-icon='lock-on' class='unpin' data-acorn-size='18'></i>
                                <i data-acorn-icon='lock-off' class='pin' data-acorn-size='18'></i>
                            </a></li>
                            <li class='list-inline-item'><a href='#' id='colorButton'>
                                <i data-acorn-icon='light-on' class='light' data-acorn-size='18'></i>
                                <i data-acorn-icon='light-off' class='dark' data-acorn-size='18'></i>
                            </a></li>
                            <li class='list-inline-item'>
                                <a href='#' data-bs-toggle='dropdown' data-bs-target='#notifications' aria-haspopup='true' aria-expanded='false' class='notification-button'>
                                    <div class='position-relative d-inline-flex'><i data-acorn-icon='bell' data-acorn-size='18'></i><span class='position-absolute notification-dot rounded-xl'></span></div>
                                </a>
                                <div class='dropdown-menu dropdown-menu-end wide notification-dropdown scroll-out' id='notifications'>
                                    <div class='scroll'>
                                        <ul class='list-unstyled border-last-none'>";
                                            $n1 = "select * from notification where employeeid='".$_COOKIE["userid"]."' and status='1' order by 'id' desc";
                                            $n11 = $connx->query($n1);
                                            if ($n11->num_rows > 0) { while($n111 = $n11->fetch_assoc()) {
                                                $simage="img/default.jpg";
                                                $n1a = "select * from uerp_user where id='".$n111["employeeid"]."' and status='1' order by 'date' asc limit 5";
                                                $n11a = $connx->query($n1a);
                                                if ($n11a->num_rows > 0) { while($n111a = $n11a->fetch_assoc()) {
                                                    $sname=$n111a["username"];
                                                    $simage=$n111a["image"];
                                                } }
                                                echo"<li class='mb-3 pb-3 border-bottom border-separator-light d-flex'>
                                                    <img src='$simage' class='me-3 sw-4 sh-4 rounded-xl align-self-center' alt='$sname' />
                                                    <div class='align-self-center'><a href='#'>$sname just sent a new message!</a> ".$n111["title"]."</div>
                                                </li>";
                                            } }
                                        echo"</ul>
                                    </div>
                                </div>
                            </li>
                            <li class='list-inline-item'>
                                <a href='index.php?url=../subscription-plans.php' aria-haspopup='true' aria-expanded='false' title='Subscription Plans' class='notification-button'>
                                    <div class='position-relative d-inline-flex'><i data-acorn-icon='toy' data-acorn-size='18'></i></div>
                                </a>
                                
                            </li>

                        </ul>
                    </div>
                </div>
            </div>
        </div>";
        
        // echo"<div class='menu-container flex-grow-1' id='MenuGroupX' onclick=\"smenu('1', 'MenuGroupX')\" style='padding-left:0px;margin-top:-25px'>";
        
        echo"<div class='menu-container flex-grow-1' id='MenuGroupX' style='padding-left:0px;margin-top:-25px'>";
                    
            include("menu.php");

        echo"</div>";
        
        // Mobile Buttons Start
        echo"<div class='mobile-buttons-container'>
            <a href='#' id='scrollSpyButton' class='spy-button' data-bs-toggle='dropdown'><i data-acorn-icon='menu-dropdown'></i></a>
            <div class='dropdown-menu dropdown-menu-end' id='scrollSpyDropdown'></div>
            <a href='#' id='mobileMenuButton' class='menu-button'><i data-acorn-icon='menu'></i></a>
        </div>
    </div>
    
    <div class='nav-shadow'></div>
    
</div>";