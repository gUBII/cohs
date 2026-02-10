<?php
    include("auth.php");
    
    echo"<section class='content-main'>
        <div class='content-header'><h2 class='content-title'>Product List</h2></div>
        <div class='card'>
            <div class='card-body'>
                <hr><div class='row'>
                    <div class='col-md-3'><div class='d-grid'>
                        <a style='cursor: pointer' onclick=\"shiftdataV1('product_pending', 'taskset')\" target='_self'><button class='btn btn-info'>Pending</button></a>
                    </div></div><div class='col-md-3'><div class='d-grid'>
                        <a style='cursor: pointer' onclick=\"shiftdataV1('product_active', 'taskset')\" target='_self'><button class='btn btn-info'>Active</button></a>
                    </div></div><div class='col-md-3'><div class='d-grid'>
                        <a style='cursor: pointer' onclick=\"shiftdataV1('product_suspended', 'taskset')\" target='_self'><button class='btn btn-info'>Suspended</button></a>
                    </div></div><div class='col-md-3'><div class='d-grid'>
                        <a style='cursor: pointer' onclick=\"shiftdataV1('product_stockless', 'taskset')\" target='_self'><button class='btn btn-info'>Out of Stock</button></a>
                    </div></div>
                </div><hr>
                <div class='table-responsive' style='min-height:500px'>
                    <table class='table table-hover'>
                        <thead><tr><th>Name</th><th>Category</th><th>Vendor</th><th>Brand</th><th>Price</th><th>Qty</th><th>Image</th><th class='text-end'>Action</th></tr></thead>
                        <tbody id='taskset'>";
                            include("product_pending.php");
                        echo"</tbody>
                    </table>
                </div>
            </div>
        </div>
    </section>";
?>