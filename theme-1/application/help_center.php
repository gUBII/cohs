<?php
    echo"<section class='content-main'>
        <div class='content-header'><h2 class='content-title'>Help Center </h2></div>
        <div class='card'>
            <div class='card-body'>
                <div class='row gx-5'>
                    <aside class='col-lg-3 border-end'>
                        <nav class='nav nav-pills flex-lg-column mb-4'>
                            <a class='nav-link active' aria-current='page' style='cursor: pointer' onclick=\"shiftdataV1('help_general', 'datashiftZ')\" target='_self'>Introduction</a>
                            <a class='nav-link' aria-current='page' style='cursor: pointer' onclick=\"shiftdataV1('help_image', 'datashiftZ')\" target='_self'>Under Construction</a>
                        </nav>
                    </aside>
                    <div class='col-lg-9'>
                        <section class='content-body p-xl-4' id='datashiftZ'>";
                            include("blank.php");
                        echo"</section>
                    </div>
                </div>
            </div>
        </div>
    </section>";
?>