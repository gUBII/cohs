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
                    <span></span> <a href='#top' style='cursor: pointer' onclick=\"ChangeUrl('index.php?cPath=80000&lid=3'); shiftdatax('product_cart.php?cm=1', 'datashiftX')\" target='_self' title='Shopping Cart'>Shopping Cart</a>
                    <span></span> <a href='#top' style='cursor: pointer' onclick=\"ChangeUrl('index.php?cPath=80000&lid=4'); shiftdatax('product_checkout.php?cm=1', 'datashiftX')\" target='_self' title='Checkout'>Checkout</a>
                </div>
            </div>
        </div>
        <section class='mt-50 mb-50'>
            <div class='container'>
                <div class='row'>
                    <div class='col-md-6'>";
                        if(!isset($_COOKIE["track"])){
                            echo"<div class='toggle_info'>
                                <span><i class='fi-rs-user mr-10'></i><span class='text-muted'>Already have an account?</span> <a href='#loginform' data-bs-toggle='collapse' class='collapsed' aria-expanded='false'>Click here to login</a></span>
                            </div>
                            <div class='panel-collapse collapse login_form' id='loginform'>
                                <div class='panel-body'>
                                    <p class='mb-30 font-sm'>If you have shopped with us before, please enter your details below. If you are a new customer, please proceed to the Billing &amp; Shipping section.</p>
                                    <form name='formuserslogin' action='auth.php' method='post' target='addtocart' style='text-align:left'>
                                        <div class='form-group'><label>Mobile Number</label>
                                            <input type='number' required='' required placeholder='Your Registered Phone Number' value='' name='fphone'>
                                        </div>
                                        <div class='form-group' style='text-align:left'><label>Password</label>
                                            <input required='' type='password' placeholder='Password' minlength='5' required name='fpass'>
                                        </div>    
                                        <div class='login_footer form-group'>
                                            <div class='chek-form'>
                                                <div class='custome-checkbox'>
                                                    <input class='form-check-input' type='checkbox' name='checkbox' id='remember' value=''>
                                                    <label class='form-check-label' for='remember'><span>Remember me</span></label>
                                                </div>
                                            </div>
                                            <a href='#top' class='text-muted' style='cursor: pointer' onclick=\"ChangeUrl('index.php?cPath=90000&vt=6'); shiftdatax('security.php?cPath=90000&vt=6&cm=1', 'datashiftX')\" target='_self' title='Forgot Password'>Forgot password?</a>
                                        </div>
                                        <div class='form-group'>
                                            <input type=hidden name='cPath' value='80000'><input type=hidden name='lid' value='4'>
                                            <button type='submit' class='btn btn-md' name='login' style='background-color:$buttonbc;color:$buttontc'>Log in</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                            <br><br>";
                        }

                        echo"<div class='mb-25'><h4>Billing Details</h4></div>
                        <form method='post'>
                            <div class='row'>
                                <div class='col-md-6'>
                                    <div class='form-group'><input type='text' required='' name='fname' placeholder='First name *'></div>
                                </div>
                                <div class='col-md-6'>
                                    <div class='form-group'><input type='text' required='' name='lname' placeholder='Last name *'></div>
                                </div>
                                <div class='col-md-12'>
                                    <div class='form-group'><input required='' type='text' name='address' placeholder='Address'></div>
                                </div>
                                <div class='col-md-4'>
                                    <div class='form-group'><input required='' type='text' name='city' placeholder='City / Town *'></div>
                                </div>
                                <div class='col-md-4'>
                                    <div class='form-group'><input required='' type='text' name='zipcode' placeholder='Postcode / ZIP *'></div>
                                </div>
                                <div class='col-md-4'>
                                    <div class='form-group'><div class='custom_select'>
                                        <select name='country' class='form-control select-active' style='background-color:white'><option value='BD'>Bangladesh</option></select>
                                    </div></div>
                                </div>
                                <div class='col-md-6'>
                                    <div class='form-group'><input required='' type='text' name='phone' placeholder='Phone *'></div>
                                </div>
                                <div class='col-md-6'>
                                    <div class='form-group'><input required='' type='text' name='email' placeholder='Email address *'></div>
                                </div>
                            </div>";
                            
                            if(!isset($_COOKIE["track"])){
                                $randomnumber=rand(1000000,9999999);
                                echo"<div class='form-group'>
                                    <div class='checkbox'>
                                        <div class='custome-checkbox'>
                                            <input class='form-check-input' type='checkbox' name='checkbox' id='createaccount'>
                                            <label class='form-check-label label_info' data-bs-toggle='collapse' href='#collapsePassword' data-target='#collapsePassword' aria-controls='collapsePassword' for='createaccount'><span>Create an account?</span></label>
                                        </div>
                                    </div>
                                </div>
                                <div id='collapsePassword' class='form-group create-account collapse in'>
                                    <input required='' type='password' placeholder='Password' name='password' value='$randomnumber'>
                                </div>";
                            }

                            echo"<div class='ship_detail'>
                                <div class='form-group'>
                                    <div class='chek-form'>
                                        <div class='custome-checkbox'>
                                            <input class='form-check-input' type='checkbox' name='checkbox' id='differentaddress'>
                                            <label class='form-check-label label_info' data-bs-toggle='collapse' data-target='#collapseAddress' href='#collapseAddress' aria-controls='collapseAddress' for='differentaddress'><span>Ship to a different address?</span></label>
                                        </div>
                                    </div>
                                </div>
                                <div id='collapseAddress' class='different_address collapse in'>
                                    <div class='row'>
                                        <div class='col-md-6'>
                                            <div class='form-group'><input type='text' required='' name='sfname' placeholder='First name *'></div>
                                        </div><div class='col-md-6'>
                                            <div class='form-group'><input type='text' required='' name='slname' placeholder='Last name *'></div>
                                        </div><div class='col-md-12'>
                                            <div class='form-group'><input required='' type='text' name='saddress' placeholder='Shipping Address'></div>
                                        </div><div class='col-md-4'>
                                            <div class='form-group'><input required='' type='text' name='city' placeholder='City / Town *'></div>
                                        </div><div class='col-md-4'>
                                            <div class='form-group'><input required='' type='text' name='zipcode' placeholder='Postcode / ZIP *'></div>
                                        </div><div class='col-md-4'>
                                            <div class='form-group'><div class='custom_select'>
                                                <select class='form-control select-active' name='country style='background-color:white'><option value='Bangladesh'>Bangladesh</option></select>
                                            </div></div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class='mb-20'>
                                <h5>Additional information</h5>
                            </div>
                            <div class='form-group mb-30'>
                                <textarea rows='5' placeholder='Order notes'></textarea>
                            </div>
                        </form>
                    </div>
                    <div class='col-md-6'>
                        <div class='order_review'>
                            <div class='mb-20'><h4>Your Orders</h4></div>
                            
                            <div class='table-responsive order_table text-center'>
                                <table class='table shopping-summery text-center clean'>
                                    <thead>
                                        <tr class='main-heading'>
                                            <th scope='col'>Image</th>
                                            <th scope='col'>Name</th>
                                            <th scope='col'>Price</th>
                                            <th scope='col'>Qty</th>
                                            <th scope='col' colspan='2'>Total</th>                                            
                                        </tr>
                                    </thead>
                                    <tbody id='cartcontainer2'></tbody>                                
                                </table>
                            </div>

                            <div class='bt-1 border-color-1 mt-30 mb-30'></div>
                            <div class='payment_method'>
                                <div class='mb-25'><h5>Payment Terms</h5></div>
                                <div class='payment_option'>
                                    <div class='custome-radio'>
                                        <input class='form-check-input' required='' type='radio' name='payment_option' id='exampleRadios4' checked='' value='SSL'>
                                        <label class='form-check-label' for='exampleRadios4' aria-controls='SSL'>Online Secure Payment (SSL)</label>                                         
                                    </div>
                                    <div class='custome-radio'>
                                        <input class='form-check-input' required='' type='radio' name='payment_option' id='exampleRadios5' checked='' value='COD'>
                                        <label class='form-check-label' for='exampleRadios5' aria-controls='COD'>Cash on Delivery</label>                                        
                                    </div>
                                </div>
                            </div>
                            <a href='#' class='btn btn-fill-out btn-block mt-30' style='background-color:$buttonbc;color:$buttontc'>Place Order</a>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>";
?>