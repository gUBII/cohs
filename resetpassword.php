<?php if(($_GET["sourcefrom"] ?? "")!="APP"){ ?>
    <style>
        .bg {
            background-image: url("../assets/accounts14.jpg");
            height: 100%; 
            background-position: center;
            background-repeat: no-repeat;
            background-size: cover;
        }
        #grad1 {
            background-color: red;
            background-image: linear-gradient(128deg, #121212, red);
        }
        .typewriter h3 {
          color: #fff;
          overflow: hidden;
          border-right: .15em solid black;
          white-space: nowrap;
          margin: 0 auto;
          
          animation: 
            typing 3.5s steps(30, end),
            blink-caret .5s step-end infinite;
        }
        .typewriter h4 {
          color: #fff;
          overflow: hidden;
          /* border-right: .15em solid black; */
          white-space: nowrap;
          margin: 0 auto;
          
          animation: 
            typing 3.5s steps(30, end),
            blink-caret .5s step-end infinite;
        }
        
        /* The typing effect */
        @keyframes typing {
          from { width: 0 }
          to { width: 100% }
        }
        
        /* The typewriter cursor effect */
        @keyframes blink-caret {
          from, to { border-color: transparent }
          50% { border-color: orange }
        }
    </style>
<?php }

    include("head-light.php");
    
    $yr=date("Y", time());
    
    echo"<body style='background-color:#121212;overflow: hidden;' onload='deleteAllCookies();'>
    <div class='h-100 bg' id='datashiftX' style='padding:0px'><center><br><br><br><br><br><br>
        <div class='sw-lg-70 d-flex justify-content-center align-items-center shadow-deep ' style='background-color:#000000;border-image: linear-gradient(to bottom, #222222 10%, #3acfd5 100%) 1;border-width: 1px;border-style: solid'>
            <div class='sw-lg-100 px-5'>
            
                <table><tr>
                    <td><a href='index.php'>";
                        // <img src='img/nexis365_dark.png' style='width:150px;border-radius:10px;padding:10px'>
                        echo"<img src='assets/nexis-animated-logo.gif' style='width:150px;border-radius:10px;padding:10px'>";

                    echo"</a></td>
                    <td><iframe name='processor' src='blank-login.php?url=login&d1=RESET PASSWORD&d2=Check Email, Find CODE and Reset Password.' height='60' width='100%' scrolling='no' border='0' frameborder='0'>&nbsp;</iframe></td>
                </tr><tr>
                    <td colspan=2><hr><div style='text-align:left'>Enter Recovery OTP sent at your Email:</div></td>
                </tr></table>
                
                <form method='post' action='security.php' target='processor' enctype='multipart/form-data' class='tooltip-end-bottom'>
                    <div class='mb-3 filled form-group tooltip-end-top'>
                        <i data-acorn-icon='code'></i><input style='background-color:#cccccc;color:black' class='form-control' type='text' placeholder='OTP Code' required value='' name='fotp' />
                    </div>
                    <div style='text-align:left'>New Password:</div>
                    <div class='mb-3 filled form-group tooltip-end-top' style='color:orange'>
                        <i data-acorn-icon='lock-off'></i><input style='background-color:#cccccc;color:black' class='form-control pe-7' name='npass' type='password' value='' placeholder='New Password'/>
                    </div>
                    <div style='text-align:left'>Confirm Password: (Same as Above)</div>
                    <div class='mb-3 filled form-group tooltip-end-top' style='color:orange'>
                        <i data-acorn-icon='lock-off'></i><input style='background-color:#cccccc;color:black' class='form-control pe-7' name='cpass' type='password' value='' placeholder='Confirm Password'/>
                    </div>
                    <div class='mb-3 filled form-group tooltip-end-top'><br>
                        <table style='width:100%'><tr>
                            <td width='100px'><button type='submit' class='btn btn-lg btn-primary'>Update Password</button></td>
                        </tr></table>
                    </div>
                </form>
                <br><br>
            </div>
        </div>
        <div class='sw-lg-70 d-flex justify-content-center align-items-center py-5 ' style='padding-left:10px;padding-right:10px'>
            <table style='width:100%'><tr>
                <td align=left width='50%' style='font-size:8pt'>
                    <a href='https://www.nexis365.com/terms_of_service'>Terms of Service</a> | 
                    <a href='https://www.nexis365.com/privacy_policy'>Privacy Policy</a></td>
                <td align=right width='50%' style='font-size:8pt'>Copyright © $yr NEXIS 365</td>
            </tr></table>
        </div>
    </center></div>";
            
    include("scripts-light.php"); ?>
    
    <script>
        function deleteAllCookies() {
            const cookies = document.cookie.split(';');
            for (let i = 0; i < cookies.length; i++) {
                const cookie = cookies[i].split('=');
                const cookieName = cookie[0].trim();
                document.cookie = `${cookieName}=; expires=Thu, 01 Jan 1970 00:00:00 UTC; path=/;`;
            }
        }
    </script>
