<?php
    echo"<section class='content-main'>
        <div class='content-header'><h2 class='content-title'>Site settings </h2></div>
        <div class='card'>
            <div class='card-body'>
                <div class='row gx-5'>
                    <aside class='col-lg-3 border-end'>
                        <nav class='nav nav-pills flex-lg-column mb-4'>
                            <a class='nav-link active' aria-current='page' style='cursor: pointer' onclick=\"shiftdataV1('account_general', 'datashiftZ')\" target='_self'>General</a>
                            <a class='nav-link' aria-current='page' style='cursor: pointer' onclick=\"shiftdataV1('account_image', 'datashiftZ')\" target='_self'>Image Setting</a>
                            <a class='nav-link' aria-current='page' style='cursor: pointer' onclick=\"shiftdataV1('account_color', 'datashiftZ')\" target='_self'>Color Selection</a>
                            <a class='nav-link' aria-current='page' style='cursor: pointer' onclick=\"shiftdataV1('account_social_links', 'datashiftZ')\" target='_self'>Social Links</a>
                            <a class='nav-link' aria-current='page' style='cursor: pointer' onclick=\"shiftdataV1('account_app_links', 'datashiftZ')\" target='_self'>App Store Link</a>
                            <a class='nav-link' aria-current='page' style='cursor: pointer' onclick=\"shiftdataV1('account_currency', 'datashiftZ')\" target='_self'>Currency Setting</a>
                            <a class='nav-link' aria-current='page' style='cursor: pointer' onclick=\"shiftdataV1('account_access', 'datashiftZ')\" target='_self'>Access Control</a>
                            <a class='nav-link' aria-current='page' style='cursor: pointer' onclick=\"shiftdataV1('account_notice', 'datashiftZ')\" target='_self'>Notice Board</a>
                            <a class='nav-link' aria-current='page' style='cursor: pointer' onclick=\"shiftdataV1('account_email', 'datashiftZ')\" target='_self'>Email Setting</a>
                            <a class='nav-link' aria-current='page' style='cursor: pointer' onclick=\"shiftdataV1('account_ssl', 'datashiftZ')\" target='_self'>Payment API</a>
                        </nav>
                    </aside>
                    <div class='col-lg-9'>
                        <section class='content-body p-xl-4' id='datashiftZ'>";
                            include("account_general.php");
                        echo"</section>
                    </div>
                </div>
            </div>
        </div>
    </section>";
?>