<?php
    include("auth.php");
    echo"<section class='content-main'>
        <div class='row'>
            <div class='col-md-9 content-header'><h2 class='content-title'>ORDERS</h2></div>
            <div class='col-md-3' style='text-align:right'>
                <div class='dropdown'>
                    <a href='#' data-bs-toggle='dropdown' class='btn btn-primary rounded btn-sm font-sm'> Select Option</a>
                    <div class='dropdown-menu'>
                        <a class='dropdown-item ' onclick=\"shiftdataV2('order_list.php?blist=7000', 'datashiftX')\">Order Lists</a>
                        <a class='dropdown-item' onclick=\"shiftdataV2('order_list.php?blist=7001', 'datashiftX')\">New/Pending Orders</a>
                        <a class='dropdown-item' onclick=\"shiftdataV2('order_list.php?blist=7002', 'datashiftX')\">Supplier Department</a>
                        <a class='dropdown-item' onclick=\"shiftdataV2('order_list.php?blist=7003', 'datashiftX')\">QC Department</a>
                        <a class='dropdown-item' onclick=\"shiftdataV2('order_list.php?blist=7004', 'datashiftX')\">Shipping Department</a>
                        <a class='dropdown-item' onclick=\"shiftdataV2('order_list.php?blist=7005', 'datashiftX')\">Closed/Delivered</a>
                        <a class='dropdown-item' onclick=\"shiftdataV2('order_list.php?blist=7006', 'datashiftX')\">Returned</a>
                        <a class='dropdown-item' onclick=\"shiftdataV2('order_list.php?blist=7007', 'datashiftX')\">Cancelled</a>
                        <a class='dropdown-item' onclick=\"shiftdataV2('order_list.php?blist=7008', 'datashiftX')\">Archived</a>
                    </div>
                </div>
            </div>
        </div>
        <div class='card'>
            <div class='card-body'>
                <div class='table-responsive' style='min-height:500px' id='taskset'>";
                
                    include("order_lists.php");
                    
                echo"</div>
            </div>
        </div>
    </section>";
?>