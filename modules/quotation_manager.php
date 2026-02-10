    <style>
        .hidden {
        display: none;
        }
        
        #grad1 {
            background-color: red;
            background-image: linear-gradient(128deg, #121212, red); 
        }
        .typewriter h1 {
          color: #fff;
          overflow: hidden;
          border-right: .15em solid black;
          white-space: nowrap;
          margin: 0 auto;
          
          animation: 
            typing 3.5s steps(30, end),
            blink-caret .5s step-end infinite;
        }
        .typewriter h2 {
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
    
<?php
    
    $sheba="workspace";
    $cid=90001;
    $title="Add New Workspace";
    $utype="Workspace";
    
    echo"<div class='data-table-rows slim' id='sample'>
        <div class='data-table-responsive-wrapper'><center>
            <div class='d-flex justify-content-center align-items-center shadow-deep py-5 ' style='border-radius:10px'>
                <div class='sw-lg-100' style='padding:5px;text-align:left;width:100%'>
                    <div class='row'>
                        <div class='col-6'><h2>Quotation Builder</h2></div>
                        <div class='col-6' style='text-align:right'>
                            <table align=right><tr>
                                <td align=center><button type='button' class='btn btn-outline-primary btn-sm' onclick=\"shiftdataV2('quote_creator.php?userid=$userid', 'datatableX')\"><i class='fa fa-plus'></i>&nbsp;&nbsp; Quote</button></td>
                                <td align=center><button type='button' class='btn btn-outline-secondary btn-sm' onclick=\"shiftdataV2('quote_list.php?userid=$userid', 'datatableX')\"><i class='fa fa-eye'></i>&nbsp;&nbsp; Quotes List</button></td>
                            </tr></table>
                        </div>
                    </div>
                    <hr>
                    <div class='data-table-responsive-wrapper' id='datatableX'>Select An Option...</div>
                </div>
            </div>
        </div>
    </div>";
?>

