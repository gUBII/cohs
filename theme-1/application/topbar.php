<?php
    echo"<header class='main-header navbar'>
        <div class='col-search'>
            <form class='searchform'>
                <div class='input-group'>
                    <input list='search_terms' type='text' class='form-control' placeholder='Search term'>
                    <button class='btn btn-light bg' type='button'> <i class='material-icons md-search'></i></button>
                </div>
                <datalist id='search_terms'>
                    <option value='Products'>
                    <option value='New orders'>
                    <option value='Apple iphone'>
                    <option value='Ahmed Hassan'>
                </datalist>
            </form>
        </div>
        <div class='col-nav'>
            <button class='btn btn-icon btn-mobile me-auto' data-trigger='#offcanvas_aside'> <i class='material-icons md-apps'></i> </button>
            <ul class='nav'>
                <li class='nav-item'>
                    <a class='nav-link btn-icon' href='#'><i class='material-icons md-notifications animation-shake'></i><span class='badge rounded-pill'>3</span></a>
                </li>
                <li class='nav-item'><a class='nav-link btn-icon darkmode' href='#'> <i class='material-icons md-nights_stay'></i> </a></li>
                <li class='nav-item'><a href='#' class='requestfullscreen nav-link btn-icon'><i class='material-icons md-cast'></i></a></li>
                <li class='dropdown nav-item'>
                    <a class='dropdown-toggle' data-bs-toggle='dropdown' href='#' id='dropdownLanguage' aria-expanded='false'><i class='material-icons md-public'></i></a>
                    <div class='dropdown-menu dropdown-menu-end' aria-labelledby='dropdownLanguage'>
                        <a class='dropdown-item text-brand' href='#'><img src='assets/imgs/theme/flag-us.png' alt='English'>English</a>
                    </div>
                </li>
                <li class='dropdown nav-item'>
                    <a class='dropdown-toggle' data-bs-toggle='dropdown' href='#' id='dropdownAccount' aria-expanded='false'>";
                        if(strlen($image)>=5) echo"<img class='img-xs rounded-circle' src='$image' alt='$image'>";
                        else echo"<img class='img-xs rounded-circle' src='assets/imgs/people/avatar2.jpg' alt='User'>";
                    echo"</a>
                    <div class='dropdown-menu dropdown-menu-end' aria-labelledby='dropdownAccount'>
                        <a class='dropdown-item' style='cursor: pointer' onclick=\"shiftdataV1('edit_profile', 'datashiftX')\" target='_self'><i class='material-icons md-perm_identity'></i>Edit Profile</a>";
                        if($uactype=="ADMIN") echo"<a class='dropdown-item' style='cursor: pointer' onclick=\"shiftdataV1('account_settings', 'datashiftX')\" target='_self'><i class='material-icons md-settings'></i>Account Settings</a>";
                        echo"<a class='dropdown-item' style='cursor: pointer' onclick=\"shiftdataV1('help_center', 'datashiftX')\" target='_self'><i class='material-icons md-help_outline'></i>Help center</a>
                        <div class='dropdown-divider'></div>
                        <a class='dropdown-item text-danger' href='logout.php'><i class='material-icons md-exit_to_app'></i>Logout</a>
                    </div>
                </li>
            </ul>
        </div>
    </header>";

?>