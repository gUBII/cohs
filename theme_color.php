<?php
    include 'authenticator.php';
    include 'head.php';
    include 'nav_bars_blank.php';
    echo"<br><br><Br><br><div id='settings'>
        <form name='colorz' method='get' action='setting_processor.php' target='dataprocessor'>
            <input type='hidden' name='processor' value='colorset'><input type='hidden' url='".$_GET["url"]."'>
            <input type='hidden' id='".$_GET["id"]."'>
            
            <div class='row d-flex g-3 justify-content-between flex-wrap mb-3'>
                <button class='btn flex-grow-1 option col' data-value='light-blue' data-parent='color' onclick='this.form.submit()'>
                    <div class='rounded-md no-shadow color'><div class='blue-light'></div></div>
                    <div class='text-muted text-part'><span class='text-extra-small align-middle'>LIGHT BLUE</span></div>
                </button>
                <button class='btn flex-grow-1 option col' data-value='dark-blue' data-parent='color' onclick='this.form.submit()'>
                    <div class='rounded-md no-shadow color'><div class='blue-dark'></div></div>
                    <div class='text-muted text-part'><span class='text-extra-small align-middle'>DARK BLUE</span></div>
                </button>
                <button class='btn flex-grow-1 option col' data-value='light-teal' data-parent='color' onclick='this.form.submit()'>
                    <div class='rounded-md no-shadow color'><div class='teal-light'></div></div>
                    <div class='text-muted text-part'><span class='text-extra-small align-middle'>LIGHT TEAL</span></div>
                </button>
                <button class='btn flex-grow-1 option col' data-value='dark-teal' data-parent='color' onclick='this.form.submit()'>
                    <div class='rounded-md no-shadow color'><div class='teal-dark'></div></div>
                    <div class='text-muted text-part'><span class='text-extra-small align-middle'>DARK TEAL</span></div>
                </button>
            </div>
            <div class='row d-flex g-3 justify-content-between flex-wrap mb-3'>
                <button class='btn flex-grow-1 option col' data-value='light-sky' data-parent='color' onclick='this.form.submit()'>
                    <div class='rounded-md no-shadow color'><div class='sky-light'></div></div>
                    <div class='text-muted text-part'><span class='text-extra-small align-middle'>LIGHT SKY</span></div>
                </button>
                <button class='btn flex-grow-1 option col' data-value='dark-sky' data-parent='color' onclick='this.form.submit()'>
                    <div class='rounded-md no-shadow color'><div class='sky-dark'></div></div>
                    <div class='text-muted text-part'><span class='text-extra-small align-middle'>DARK SKY</span></div>
                </button>
                <button class='btn flex-grow-1 option col' data-value='light-red' data-parent='color' onclick='this.form.submit()'>
                    <div class='rounded-md no-shadow color'><div class='red-light'></div></div>
                    <div class='text-muted text-part'><span class='text-extra-small align-middle'>LIGHT RED</span></div>
                </button>
                <button class='btn flex-grow-1 option col' data-value='dark-red' data-parent='color' onclick='this.form.submit()'>
                    <div class='rounded-md no-shadow color'><div class='red-dark'></div></div>
                    <div class='text-muted text-part'><span class='text-extra-small align-middle'>DARK RED</span></div>
                </button>
            </div>
            <div class='row d-flex g-3 justify-content-between flex-wrap mb-3'>
                <button class='btn flex-grow-1 option col' data-value='light-green' data-parent='color' onclick='this.form.submit()'>
                    <div class='rounded-md no-shadow color'><div class='green-light'></div></div>
                    <div class='text-muted text-part'><span class='text-extra-small align-middle'>LIGHT GREEN</span></div>
                </button>
                <button class='btn flex-grow-1 option col' data-value='dark-green' data-parent='color' onclick='this.form.submit()'>
                    <div class='rounded-md no-shadow color'><div class='green-dark'></div></div>
                    <div class='text-muted text-part'><span class='text-extra-small align-middle'>DARK GREEN</span></div>
                </button>
                <button class='btn flex-grow-1 option col' data-value='light-lime' data-parent='color' onclick='this.form.submit()'>
                    <div class='rounded-md no-shadow color'><div class='lime-light'></div></div>
                    <div class='text-muted text-part'><span class='text-extra-small align-middle'>LIGHT LIME</span></div>
                </button>
                <button class='btn flex-grow-1 option col' data-value='dark-lime' data-parent='color' onclick='this.form.submit()'>
                    <div class='rounded-md no-shadow color'><div class='lime-dark'></div></div>
                    <div class='text-muted text-part'><span class='text-extra-small align-middle'>DARK LIME</span></div>
                </button>
            </div>
            <div class='row d-flex g-3 justify-content-between flex-wrap mb-3'>
                <button class='btn flex-grow-1 option col' data-value='light-pink' data-parent='color' onclick='this.form.submit()'>
                    <div class='rounded-md no-shadow color'><div class='pink-light'></div></div>
                    <div class='text-muted text-part'><span class='text-extra-small align-middle'>LIGHT PINK</span></div>
                </button>
                <button class='btn flex-grow-1 option col' data-value='dark-pink' data-parent='color' onclick='this.form.submit()'>
                    <div class='rounded-md no-shadow color'><div class='pink-dark'></div></div>
                    <div class='text-muted text-part'><span class='text-extra-small align-middle'>DARK PINK</span></div>
                </button>
                <button class='btn flex-grow-1 option col' data-value='light-purple' data-parent='color' onclick='this.form.submit()'>
                    <div class='rounded-md no-shadow color'><div class='purple-light'></div></div>
                    <div class='text-muted text-part'><span class='text-extra-small align-middle'>LIGHT PURPLE</span></div>
                </button>
                <button class='btn flex-grow-1 option col' data-value='dark-purple' data-parent='color' onclick='this.form.submit()'>
                    <div class='rounded-md no-shadow color'><div class='purple-dark'></div></div>
                    <div class='text-muted text-part'><span class='text-extra-small align-middle'>DARK PURPLE</span></div>
                </button>
            </div>
        </form>
    </div>";
    
    include 'scripts.php';
?>
</html>