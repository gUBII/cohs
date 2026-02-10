<?php
    echo"<br><h4>Company Initial Settings</h4>
    <div class='row'>
        <div class='col-12'><br>";
            $s1 = "select * from companysetting where id='1' order by id asc limit 1";
            $r1 = $conn->query($s1);
            if ($r1->num_rows > 0) { while($t1 = $r1->fetch_assoc()) {
                echo"<fieldset>
                    <div class='row'>
                        <div class='col-lg-4' style='margin-bottom:15px;text-align:center'>
                            <form name='form1' method='post' action='setting_processor.php' target='dataprocessor' enctype='multipart/form-data' id='loginForm'>
                                <input type='hidden' name='processor' value='edit_s1x'><input type='hidden' name='id' value='1'>
                                <div class='form-group'>
                                    <label>Logo Dark</label>
                                    <input type='file' name='images1[]' multiple class='form__field__img form-control' onchange='this.form.submit()'>
                                </div>
                            </form>
                        </div>
                        <div class='col-lg-4' style='margin-bottom:15px;text-align:center'>
                            <form name='form2' method='post' action='setting_processor.php' target='dataprocessor' enctype='multipart/form-data' id='loginForm'>
                                <input type='hidden' name='processor' value='edit_s2x'><input type='hidden' name='id' value='1'>
                                <div class='form-group'>
                                    <label>Logo Light</label>
                                    <input type='file' name='images2[]' multiple class='form__field__img form-control' onchange='this.form.submit()'>
                                </div>
                            </form>
                        </div>
                        <div class='col-lg-4' style='margin-bottom:15px;text-align:center'>
                            <form name='form3' method='post' action='setting_processor.php' target='dataprocessor' enctype='multipart/form-data' id='loginForm'>
                                <input type='hidden' name='processor' value='edit_s3x'><input type='hidden' name='id' value='1'>
                                <div class='form-group'>
                                    <label>Favicon Icon</label>
                                    <input type='file' name='images3[]' multiple class='form__field__img form-control' onchange='this.form.submit()'>
                                </div>
                            </form>
                        </div>
                        <div class='col-lg-6' style='margin-bottom:15px;text-align:center'>
                            <form name='form4' method='post' action='setting_processor.php' target='dataprocessor' enctype='multipart/form-data' id='loginForm'>
                                <input type='hidden' name='processor' value='edit_s4x'><input type='hidden' name='id' value='1'>
                                <div class='form-group'>
                                    <label>Company Title</label>
                                    <input name='brand_title' type='text' value='".$t1["brand_title"]."' class='form-control' required onchange='this.form.submit()' onblur=\"shiftdataV2('walkthrough_data.php?pointer=60', 'datatableXYZ')\">
                                </div>
                            </form>
                        </div>
                        <div class='col-lg-6' style='margin-bottom:15px;text-align:center'>
                            <form name='form5' method='post' action='setting_processor.php' target='dataprocessor' enctype='multipart/form-data' id='loginForm'>
                                <input type='hidden' name='processor' value='edit_s5x'><input type='hidden' name='id' value='1'>
                                <div class='form-group'>
                                    <label>Copyright Title</label>
                                    <input name='copyright_title' type='text' value='".$t1["copyright_title"]."' class='form-control' required onchange='this.form.submit()' onblur=\"shiftdataV2('walkthrough_data.php?pointer=60', 'datatableXYZ')\">
                                </div>
                            </form>
                        </div>
                    </div>
                </fieldset>";
            } }
        echo"</div>
    </div>";
                        
?>