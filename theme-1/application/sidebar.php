<?php
    echo"<aside class='navbar-aside' id='offcanvas_aside'>
        <div class='aside-top'>
            <a href='index.php' class='brand-wrap'><img src='$clogo' class='logo' style='max-width:40px' alt='JML'></a>
            <div><button class='btn btn-icon btn-aside-minimize'> <i class='text-muted material-icons md-menu_open'></i> </button></div>
        </div>
        <nav>
            <ul class='menu-aside'>
                <li class='menu-item active'>
                    <a class='menu-link' href='index.php' style='cursor: pointer' target='_self'> <i class='icon material-icons md-home'></i><span class='text'>Dashboard</span></a>
                </li>
                <li class='menu-item has-submenu'>
                    <a class='menu-link' style='cursor: pointer' onclick=\"shiftdataV1('pages_menu', 'datashiftX')\" target='_self'> <i class='icon material-icons md-article'></i><span class='text'>Pages</span></a>
                    <div class='submenu'>
                        <a href='#top' style='cursor: pointer' onclick=\"shiftdataV1('pages_menu', 'datashiftX')\" target='_self'>Menu</a>
                        <a href='#top' style='cursor: pointer' onclick=\"shiftdataV1('pages_pages', 'datashiftX')\" target='_self'>Pages</a>";
                        // <a href='#top' style='cursor: pointer' onclick=\"shiftdataV1('pages_page_builder', 'datashiftX')\" target='_self'>Page Builder</a>
                        echo"<a href='#top' style='cursor: pointer' onclick=\"shiftdataV1('pages_faq', 'datashiftX')\" target='_self'>FAQ</a>
                        <a href='#top' style='cursor: pointer' onclick=\"shiftdataV1('pages_notice', 'datashiftX')\" target='_self'>Notice Board</a>
                    </div>
                </li>
                
                <li class='menu-item has-submenu'>
                    <a class='menu-link' style='cursor: pointer' onclick=\"shiftdataV1('product_category', 'datashiftX')\" target='_self'> <i class='icon material-icons md-shopping_bag'></i><span class='text'>Products</span></a>
                    <div class='submenu'>
                        <a href='#top' style='cursor: pointer' onclick=\"shiftdataV1('product_category', 'datashiftX')\" target='_self'>Categories</a>
                        <a href='#top' style='cursor: pointer' onclick=\"shiftdataV1('product_add', 'datashiftX')\" target='_self'>Add Product</a>";
                        // <a href='#top' style='cursor: pointer' onclick=\"shiftdataV1('product_manage', 'datashiftX')\" target='_self'>Product List</a>
                        echo"<a href='#top' style='cursor: pointer' onclick=\"shiftdataV1('product_pending', 'datashiftX')\" target='_self'>Pending Products</a>
                        <a href='#top' style='cursor: pointer' onclick=\"shiftdataV1('product_active', 'datashiftX')\" target='_self'>Active Products</a>
                        <a href='#top' style='cursor: pointer' onclick=\"shiftdataV1('product_suspended', 'datashiftX')\" target='_self'>Suspended Products</a>
                        <a href='#top' style='cursor: pointer' onclick=\"shiftdataV1('product_stockless', 'datashiftX')\" target='_self'>Low Stock Products</a>
                        <a href='#top' style='cursor: pointer' onclick=\"shiftdataV1('product_attributes', 'datashiftX')\" target='_self'>Product Attributes</a>
                        <a href='#top' style='cursor: pointer' onclick=\"shiftdataV1('product_attributes_options', 'datashiftX')\" target='_self'>Attributes Options</a>
                    </div>
                </li>
                <li class='menu-item has-submenu'>
                    <a class='menu-link' style='cursor: pointer' onclick=\"shiftdataV1('order_list.php?blist=7000', 'datashiftX')\" target='_self'> <i class='icon material-icons md-shopping_cart'></i><span class='text'>Orders</span></a>
                    <div class='submenu'>
                        <a href='#top' style='cursor: pointer' onclick=\"shiftdataV2('order_list.php?blist=7000', 'datashiftX')\" target='_self'>Order List</a>
                        <a href='#top' style='cursor: pointer' onclick=\"shiftdataV2('order_list.php?blist=7001', 'datashiftX')\" target='_self'>New/Pending Orders</a>
                        <a href='#top' style='cursor: pointer' onclick=\"shiftdataV2('order_list.php?blist=7002', 'datashiftX')\" target='_self'>Supplier Department</a>
                        <a href='#top' style='cursor: pointer' onclick=\"shiftdataV2('order_list.php?blist=7003', 'datashiftX')\" target='_self'>QC Department</a>
                        <a href='#top' style='cursor: pointer' onclick=\"shiftdataV2('order_list.php?blist=7004', 'datashiftX')\" target='_self'>Shipping Department</a>
                        <a href='#top' style='cursor: pointer' onclick=\"shiftdataV2('order_list.php?blist=7005', 'datashiftX')\" target='_self'>Closed/Delivered</a>
                        <a href='#top' style='cursor: pointer' onclick=\"shiftdataV2('order_list.php?blist=7006', 'datashiftX')\" target='_self'>Returned</a>
                        <a href='#top' style='cursor: pointer' onclick=\"shiftdataV2('order_list.php?blist=7007', 'datashiftX')\" target='_self'>Cancelled</a>
                        <a href='#top' style='cursor: pointer' onclick=\"shiftdataV2('order_list.php?blist=7008', 'datashiftX')\" target='_self'>Archived</a>
                        <a href='#top' style='cursor: pointer' onclick=\"shiftdataV1('order_track', 'datashiftX')\" target='_self'>Order tracking</a>
                        <a href='#top' style='cursor: pointer' onclick=\"shiftdataV1('order_print', 'datashiftX')\" target='_self'>Invoice</a>
                    </div>
                </li>
                <li class='menu-item has-submenu'>
                    <a class='menu-link' style='cursor: pointer' onclick=\"shiftdataV1('buyer_list', 'datashiftX')\" target='_self'> <i class='icon material-icons md-person'></i><span class='text'>Buyers</span></a>
                    <div class='submenu'>
                        <a href='#top' style='cursor: pointer' onclick=\"shiftdataV1('buyer_list', 'datashiftX')\" target='_self'>Buyers</a>
                        <a href='#top' style='cursor: pointer' onclick=\"shiftdataV1('buyer_suspended', 'datashiftX')\" target='_self'>Suspended Buyers</a>
                        <a href='#top' style='cursor: pointer' onclick=\"shiftdataV1('buyer_activity_log', 'datashiftX')\" target='_self'>Buyers Activity Logs</a>
                    </div>
                </li>
                <li class='menu-item has-submenu'>
                    <a class='menu-link' style='cursor: pointer' onclick=\"shiftdataV1('seller_list', 'datashiftX')\" target='_self'> <i class='icon material-icons md-store'></i><span class='text'>Sellers</span></a>
                    <div class='submenu'>
                        <a href='#top' style='cursor: pointer' onclick=\"shiftdataV1('seller_list', 'datashiftX')\" target='_self'>Sellers</a>
                        <a href='#top' style='cursor: pointer' onclick=\"shiftdataV1('seller_kyc', 'datashiftX')\" target='_self'>KYC (Verify/Approval)</a>
                        <a href='#top' style='cursor: pointer' onclick=\"shiftdataV1('seller_suspended', 'datashiftX')\" target='_self'>Suspended Sellers</a>
                        <a href='#top' style='cursor: pointer' onclick=\"shiftdataV1('seller_account', 'datashiftX')\" target='_self'>Sellers Accounts</a>
                        <a href='#top' style='cursor: pointer' onclick=\"shiftdataV1('seller_commission', 'datashiftX')\" target='_self'>Sellers Commission</a>
                        <a href='#top' style='cursor: pointer' onclick=\"shiftdataV1('seller_activity_log', 'datashiftX')\" target='_self'>Sellers Activity Log</a>
                    </div>
                </li>
                <li class='menu-item has-submenu'>
                    <a class='menu-link' href='#'> <i class='icon material-icons md-monetization_on'></i><span class='text'>Transactions</span></a>
                    <div class='submenu'>
                        <a href='#top' style='cursor: pointer' onclick=\"shiftdataV1('buysers_list', 'datashiftX')\" target='_self'>Received</a>
                        <a href='#top' style='cursor: pointer' onclick=\"shiftdataV1('buysers_list', 'datashiftX')\" target='_self'>Paid</a>
                        <a href='#top' style='cursor: pointer' onclick=\"shiftdataV1('buysers_list', 'datashiftX')\" target='_self'>Statement</a>
                    </div>
                </li>
                <li class='menu-item has-submenu'>
                    <a class='menu-link' href='#'> <i class='icon material-icons md-monetization_on'></i><span class='text'>Reports</span></a>
                    <div class='submenu'>
                        <a href='#top' style='cursor: pointer' onclick=\"shiftdataV1('report_seller_wise_sells', 'datashiftX')\" target='_self'>Seller Wise Sales</a>
                        <a href='#top' style='cursor: pointer' onclick=\"shiftdataV1('report_keyword_search', 'datashiftX')\" target='_self'>Keyword Search</a>
                        <a href='#top' style='cursor: pointer' onclick=\"shiftdataV1('report_activity_logs', 'datashiftX')\" target='_self'>Activity Logs</a>
                        <a href='#top' style='cursor: pointer' onclick=\"shiftdataV1('report_inhouse_products_sale', 'datashiftX')\" target='_self'>In-House Product Sale</a>
                        <a href='#top' style='cursor: pointer' onclick=\"shiftdataV1('report_product_stock', 'datashiftX')\" target='_self'>Product Stock Report</a>
                        <a href='#top' style='cursor: pointer' onclick=\"shiftdataV1('report_wishlist', 'datashiftX')\" target='_self'>Wish List</a>
                        <a href='#top' style='cursor: pointer' onclick=\"shiftdataV1('report_top_customers', 'datashiftX')\" target='_self'>Wallet Rechange History</a>
                        <a href='#top' style='cursor: pointer' onclick=\"shiftdataV1('report_top_selling_products', 'datashiftX')\" target='_self'>Top Sellers</a>
                        <a href='#top' style='cursor: pointer' onclick=\"shiftdataV1('report_top_customers', 'datashiftX')\" target='_self'>Top Customers</a>
                        <a href='#top' style='cursor: pointer' onclick=\"shiftdataV1('report_top_selling_products', 'datashiftX')\" target='_self'>Top Selling Products</a>
                        <a href='#top' style='cursor: pointer' onclick=\"shiftdataV1('order_list', 'datashiftX')\" target='_self'>Orders</a>
                        <a href='#top' style='cursor: pointer' onclick=\"shiftdataV1('report_product_review', 'datashiftX')\" target='_self'>Product Reviews</a>
                        <a href='#top' style='cursor: pointer' onclick=\"shiftdataV1('report_seller_review', 'datashiftX')\" target='_self'>Seller Reviews</a>
                    </div>
                </li>
                
                <li class='menu-item'>
                    <a href='#top' class='menu-link' style='cursor: pointer' onclick=\"shiftdataV1('brand_list', 'datashiftX')\" target='_self'> <i class='icon material-icons md-code'></i> Brands</a>
                </li>
                <li class='menu-item has-submenu'>
                    <a class='menu-link' style='cursor: pointer' onclick=\"shiftdataV1('pages_blog_category', 'datashiftX')\" target='_self'> <i class='icon material-icons md-rss_feed'></i><span class='text'>Blog</span></a>
                    <div class='submenu'>
                        <a href='#top' style='cursor: pointer' onclick=\"shiftdataV1('pages_blog_category', 'datashiftX')\" target='_self'>Blog Category</a>
                        <a href='#top' style='cursor: pointer' onclick=\"shiftdataV1('pages_blog_list', 'datashiftX')\" target='_self'>Blogs</a>
                    </div>
                </li>
                <li class='menu-item has-submenu'>
                    <a class='menu-link' style='cursor: pointer' onclick=\"shiftdataV1('pages_promo_category', 'datashiftX')\" target='_self'> <i class='icon material-icons md-rss_feed'></i><span class='text'>Promo, Coupons & Vouchers</span></a>
                    <div class='submenu'>
                        <a href='#top' style='cursor: pointer' onclick=\"shiftdataV1('pages_promo_category', 'datashiftX')\" target='_self'>Category</a>
                        <a href='#top' style='cursor: pointer' onclick=\"shiftdataV1('pages_promo_list', 'datashiftX')\" target='_self'>Promo, Coupons & Vouchers</a>
                    </div>
                </li>
                <li class='menu-item has-submenu'>
                    <a class='menu-link' style='cursor: pointer' onclick=\"shiftdataV1('media_slider', 'datashiftX')\" target='_self'> <i class='icon material-icons md-subscriptions'></i><span class='text'>Media</span></a>
                    <div class='submenu'>
                        <a href='#top' style='cursor: pointer' onclick=\"shiftdataV1('media_slider', 'datashiftX')\" target='_self'>Front Sliders</a>
                        <a href='#top' style='cursor: pointer' onclick=\"shiftdataV1('media_banners', 'datashiftX')\" target='_self'>AD Banners</a>
                    </div>
                </li>
                <li class='menu-item'>
                    <a href='#top' class='menu-link' style='cursor: pointer' onclick=\"shiftdataV1('review_list', 'datashiftX')\" target='_self'> <i class='icon material-icons md-comment'></i> Reviews</a>
                </li>
                
                <li class='menu-item'>
                    <a href='#top' class='menu-link' style='cursor: pointer' onclick=\"shiftdataV1('statistics', 'datashiftX')\" target='_self'> <i class='icon material-icons md-pie_chart'></i> Statistics</a>
                </li>
                
            </ul>
            <hr>
            <ul class='menu-aside'>
                <li class='menu-item has-submenu'>
                    <a class='menu-link' style='cursor: pointer' onclick=\"shiftdataV1('user_list', 'datashiftX')\" target='_self'> <i class='icon material-icons md-group'></i><span class='text'>Users</span></a>
                    <div class='submenu'>
                        <a href='#top' style='cursor: pointer' onclick=\"shiftdataV1('user_list', 'datashiftX')\" target='_self'>Users</a>
                        <a href='#top' style='cursor: pointer' onclick=\"shiftdataV1('user_designation', 'datashiftX')\" target='_self'>Designation</a>
                        <a href='#top' style='cursor: pointer' onclick=\"shiftdataV1('user_department', 'datashiftX')\" target='_self'>Department</a>
                        <a href='#top' style='cursor: pointer' onclick=\"shiftdataV1('user_role', 'datashiftX')\" target='_self'>Users Role</a>
                        <a href='#top' style='cursor: pointer' onclick=\"shiftdataV1('user_activity_log', 'datashiftX')\" target='_self'>Users Activity Log</a>
                    </div>
                </li>
            </ul>
            <ul class='menu-aside'>
                <li class='menu-item has-submenu'>
                    <a class='menu-link' href='#' onclick=\"shiftdataV1('account_settings', 'datashiftX')\" target='_self'> <i class='icon material-icons md-settings'></i><span class='text'>Settings</span></a>
                    <div class='submenu'>
                        <a href='#top' aria-current='page' style='cursor: pointer' onclick=\"shiftdataV1('account_general', 'datashiftZ')\" target='_self'>General</a>
                        <a href='#top' style='cursor: pointer' onclick=\"shiftdataV1('account_image', 'datashiftZ')\" target='_self'>Image Setting</a>
                        <a href='#top' style='cursor: pointer' onclick=\"shiftdataV1('account_color', 'datashiftZ')\" target='_self'>Color Selection</a>
                        <a href='#top' style='cursor: pointer' onclick=\"shiftdataV1('account_social_links', 'datashiftZ')\" target='_self'>Social Links</a>
                        <a href='#top' style='cursor: pointer' onclick=\"shiftdataV1('account_app_links', 'datashiftZ')\" target='_self'>App Store Link</a>
                        <a href='#top' style='cursor: pointer' onclick=\"shiftdataV1('account_currency', 'datashiftZ')\" target='_self'>Currency Setting</a>
                        <a href='#top' style='cursor: pointer' onclick=\"shiftdataV1('account_access', 'datashiftZ')\" target='_self'>Access Control</a>
                        <a href='#top' style='cursor: pointer' onclick=\"shiftdataV1('account_notice', 'datashiftZ')\" target='_self'>Notice Board</a>
                        <a href='#top' style='cursor: pointer' onclick=\"shiftdataV1('account_email', 'datashiftZ')\" target='_self'>Email Setting</a>
                        <a href='#top' style='cursor: pointer' onclick=\"shiftdataV1('account_ssl', 'datashiftZ')\" target='_self'>Payment API</a>
                        <hr>
                        <a href='#top' aria-current='page' style='cursor: pointer' onclick=\"shiftdataV1('profile_setting', 'datashiftZ')\" target='_self'>Personal Info.</a>
                        <a href='#top' style='cursor: pointer' onclick=\"shiftdataV1('profile_password', 'datashiftZ')\" target='_self'>Password Update</a>
                        <a href='#top' style='cursor: pointer' onclick=\"shiftdataV1('tasks', 'datashiftZ')\" target='_self'>My Tasks</a>
                        <a href='#top' style='cursor: pointer' onclick=\"shiftdataV1('todo', 'datashiftZ')\" target='_self'>To-Do List</a>
                        <a href='#top' style='cursor: pointer' onclick=\"shiftdataV1('activity', 'datashiftZ')\" target='_self'>My Activity Log</a>
                        

                    </div>
                </li>
                <li class='menu-item'>
                    <a class='menu-link' href='logout.php'> <i class='material-icons md-exit_to_app'></i>&nbsp;&nbsp; <span class='text'> Logout</span></a>
                </li>
            </ul>
            <br><br>
        </nav>
    </aside>";
?>
