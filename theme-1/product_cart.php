<?php
    $ctime=time();
    if(isset($_GET["cm"])) include("authenticatorx.php");    
    
    if(isset($_COOKIE["track"])) $userid=$_COOKIE["track"]; else $userid=$_COOKIE["guestid"];
    
    $comp=0;
    $c1 = "select * from sms_compare where cid='$userid' order by id desc";
    $c11 = $conn->query($c1);
    if ($c11->num_rows > 0) { while($c111 = $c11->fetch_assoc()) { $comp=($comp+1); } }

    echo"<main class='main'>
        <div class='page-header breadcrumb-wrap'>
            <div class='container'>
                <div class='breadcrumb'>
                    <a href='index.php' rel='nofollow'>Home</a>
                    <span></span> <a href='#top' style='cursor: pointer' onclick=\"ChangeUrl('index.php?cPath=4&catid=ALL'); shiftdatax('pd.php?cPath=4&catid=ALL&cm=1#top', 'datashiftX')\" target='_self' title='Shop'>Shop</a>
                    <span></span> <a href='#top' style='cursor: pointer' onclick=\"ChangeUrl('index.php?cPath=80000&lid=3'); shiftdatax('product_cart.php?cm=1', 'datashiftX')\" target='_self' title='Cart'>Cart</a>
                </div>
            </div>
        </div>
        <section class='mt-50 mb-50'>
            <div class='container'>
                <div class='row'>
                    <div class='col-12'>
                        <div class='table-responsive'>
                            <table class='table shopping-summery text-center clean'>
                                <thead>
                                    <tr class='main-heading'>
                                        <th scope='col'>Image</th>
                                        <th scope='col'>Name</th>
                                        <th scope='col'>Price</th>
                                        <th scope='col'>Quantity</th>
                                        <th scope='col'>Subtotal</th>
                                        <th scope='col'>Remove</th>
                                    </tr>
                                </thead>
                                <tbody id='cartcontainer'></tbody>                                
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>";
?>