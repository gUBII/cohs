<?php
    echo"</div>";
?>

			<!---
			<script type="text/javascript">
                $("a").click(function(e){
                    e.preventDefault();
                    $.ajax({
                        url : $(this).attr('href')+"&section=true",
                        type : 'GET',
                        dataType : 'html',
                        success : function(code_html, statut){
                            $('#main-content').html(code_html);
                        }
                    });
                    window.history.pushState("","", $(this).attr('href'));
                });
            </script>
            
            
            <script type="text/javascript">
                const state = { page_id: 1, user_id: 5 };
                const url = "index.php";
                // history.pushState(state, "", url);
                history.pushState(null, "", url);
                content.innerHTML = entry.content;
                
            </script
            --->
            
    <?php echo"<footer class='main' style='background-color:$footerbc;color:$footertc'>
        <section class='newsletter p-30 text-white wow fadeIn animated'>
            <div class='container'>
                <div class='row align-items-center'>
                    <div class='col-lg-7 mb-md-3 mb-lg-0'>
                        <div class='row align-items-center'>
                            <div class='col flex-horizontal-center'>
                                <img class='icon-email' src='assets/imgs/theme/icons/icon-email.svg' alt=''>
                                <h4 class='font-size-20 mb-0 ml-3'>Sign up to Newsletter</h4>
                            </div>
                            <div class='col my-4 my-md-0 des'>
                                <h5 class='font-size-15 ml-4 mb-0'>...and receive <strong>Daily, Weekly and Monthly Special Offers and Discounts for repid shopping.</strong></h5>
                            </div>
                        </div>
                    </div>
                    <div class='col-lg-5'>                        
                        <form class='form-subcriber d-flex wow fadeIn animated'>
                            <input type='email' class='form-control bg-white font-small' placeholder='Enter your email'>
                            <button class='btn bg-dark text-white' type='submit'>Subscribe</button>
                        </form>                        
                    </div>
                </div>
            </div>
        </section>
        <section class='section-padding footer-mid'>
            <div class='container pt-15 pb-20'>
                <div class='row'>
                    <div class='col-lg-3 col-md-6'>
                        <div class='widget-about font-md mb-md-5 mb-lg-0'>
                            <div class='logo logo-width-1 wow fadeIn animated'>
                                <a href='index.php'><img src='media/$clogo' alt='$ccompanyname' style='width:100%'></a>
                            </div>
                            <h5 class='mt-20 mb-10 fw-600 text-grey-4 wow fadeIn animated' style='color:$footertc'>Contact</h5>
                            <p class='wow fadeIn animated' style='color:$footertc'><strong>Address: </strong>$caddress, $ccity, $cstate-$czip, $ccountry.</p>
                            <p class='wow fadeIn animated' style='color:$footertc'><strong>Phone: </strong>$cphone</p>
                            <p class='wow fadeIn animated' style='color:$footertc'><strong>Email: </strong>$cemail</p>
                            <p class='wow fadeIn animated' style='color:$footertc'><strong>Hours: </strong>$cservicehours</p>
                        </div>
                    </div>
                    <div class='col-lg-3 col-md-3'style='color:$footertc'>
                        <h5 class='widget-title wow fadeIn animated' style='color:$footertc'>Useful Links</h5>
                        <ul class='footer-list wow fadeIn animated mb-sm-5 mb-md-0'>";
                            $pages11 = "select * from sms_link where des1='TOP MENU' and placement='BOTTOM' and status='ON' order by sorder asc";
							$pages22 = $conn->query($pages11);
							if ($pages22->num_rows > 0) { while($pages33 = $pages22->fetch_assoc()) {
								echo"<li>
									<a href='#top' style='cursor: pointer' onclick=\"ChangeUrl('index.php?cPath=80010&pageid=".$pages33["id"]."'); shiftdatax('pages.php?cPath=80010&pageid=".$pages33["id"]."&cm=1', 'datashiftX')\" target='_self' title='".$pages33["pam"]."'>
										<span style='color:$footertc'><i class='fa fa-files-o' style='color:$footertc;font-size:12pt;margin-top:2px'></i>&nbsp;&nbsp;".$pages33["pam"]."</span>
									</a>
								</li>";
                                $lastid=$pages33["sorder"];
                            } }
                        echo"</ul>
                    </div>
    
                    <div class='col-lg-3  col-md-3'>
                        <h5 class='widget-title wow fadeIn animated' style='color:$footertc'>My Account</h5>
                        <ul class='footer-list wow fadeIn animated'>";
                            echo"<li><a href='#top' style='cursor: pointer' onclick=\"ChangeUrl('index.php?cPath=80000&lid=1'); shiftdatax('product_compare.php?cm=1', 'datashiftX')\" target='_self' title='Compare Product'>
                                <span style='color:$footertc'><i class='fa fa-compress' style='color:$footertc;font-size:12pt;margin-top:2px'></i>&nbsp;&nbspMy Compare List</span>
                            </a></li>";
                            echo"<li><a href='#top' style='cursor: pointer' onclick=\"ChangeUrl('index.php?cPath=80000&lid=2'); shiftdatax('product_favourite.php?cm=1', 'datashiftX')\" target='_self' title='Favourite Product'>
                                <span style='color:$footertc'><i class='fa fa-heart' style='color:$footertc;font-size:12pt;margin-top:2px'></i>&nbsp;&nbspMy Favourite List</span>
                            </a></li>";
                            echo"<li><a href='#top' style='cursor: pointer' onclick=\"ChangeUrl('index.php?cPath=80000&lid=3'); shiftdatax('product_cart.php?cm=1', 'datashiftX')\" target='_self' title='Shopping Cart'>
                                <span style='color:$footertc'><i class='fa fa-shopping-cart' style='color:$footertc;font-size:12pt;margin-top:2px'></i>&nbsp;&nbspView Cart</span>
                            </a></li>";
                            echo"<li><a href='#top' style='cursor: pointer' onclick=\"ChangeUrl('index.php?cPath=80000&lid=4'); shiftdatax('product_checkout.php?cm=1', 'datashiftX')\" target='_self' title='Product Checkout'>
                                <span style='color:$footertc'><i class='fa fa-credit-card-alt ' style='color:$footertc;font-size:12pt;margin-top:2px'></i>&nbsp;&nbspConfirm Order</span>
                            </a></li>";
                            echo"<li><a href='#top' style='cursor: pointer' onclick=\"ChangeUrl('index.php?cPath=80000&lid=5'); shiftdatax('order_track.php?cm=1', 'datashiftX')\" target='_self' title='My Orders'>
                                    <span style='color:$footertc'><i class='fa fa-sitemap ' style='color:$footertc;font-size:12pt;margin-top:2px'></i>&nbsp;&nbspMy Orders</span>
                            </a></li>";
                            
                            if(!isset($userid)){
                                echo"<li><a href='#top' style='cursor: pointer' onclick=\"ChangeUrl('index.php?cPath=90000&vt=3'); shiftdatax('login.php?cm=1', 'datashiftX')\" target='_self' title='Login'>
									<span style='color:$footertc'><i class='fa fa-sign-in' style='color:$footertc;font-size:12pt;margin-top:2px'></i>&nbsp;&nbsp;Login</span>
								</a></li>";
                            }else{
                                if($mytype=="VENDOR"){                                
                                    echo"<li><a href='#top' style='cursor: pointer' onclick=\"ChangeUrl('index.php?cPath=9000&vt=1'); shiftdatax('seller_dashboard.php?cPath=99999&cm=1', 'datashiftX')\" target='_self' title='Seller Dashboard'>
                                        <span style='color:$footertc'><i class='fa fa-shopping-bag' style='color:$footertc;font-size:12pt;margin-top:2px'></i>&nbsp;&nbsp;Seller's Panel</span>
                                    </a></li>";
                                }
                                if($mytype=="CUSTOMER"){
                                    echo"<li><a href='#top' style='cursor: pointer' onclick=\"ChangeUrl('index.php?cPath=90000&vt=2'); shiftdatax('user_dashboard.php?cPath=90000&cm=1', 'datashiftX')\" target='_self' title='Buyer's Dashboard'>
                                        <span style='color:$footertc'><i class='fa fa-user' style='color:$footertc;font-size:12pt;margin-top:2px'></i>&nbsp;&nbsp;Buyer's Panel</span>
                                    </a></li>";
                                }

                                echo"<li><a href='logout.php' target='_self' title='Logout'>
									<span style='color:$footertc'><i class='fa fa-sign-out' style='color:$footertc;font-size:12pt;margin-top:2px'></i>&nbsp;&nbsp;Logout</span>
								</a></li>";

                            }
                        echo"</ul>
                    </div>
                    <div class='col-lg-3'>
                        <h5 class='widget-title wow fadeIn animated' style='color:$footertc'>Install App</h5>
                        <div class='row'>
                            <div class='col-md-8 col-lg-12'>
                                <p class='wow fadeIn animated' style='color:$footertc'>From App Store or Google Play</p>
                                <div class='download-app wow fadeIn animated'>
                                    <a href='$androidlink' class='hover-up mb-sm-4 mb-lg-0'><img class='active' src='assets/imgs/theme/app-store.jpg' alt=''></a>
                                    <a href='$ioslink' class='hover-up'><img src='assets/imgs/theme/google-play.jpg' alt=''></a>
                                </div>
                            
                                <h5 class='mb-10 mt-30 fw-600 text-grey-4 wow fadeIn animated' style='color:$footertc'>Follow Us</h5>
                                <div class='mobile-social-icon wow fadeIn animated mb-sm-5 mb-md-0'>
                                    <a href='$facebooklink'><li class='fa fa-facebook' style='color:$buttonbc;font-size:12pt;padding-right:10px'></li></a>
                                    <a href='$twitterlink'><li class='fa fa-twitter' style='color:$buttonbc;font-size:12pt;padding-right:10px'></li></a>
                                    <a href='$linkedinlink'><li class='fa fa-linkedin' style='color:$buttonbc;font-size:12pt;padding-right:10px'></li></a>
                                    <a href='$instagramlink'><li class='fa fa-instagram' style='color:$buttonbc;font-size:12pt;padding-right:10px'></li></a>
                                    <a href='$pinterestlink'><li class='fa fa-pinterest' style='color:$buttonbc;font-size:12pt;padding-right:10px'></li></a>
                                    <a href='$youtubelink'><li class='fa fa-youtube' style='color:$buttonbc;font-size:12pt;padding-right:10px'></li></a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class='col-lg-12 col-lg-12 mt-md-3 mt-lg-0'>
                        <p class='mb-20 wow fadeIn animated' style='color:$footertc'>Secured Payment Gateways</p>
                        <img class='wow fadeIn animated' src='assets/sslcommerz.png' alt=''>
                    </div>
                </div>
            </div>
        </section>
        <div class='container pb-20 wow fadeIn animated'>
            <div class='row'>
                <div class='col-12 mb-20'><div class='footer-bottom'></div></div>
                <div class='col-lg-6' style='color:$footertc'>
                    <p class='float-md-left font-sm text-muted mb-0' style='color:$footertc'>&copy; $tyear, <strong class='text-brand'>JML</strong> - Jamam Marketing Limited 
                        <iframe name='addtocart' src='blank.php' height='10' width='10' scrolling='no' border='0' frameborder='0'>&nbsp;</iframe>
                    </p>
                </div>
                <div class='col-lg-6' style='color:$footertc'>
                    <p class='text-lg-end text-start font-sm text-muted mb-0' style='color:$footertc'>
                        Designed by <a href='http://www.smsbd.com' target='_blank' style='color:$footertc'>sMs Software (BD), INt.</a> All rights reserved
                    </p>
                </div>
            </div>
        </div>
    </footer>";
    
    // Preloader Start -->
    /*
     echo"<div id='preloader-active'>
        <div class='preloader d-flex align-items-center justify-content-center'>
            <div class='preloader-inner position-relative'>
                <div class='text-center'><center>
                    <img src='$clogo' style='height:50px'><h5 class='mb-10'>Now Loading</h5>
                    <div class='loader'><div class='bar bar1'></div><div class='bar bar2'></div><div class='bar bar3'></div></div>
                </center></div>
            </div>
        </div>
    </div>";
*/
    // Vendor JS
    echo"<script src='assets/js/vendor/modernizr-3.6.0.min.js'></script>
    <script src='assets/js/vendor/jquery-3.6.0.min.js'></script>
    <script src='assets/js/vendor/jquery-migrate-3.3.0.min.js'></script>
    <script src='assets/js/vendor/bootstrap.bundle.min.js'></script>
    <script src='assets/js/plugins/slick.js'></script>
    <script src='assets/js/plugins/jquery.syotimer.min.js'></script>
    <script src='assets/js/plugins/wow.js'></script>
    <script src='assets/js/plugins/jquery-ui.js'></script>
    <script src='assets/js/plugins/perfect-scrollbar.js'></script>
    <script src='assets/js/plugins/magnific-popup.js'></script>
    <script src='assets/js/plugins/select2.min.js'></script>
    <script src='assets/js/plugins/waypoints.js'></script>
    <script src='assets/js/plugins/counterup.js'></script>
    <script src='assets/js/plugins/jquery.countdown.min.js'></script>
    <script src='assets/js/plugins/images-loaded.js'></script>
    <script src='assets/js/plugins/isotope.js'></script>
    <script src='assets/js/plugins/scrollup.js'></script>
    <script src='assets/js/plugins/jquery.vticker-min.js'></script>
    <script src='assets/js/plugins/jquery.theia.sticky.js'></script>
    <script src='assets/js/plugins/jquery.elevatezoom.js'></script>
    
    <script src='https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js' integrity='sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3' crossorigin='anonymous'></script>
    <script src='https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js' integrity='sha384-cuYeSxntonz0PPNlHhBs68uyIAVpIIOZZ5JqeqvYYIcEL727kskC66kF92t6Xl2V' crossorigin='anonymous'></script>
    <script src='https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js' integrity='sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4' crossorigin='anonymous'></script>

    <script src='./assets/js/main.js?v=3.4'></script>
    <script src='./assets/js/shop.js?v=3.4'></script>";
		
		$dmyx = time();
		$hrs=date("h", $dmyx);
		$hrs2=(24-$hrs);
		$dmyx2=strtotime("+$hrs2 hours",$dmyx);
		$tdx=date("M d, Y 00:00:00", $dmyx2); ?>
        
        <script type="text/javascript">
            // LOAD MORE DATA
            display_data();
            function display_data() {
                var rowcount = $("#rowcount").val();
                var catid = $("#catid").val();
                $(".loader-div").show(); // show loader
                $.ajax({
                    url: "pd_loadmore.php",
                    type: "POST",
                    data: {
                        rowcount: rowcount,
                        catid: catid
                    },
                    dataType: 'json',
                    success: function(response) {
                        if (response.status == true) {
                            $("#rowcount").val(response.rowcount);
                            $("#catid").val(response.catid);
                            $('#dynamic_data').append(response.data);
                            $(".loader-div").hide(); // hide loader
                        } else {
                            $(".loader-div").hide(); // hide loader
                            alert(response.msg);
                        }
                    },
                    error: function(xhr, status) {
                        $(".loader-div").hide(); // hide loader	
                        console.log('ajax error = ' + xhr.statusText);
                        alert(response.msg);
                    }
                });
            }
        </script>

        <script>
            // product images gallery slider
            
            let slideIndex = 1;
            showSlides(slideIndex);

            function plusSlides(n) {
              showSlides(slideIndex += n);
            }

            function currentSlide(n) {
              showSlides(slideIndex = n);              
            }

            function showSlides(n) {
                var x = document.getElementById("mySliderx");
                x.style.display = "none"; 
                let i;
                let slides = document.getElementsByClassName("mySlides");
                let dots = document.getElementsByClassName("demo");
                let captionText = document.getElementById("caption");
                if (n > slides.length) {slideIndex = 1}
                if (n < 1) {slideIndex = slides.length}
                for (i = 0; i < slides.length; i++) {
                    slides[i].style.display = "none";
                }
                for (i = 0; i < dots.length; i++) {
                    dots[i].className = dots[i].className.replace(" active", "");
                }
                slides[slideIndex-1].style.display = "block";
                dots[slideIndex-1].className += " active";
                captionText.innerHTML = dots[slideIndex-1].alt;
            }
        </script>

        <script>
			var countDownDate = new Date("<?php echo $tdx; ?>").getTime();
            
            var x = setInterval(function() {
                var now = new Date().getTime();
                var distance = countDownDate - now;
                var days = Math.floor(distance / (1000 * 60 * 60 * 24));
			    var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
			    var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
			    var seconds = Math.floor((distance % (1000 * 60)) / 1000);
			    
			    if (hours < 10) var tenx =0;
			    else var tenx = "";
			    if (minutes < 10) var teny =0;
			    else var teny = "";
			    if (seconds < 10) var tenz =0;
			    else var tenz = "";
			    
			    document.getElementById("flashsale").innerHTML = "<span style=font-face:arial;color:white;font-size:16pt;background-color:#34BB78;padding:5px>" + tenx + hours + "</span><span style=font-face:arial;color:black;font-size:16pt;padding:5px>:</span><span style=font-face:arial;color:white;font-size:16pt;background-color:#34BB78;padding:5px>" + teny + minutes + "</span><span style=font-face:arial;color:black;font-size:16pt;padding:5px>:</span><span style=font-face:arial;color:white;font-size:16pt;background-color:#34BB78;padding:5px>" + tenz + seconds + "</span>";
				if (distance < 0) {
				    clearInterval(x);
				    document.getElementById("flashsale").innerHTML = "EXPIRED";
			    }
			}, 1000);
			
			
            var x = setInterval(function() {
                var now = new Date().getTime();
                var distance = countDownDate - now;
                var days = Math.floor(distance / (1000 * 60 * 60 * 24));
			    var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
			    var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
			    var seconds = Math.floor((distance % (1000 * 60)) / 1000);
			    
			    if (hours < 10) var tenx =0;
			    else var tenx = "";
			    if (minutes < 10) var teny =0;
			    else var teny = "";
			    if (seconds < 10) var tenz =0;
			    else var tenz = "";
			    
			    document.getElementById("flashsale1").innerHTML = "<span style=font-face:arial;color:white;font-size:12pt;background-color:#34BB78;padding:5px>" + tenx + hours + "</span><span style=font-face:arial;color:black;font-size:12pt;padding:5px>:</span><span style=font-face:arial;color:white;font-size:12pt;background-color:#34BB78;padding:5px>" + teny + minutes + "</span><span style=font-face:arial;color:black;font-size:12pt;padding:5px>:</span><span style=font-face:arial;color:white;font-size:12pt;background-color:#34BB78;padding:5px>" + tenz + seconds + "</span>";
				
			    if (distance < 0) {
				    clearInterval(x);
				    document.getElementById("flashsale1").innerHTML = "EXPIRED";
				}
			}, 1000);
			
			var x = setInterval(function() {
                var now = new Date().getTime();
                var distance = countDownDate - now;
                var days = Math.floor(distance / (1000 * 60 * 60 * 24));
			    var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
			    var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
			    var seconds = Math.floor((distance % (1000 * 60)) / 1000);
			    
			    if (hours < 10) var tenx =0;
			    else var tenx = "";
			    if (minutes < 10) var teny =0;
			    else var teny = "";
			    if (seconds < 10) var tenz =0;
			    else var tenz = "";
			    
			    document.getElementById("flashsale2").innerHTML = "<span style=font-face:arial;color:white;font-size:12pt;background-color:#34BB78;padding:5px>" + tenx + hours + "</span><span style=font-face:arial;color:black;font-size:12pt;padding:5px>:</span><span style=font-face:arial;color:white;font-size:12pt;background-color:#34BB78;padding:5px>" + teny + minutes + "</span><span style=font-face:arial;color:black;font-size:12pt;padding:5px>:</span><span style=font-face:arial;color:white;font-size:12pt;background-color:#34BB78;padding:5px>" + tenz + seconds + "</span>";
				
			    if (distance < 0) {
				    clearInterval(x);
				    document.getElementById("flashsale2").innerHTML = "EXPIRED";
				}
			}, 1000);
		
		    var x = setInterval(function() {
                var now = new Date().getTime();
                var distance = countDownDate - now;
                var days = Math.floor(distance / (1000 * 60 * 60 * 24));
			    var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
			    var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
			    var seconds = Math.floor((distance % (1000 * 60)) / 1000);
			    
			    if (hours < 10) var tenx =0;
			    else var tenx = "";
			    if (minutes < 10) var teny =0;
			    else var teny = "";
			    if (seconds < 10) var tenz =0;
			    else var tenz = "";
			    
			    document.getElementById("flashsale3").innerHTML = "<span style=font-face:arial;color:white;font-size:12pt;background-color:#34BB78;padding:5px>" + tenx + hours + "</span><span style=font-face:arial;color:black;font-size:12pt;padding:5px>:</span><span style=font-face:arial;color:white;font-size:12pt;background-color:#34BB78;padding:5px>" + teny + minutes + "</span><span style=font-face:arial;color:black;font-size:12pt;padding:5px>:</span><span style=font-face:arial;color:white;font-size:12pt;background-color:#34BB78;padding:5px>" + tenz + seconds + "</span>";
				
			    if (distance < 0) {
				    clearInterval(x);
				    document.getElementById("flashsale3").innerHTML = "EXPIRED";
				}
			}, 1000);
			
			var x = setInterval(function() {
                var now = new Date().getTime();
                var distance = countDownDate - now;
                var days = Math.floor(distance / (1000 * 60 * 60 * 24));
			    var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
			    var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
			    var seconds = Math.floor((distance % (1000 * 60)) / 1000);
			    
			    if (hours < 10) var tenx =0;
			    else var tenx = "";
			    if (minutes < 10) var teny =0;
			    else var teny = "";
			    if (seconds < 10) var tenz =0;
			    else var tenz = "";
			    
			    document.getElementById("flashsale4").innerHTML = "<span style=font-face:arial;color:white;font-size:12pt;background-color:#34BB78;padding:5px>" + tenx + hours + "</span><span style=font-face:arial;color:black;font-size:12pt;padding:5px>:</span><span style=font-face:arial;color:white;font-size:12pt;background-color:#34BB78;padding:5px>" + teny + minutes + "</span><span style=font-face:arial;color:black;font-size:12pt;padding:5px>:</span><span style=font-face:arial;color:white;font-size:12pt;background-color:#34BB78;padding:5px>" + tenz + seconds + "</span>";
				
			    if (distance < 0) {
				    clearInterval(x);
				    document.getElementById("flashsale4").innerHTML = "EXPIRED";
				}
			}, 1000);
			
			var x = setInterval(function() {
                var now = new Date().getTime();
                var distance = countDownDate - now;
                var days = Math.floor(distance / (1000 * 60 * 60 * 24));
			    var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
			    var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
			    var seconds = Math.floor((distance % (1000 * 60)) / 1000);
			    
			    if (hours < 10) var tenx =0;
			    else var tenx = "";
			    if (minutes < 10) var teny =0;
			    else var teny = "";
			    if (seconds < 10) var tenz =0;
			    else var tenz = "";
			    
			    document.getElementById("flashsale5").innerHTML = "<span style=font-face:arial;color:white;font-size:12pt;background-color:#34BB78;padding:5px>" + tenx + hours + "</span><span style=font-face:arial;color:black;font-size:12pt;padding:5px>:</span><span style=font-face:arial;color:white;font-size:12pt;background-color:#34BB78;padding:5px>" + teny + minutes + "</span><span style=font-face:arial;color:black;font-size:12pt;padding:5px>:</span><span style=font-face:arial;color:white;font-size:12pt;background-color:#34BB78;padding:5px>" + tenz + seconds + "</span>";
				
			    if (distance < 0) {
				    clearInterval(x);
				    document.getElementById("flashsale5").innerHTML = "EXPIRED";
				}
			}, 1000);
			
			var x = setInterval(function() {
                var now = new Date().getTime();
                var distance = countDownDate - now;
                var days = Math.floor(distance / (1000 * 60 * 60 * 24));
			    var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
			    var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
			    var seconds = Math.floor((distance % (1000 * 60)) / 1000);
			    
			    if (hours < 10) var tenx =0;
			    else var tenx = "";
			    if (minutes < 10) var teny =0;
			    else var teny = "";
			    if (seconds < 10) var tenz =0;
			    else var tenz = "";
			    
			    document.getElementById("flashsale6").innerHTML = "<span style=font-face:arial;color:white;font-size:12pt;background-color:#34BB78;padding:5px>" + tenx + hours + "</span><span style=font-face:arial;color:black;font-size:12pt;padding:5px>:</span><span style=font-face:arial;color:white;font-size:12pt;background-color:#34BB78;padding:5px>" + teny + minutes + "</span><span style=font-face:arial;color:black;font-size:12pt;padding:5px>:</span><span style=font-face:arial;color:white;font-size:12pt;background-color:#34BB78;padding:5px>" + tenz + seconds + "</span>";
				
			    if (distance < 0) {
				    clearInterval(x);
				    document.getElementById("flashsale6").innerHTML = "EXPIRED";
				}
			}, 1000);
			
			var x = setInterval(function() {
                var now = new Date().getTime();
                var distance = countDownDate - now;
                var days = Math.floor(distance / (1000 * 60 * 60 * 24));
			    var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
			    var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
			    var seconds = Math.floor((distance % (1000 * 60)) / 1000);
			    
			    if (hours < 10) var tenx =0;
			    else var tenx = "";
			    if (minutes < 10) var teny =0;
			    else var teny = "";
			    if (seconds < 10) var tenz =0;
			    else var tenz = "";
			    
			    document.getElementById("flashsale7").innerHTML = "<span style=font-face:arial;color:white;font-size:12pt;background-color:#34BB78;padding:5px>" + tenx + hours + "</span><span style=font-face:arial;color:black;font-size:12pt;padding:5px>:</span><span style=font-face:arial;color:white;font-size:12pt;background-color:#34BB78;padding:5px>" + teny + minutes + "</span><span style=font-face:arial;color:black;font-size:12pt;padding:5px>:</span><span style=font-face:arial;color:white;font-size:12pt;background-color:#34BB78;padding:5px>" + tenz + seconds + "</span>";
				
			    if (distance < 0) {
				    clearInterval(x);
				    document.getElementById("flashsale7").innerHTML = "EXPIRED";
				}
			}, 1000);
			
			var x = setInterval(function() {
                var now = new Date().getTime();
                var distance = countDownDate - now;
                var days = Math.floor(distance / (1000 * 60 * 60 * 24));
			    var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
			    var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
			    var seconds = Math.floor((distance % (1000 * 60)) / 1000);
			    
			    if (hours < 10) var tenx =0;
			    else var tenx = "";
			    if (minutes < 10) var teny =0;
			    else var teny = "";
			    if (seconds < 10) var tenz =0;
			    else var tenz = "";
			    
			    document.getElementById("flashsale8").innerHTML = "<span style=font-face:arial;color:white;font-size:12pt;background-color:#34BB78;padding:5px>" + tenx + hours + "</span><span style=font-face:arial;color:black;font-size:12pt;padding:5px>:</span><span style=font-face:arial;color:white;font-size:12pt;background-color:#34BB78;padding:5px>" + teny + minutes + "</span><span style=font-face:arial;color:black;font-size:12pt;padding:5px>:</span><span style=font-face:arial;color:white;font-size:12pt;background-color:#34BB78;padding:5px>" + tenz + seconds + "</span>";
				
			    if (distance < 0) {
				    clearInterval(x);
				    document.getElementById("flashsale8").innerHTML = "EXPIRED";
				}
			}, 1000);
			
			function CloseFunction() {
			    var x = document.getElementById("closeDIV");
                if (x.style.display === "none") {
                    x.style.display = "block";
                } else {
                    x.style.display = "none";
                }
            }
            
			function myCheckoutx(val) {
				document.checkoutx.sval.value=document.checkout9.rstate.value;
				alert("Shipping Charge Updated.");
				document.checkoutx.submit();
			}
			
			function myCheckout9(val) {
				document.checkout.bcountry.value=document.checkout9.bcountry.value;
				document.checkout.submit();
			}
			
			function myCheckoutxy() {
				document.checkout.fnotex.focus();
			}
			
			function myCheckoutxyz() {
				document.checkout.rt.focus();
			}
			
			function myGiftoutx() {
				document.giftoutx.submit();
			}
			
            // Get the modal
            var modal = document.getElementById("myModal");
            
            // Get the button that opens the modal
            var btn = document.getElementById("myBtn");
            
            // Get the <span> element that closes the modal
            var span = document.getElementsByClassName("close")[0];
            
            // When the user clicks the button, open the modal 
            btn.onclick = function() {
              modal.style.display = "block";
            }
            
            // When the user clicks on <span> (x), close the modal
            span.onclick = function() {
              modal.style.display = "none";
            }
            
            // When the user clicks anywhere outside of the modal, close it
            window.onclick = function(event) {
              if (event.target == modal) {
                modal.style.display = "none";
              }
            }
            
            /*
            var slideIndex = 0;
            showSlides();
            
            function showSlides() {
              var i;
              var slides = document.getElementsByClassName("mySlides");
              var dots = document.getElementsByClassName("dot");
              for (i = 0; i < slides.length; i++) {
                slides[i].style.display = "none";  
              }
              slideIndex++;
              if (slideIndex > slides.length) {slideIndex = 1}    
              for (i = 0; i < dots.length; i++) {
                dots[i].className = dots[i].className.replace(" active", "");
              }
              slides[slideIndex-1].style.display = "block";  
              dots[slideIndex-1].className += " active";
              setTimeout(showSlides, 4000); // Change image every 2 seconds
            }
            */
            
            var x = document.getElementById("globaladdress");
            
            function getLocation() {
              if (navigator.geolocation) {
                navigator.geolocation.getCurrentPosition(showPosition);
              } else { 
                x.innerHTML = "Geolocation is not supported by this browser.";
              }
            }
            
            function showPosition(position) {
              x.innerHTML = "Latitude: " + position.coords.latitude + 
              "<br>Longitude: " + position.coords.longitude;
            }
        </script>
        
        <!--- <script type="text/javascript">
    		$( "#demo-success" ).click(function() {
    			$.notice({
    				text: "Product added to cart.",
    				type: "success"
    			});
    		});
    		$( "#demo-error" ).click(function() {
    			$.notice({
    				text: "Error Message Here!",
    				type: "error"
    			});
    		});
    		$( "#demo-warning" ).click(function() {
    			$.notice({
    				text: "Warning Message Here!",
    				type: "warning"
    			});
    		});
    		$( "#demo-info" ).click(function() {
    			$.notice({
    				text: "Product added to wishlist.",
    				type: "info"
    			});
    		});
        </script> --->
        
        <!-- Go to www.addthis.com/dashboard to customize your tools -->
        <script type="text/javascript" src="//s7.addthis.com/js/300/addthis_widget.js#pubid=ra-608d7fc58a9122e6"></script>
        
        <script>
            // Get the button
            let mybutton = document.getElementById("myBtn");
            
            // When the user scrolls down 20px from the top of the document, show the button
            window.onscroll = function() {scrollFunction()};
            
            function scrollFunction() {
              if (document.body.scrollTop > 0 || document.documentElement.scrollTop > 0) {
                mybutton.style.display = "block";
              } else {
                mybutton.style.display = "none";
              }
            }
            
            // When the user clicks on the button, scroll to the top of the document
            function topFunction() {
              document.body.scrollTop = 0;
              document.documentElement.scrollTop = 0;
            }
        </script>
        <script>
            function myFunction(imgs) {
                var expandImg = document.getElementById("expandedImg");
                var imgText = document.getElementById("imgtext");
                expandImg.src = imgs.src;
                imgText.innerHTML = imgs.alt;
                expandImg.parentElement.style.display = "block";
            }
        </script>        
        
        <!--- 
        <script src="js/autocomplete.js"></script>
        <script>
            var proposals = ['maeynuor','jQuery Menu', 'jQuery Slider', 'jQuery on CodeHim', 'jQuery Lightbox',  'boat', 'bear', 'dog', 'drink', 'elephant', 'fruit'];
            $(document).ready(function(){
                $('#search-form').autocomplete({
                    hints: proposals,
                    width: 300,
                    height: 30,
                    onSubmit: function(text){
                        $('#message').html('Selected: <b>' + text + '</b>');			
                    }
                });
            });
        </script>
        --->




	</body>
</html>
