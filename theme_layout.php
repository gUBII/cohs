<?php
    include 'authenticator.php';
    include 'head.php';
    include 'nav_bars_blank.php';
    echo"<br><br><br><div id='settings' style='padding:15px'>
        <form name='colorz' method='get' action='setting_processor.php' target='dataprocessor'>
            <input type='hidden' name='processor' value='layoutset'><input type='hidden' url='".$_GET["url"]."'>
            <input type='hidden' id='".$_GET["id"]."'>
            
            <div class='mb-5' id='navcolor'>
                <label class='mb-3 d-inline-block form-label'>Override Nav Palette</label>
                <div class='row d-flex g-3 justify-content-between flex-wrap'>
                    <button class='btn flex-grow-1 option col' data-value='default' data-parent='navcolor' onclick='this.form.submit()'>
                        <div class='card rounded-md p-3 mb-1 no-shadow'>
                            <div class='figure figure-primary top'></div><div class='figure figure-secondary bottom'></div>
                        </div>
                        <div class='text-muted text-part'><span class='text-extra-small align-middle'>DEFAULT</span></div>
                    </button>
                    <button class='btn flex-grow-1 option col' data-value='light' data-parent='navcolor' onclick='this.form.submit()'>
                        <div class='card rounded-md p-3 mb-1 no-shadow'>
                            <div class='figure figure-secondary figure-light top'></div><div class='figure figure-secondary bottom'></div>
                        </div>
                        <div class='text-muted text-part'><span class='text-extra-small align-middle'>LIGHT</span></div>
                    </button>
                    <button class='btn flex-grow-1 option col' data-value='dark' data-parent='navcolor' onclick='this.form.submit()'>
                        <div class='card rounded-md p-3 mb-1 no-shadow'>
                            <div class='figure figure-muted figure-dark top'></div><div class='figure figure-secondary bottom'></div>
                        </div>
                        <div class='text-muted text-part'><span class='text-extra-small align-middle'>DARK</span></div>
                    </button>
                </div>
            </div>
            <div class='mb-5' id='placement'>
                <label class='mb-3 d-inline-block form-label'>Menu Placement</label>
                <div class='row d-flex g-3 justify-content-between flex-wrap'>
                    <button class='btn flex-grow-1 w-50 option col' data-value='horizontal' data-parent='placement' onclick='this.form.submit()'>
                        <div class='card rounded-md p-3 mb-1 no-shadow'>
                            <div class='figure figure-primary top'></div>
                            <div class='figure figure-secondary bottom'></div>
                        </div>
                        <div class='text-muted text-part'><span class='text-extra-small align-middle'>HORIZONTAL</span></div>
                    </button>
                    <button class='btn flex-grow-1 w-50 option col' data-value='vertical' data-parent='placement' onclick='this.form.submit()'>
                        <div class='card rounded-md p-3 mb-1 no-shadow'>
                            <div class='figure figure-primary left'></div><div class='figure figure-secondary right'></div>
                        </div>
                        <div class='text-muted text-part'><span class='text-extra-small align-middle'>VERTICAL</span></div>
                    </button>
                </div>
            </div>
            
            
            <div class='mb-5' id='radius'>
                <label class='mb-3 d-inline-block form-label'>Radius</label>
                <div class='row d-flex g-3 justify-content-between flex-wrap'>
                    <button class='btn flex-grow-1 option col' data-value='rounded' data-parent='radius' onclick='this.form.submit()'>
                        <div class='card rounded-md radius-rounded p-3 mb-1 no-shadow'>
                            <div class='figure figure-primary top'></div><div class='figure figure-secondary bottom'></div>
                        </div>
                        <div class='text-muted text-part'><span class='text-extra-small align-middle'>ROUNDED</span></div>
                    </button>
                    <button class='btn flex-grow-1 option col' data-value='standard' data-parent='radius' onclick='this.form.submit()'>
                        <div class='card rounded-md radius-regular p-3 mb-1 no-shadow'>
                            <div class='figure figure-primary top'></div><div class='figure figure-secondary bottom'></div>
                        </div>
                        <div class='text-muted text-part'><span class='text-extra-small align-middle'>STANDARD</span></div>
                    </button>
                    <button class='btn flex-grow-1 option col' data-value='flat' data-parent='radius' onclick='this.form.submit()'>
                        <div class='card rounded-md radius-flat p-3 mb-1 no-shadow'>
                            <div class='figure figure-primary top'></div><div class='figure figure-secondary bottom'></div>
                        </div>
                        <div class='text-muted text-part'><span class='text-extra-small align-middle'>FLAT</span></div>
                    </button>
                </div>
            </div>
        </form>
    </div>";
    
    include 'scripts.php';
?>
</html>