<?php

    echo"<head>
        <meta charset='utf-8'>
    	<meta http-equiv='x-ua-compatible' content='ie=edge'>
    	<link rel='icon' type='image/x-icon' href='$mainurl/img/favicon.png'>
    	<meta name='application-name' content='&nbsp;' />
        <meta name='msapplication-TileColor' content='#FFFFFF' />
        <meta name='viewport' content='width=device-width, initial-scale=1, maximum-scale=1' />
        
    	<link rel='preconnect' href='https://fonts.gstatic.com' />
        <link href='https://fonts.googleapis.com/css2?family=Nunito+Sans:wght@300;400;700&display=swap' rel='stylesheet' />
        <link href='https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400;700&display=swap' rel='stylesheet' />
        <link rel='stylesheet' href='font/CS-Interface/style.css' />
        <link rel='stylesheet' href='css/vendor/bootstrap.min.css' />
        <link rel='stylesheet' href='css/vendor/OverlayScrollbars.min.css' />
        <link rel='stylesheet' href='css/vendor/glide.core.min.css' />
        <link rel='stylesheet' href='css/vendor/introjs.min.css' />
        <link rel='stylesheet' href='css/vendor/select2.min.css' />
        <link rel='stylesheet' href='css/vendor/select2-bootstrap4.min.css' />
		<link rel='stylesheet' href='css/vendor/datatables.min.css' />
        <link rel='stylesheet' href='css/vendor/plyr.css' />
        <link rel='stylesheet' href='css/styles.css' />
        <link rel='stylesheet' href='css/main.css' />     
        
		<script src='https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js'></script>
        <script src='js/base/loader.js'></script>"; ?>
    
        <style>
            @media screen and (max-width: 600px) {
                div.hide-area {
                    display: none;
                }
                div.show-area {
                    display: inline;
                }
                div.resize-area {
                    width: 100%;
                }
            }
            @media screen and (min-width: 650px) {
                div.hide-area1 {
                    display: none;
                }
                div.show-area1 {
                    display: inline;
                }
                div.resize-area1 {
                    width: 93%;
                }
            }
        </style>
        
        <script>
            function allowDrop(ev) {
            ev.preventDefault();
            }
            
            function drag(ev) {
            ev.dataTransfer.setData("text", ev.target.id);
            }
            
            function drop(ev) {
            ev.preventDefault();
            var data = ev.dataTransfer.getData("text");
            ev.target.appendChild(document.getElementById(data));
            }
        </script>
        <style>
            @media screen and (max-width: 600px) {
                div.hide-area {
                    display: none;
                }
                div.show-area {
                    display: inline;
                }
                div.resize-area {
                    width: 100%;
                }
            }
            @media screen and (min-width: 650px) {
                div.hide-area1 {
                    display: none;
                }
                div.show-area1 {
                    display: inline;
                }
                div.resize-area1 {
                    width: 93%;
                }
            }
            .footerx {
               border: 1;
               position: fixed;
               left: 0;
               bottom: 0;
               width: 100%;
               margin-bottom: -18px;
               background-color: #44BC9D;
               color: white;
               text-align: center;
               z-index: 1;
            }
        </style>
        <style>
            #blink_text{	
                animation-name:blink;
                width:280px;
                animation-duration:2s;
                animation-timing-function:ease-in;
                animation-iteration-count:Infinite;
            }

            @keyframes blink{
                
                50%{color:green;}
                100%{color:greenyellow;}
            }
        </style>
        <script>
			$(document).ready(function(){
				setInterval(function(){
    				$("#LiveNotify").load("notify.php");
					$("#menugroup").load("menu_loaded.php");					
    				refresh();
    			},5000);
    		});
			
            <?php 
            if(!isset($smsbd)) $smsbd=0;
            if($smsbd=="profile"){ ?>
            
    			$(document).ready(function(){
    				setInterval(function(){
    				    $("#onlinetrack").load("onlinestatus.php");
        				$("#personalinformation1").load("personalinformation.php");
        				$("#emergencyperson1").load("emergencyperson.php");
        				$("#aboutinformation1").load("aboutinformation.php");
        				$("#myeducation1").load("education.php");
        				$("#myexperience1").load("experience.php");
        				$("#myfamily1").load("family.php");						
    					refresh();
    				},3000);
    			});
    			
			<?php } ?>
		    
		    function goBack() {
			  window.history.back();
			}
			
			function clr_set2(){
				document.formusersloginx.sname.style.visibility="visible";
			}
			function clr_set1(){
				document.formusersloginx.sname.style.visibility="hidden";
			}
	    </script>
    </head>