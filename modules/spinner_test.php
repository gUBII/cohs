<style>
    form{
      text-align: center;
      transition: opacity 0.6s ease-out;
    }
    
    img{
      display: none;
      position: fixed;
      top: 50%;
      left: 50%;
      transform: translate(-50%, -50%);
    }
    .show{
      display: block;
    }
    
    .fade-out{
      opacity: 0;
    }
</style>
<script src="../js/snippet-javascript-console.min.js?v=2"></script>
<?php
    

    echo"<link rel='preconnect' href='https://fonts.gstatic.com' />
    <link href='https://fonts.googleapis.com/css2?family=Nunito+Sans:wght@300;400;700&display=swap' rel='stylesheet' />
    <link href='https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400;700&display=swap' rel='stylesheet' />
    <link rel='stylesheet' href='../font/CS-Interface/style.css' />
    <link rel='stylesheet' href='../css/vendor/bootstrap.min.css' />
    <link rel='stylesheet' href='../css/vendor/OverlayScrollbars.min.css' />
    <link rel='stylesheet' href='../css/vendor/glide.core.min.css' />
    <link rel='stylesheet' href='../css/vendor/introjs.min.css' />
    <link rel='stylesheet' href='../css/vendor/select2.min.css' />
    <link rel='stylesheet' href='../css/vendor/select2-bootstrap4.min.css' />
    <link rel='stylesheet' href='../css/vendor/datatables.min.css' />
    <link rel='stylesheet' href='../css/vendor/plyr.css' />
    <link rel='stylesheet' href='../css/styles.css' />
    <link rel='stylesheet' href='../css/main.css' />        
    <script src='https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js'></script>
    <script src='../js/base/loader.js'></script>";

    echo"<div class='offcanvas-header'>
        <h5 id='offcanvasRightLabel'></h5>
        <button type='button' class='btn-close text-reset' data-bs-dismiss='offcanvas' aria-label='Close'></button>
    </div>
    <div class='offcanvas-body'>
        <form method='post' id='myformz' action='documentsprocessor1.php' target='_self' enctype='multipart/form-data'>
            
                <div class='modal-body'>
                    <div class='row'>
                        <div class='col-12' style='margin-bottom:25px'><div class='form-group'>
                            <label>Document Name *</label>
                            <input name='document_name' type='text' value='' class='form-control' required>
                        </div></div>
                        <div class='col-12' style='margin-bottom:25px'><div class='form-group'>
                            <label>Category Name *</label>
                            
                        </div></div>
                        <div class='col-12' style='margin-bottom:25px'><div class='form-group'>
                            <label>Multiple Document Upload</label>
                            <input type='file' name='images[]' multiple class='form__field__img form-control'>
                        </div></div>
                        
                        <div class='col-12' style='margin-bottom:25px'><div class='form-group'>
                            <label>Card Number (Optional)</label>
                            <input name='card_number' type='text' value='' class='form-control'>
                        </div></div>
                        <div class='col-6' style='margin-bottom:25px'><div class='form-group'>
                            <label>Issue/Expire Dare</label>
                            <input name='expire_date' type='date' value='$cdate' class='form-control' required>
                        </div></div>
                        
                        <div class='col-6' style='margin-bottom:25px'><div class='form-group'>
                            <label>Status *</label> 
                            <select class='form-control m-b ' name='status' required>
                                <option value='ON'>ON</option><option value='OFF'>OFF</option>
                            </select>
                        </div></div>
                    </div>
                </div>
                <div class='modal-footer' class='col-md-12' style='margin-top:15px;padding:5px;border-width:0px'>
                    <button type='button' class='btn btn-outline-primary' data-bs-dismiss='offcanvas' >Close</button>&nbsp;
                    <button class='btn btn-primary' type='submit'>Upload and Save</button>
                </div>
                
                <div class='modal fade modal-close-out' id='closeButtonOutExample' tabindex='-1' role='dialog' aria-labelledby='exampleModalLabelCloseOut' aria-hidden='true'>
                    <div class='modal-dialog'>
                        <div class='modal-content'>
                            <div class='modal-header'>
                                <h5 class='modal-title' id='exampleModalLabelCloseOut'>Updating Documents</h5>
                            </div>
                            <div class='modal-body' style='background-color:white;color:black;height:300px'><center>
                                <br><br><br><br><br><br>Uploading Documents, Please Wait a while...<br><br><br><br><br><br>
                            </div>
                        </div>
                    </div>
                </div>";
            
        echo"</form>
    </div>";
?>
    <img src="../assets/loader.gif" id="spinner" class="hide">
    <script type="text/javascript">
        const form = document.getElementById('myformz');
        const spinner = document.getElementById('spinner');
            
        form.addEventListener('submit', (e) => {
            e.preventDefault();
            form.classList.toggle('fade-out');
            spinner.classList.toggle('show');
        });
    </script>
