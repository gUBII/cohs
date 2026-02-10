<?php
    echo"<head>
        <meta charset='utf-8'>
        <title>Jaman Marketing Limited (JML).</title>
        <meta http-equiv='x-ua-compatible' content='ie=edge'>
        <meta name='description' content=''>
        <meta name='viewport' content='width=device-width, initial-scale=1'>
        <meta property='og:title' content=''>
        <meta property='og:type' content=''>
        <meta property='og:url' content=''>
        <meta property='og:image' content=''>
        
        <link rel='shortcut icon' type='image/x-icon' href='assets/favicon.png'>
        <link href='assets/css/main.css' rel='stylesheet' type='text/css' />
        <link rel='stylesheet' href='assets/font-awesome/css/font-awesome.min.css'>";
        
        echo"<link href='assets/DataTables/datatables.min.css' rel='stylesheet'>
        <script src='assets/DataTables/datatables.min.js'></script>

        <script language='JavaScript' type='text/javascript' src='wysiwyg.js'></script>
        
    </head>"; ?>
    
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

    <script type="text/javascript">
        function ChangeUrl(url) {
            history.pushState(null, null, url);
        }
    </script>
        
	<script>
		$(document).ready(function(){
			setInterval(function(){
				$("#uimz").load("proimz.php");
				$("#simz").load("cartstatus.php");
				$("#bimz").load("cartcontainer.php");
				refresh();
			},2000);
		});
	
		function goBack() {
		  window.history.back();
		}
	</script>

	<script src="jquery.cookie.js"></script>
	<script type=text/javascript>
        function setScreenHWCookie() {
            $.cookie('sw',screen.width);
            $.cookie('sh',screen.height);
            return true;
        }
        setScreenHWCookie();
    </script>
