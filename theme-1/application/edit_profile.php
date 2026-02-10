<?php
    echo"<section class='content-main'>
        <div class='content-header'><h2 class='content-title'>Profile setting </h2></div>
        <div class='card'>
            <div class='card-body'>
                <div class='row gx-5'>
                    <aside class='col-lg-3 border-end'>
                        <nav class='nav nav-pills flex-lg-column mb-4'>
                            <a class='nav-link active' aria-current='page' style='cursor: pointer' onclick=\"shiftdataV1('profile_setting', 'datashiftZ')\" target='_self'>Personal Info.</a>
                            <a class='nav-link' style='cursor: pointer' onclick=\"shiftdataV1('profile_password', 'datashiftZ')\" target='_self'>Password Update</a>
                            <a class='nav-link' style='cursor: pointer' onclick=\"shiftdataV1('tasks', 'datashiftZ')\" target='_self'>My Tasks</a>
                            <a class='nav-link' style='cursor: pointer' onclick=\"shiftdataV1('todo', 'datashiftZ')\" target='_self'>To-Do List</a>
                            <a class='nav-link' style='cursor: pointer' onclick=\"shiftdataV1('activity', 'datashiftZ')\" target='_self'>My Activity Log</a>
                        </nav>
                    </aside>
                    <div class='col-lg-9'>
                        <section class='content-body p-xl-4' id='datashiftZ'>";
                            include("profile_setting.php");
                        echo"</section>
                    </div>
                </div>
            </div>
        </div>
    </section>";

?>