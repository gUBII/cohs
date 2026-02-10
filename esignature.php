<?php
// index.php (fixed)
$pid           = htmlspecialchars($_GET['pid'] ?? '', ENT_QUOTES, 'UTF-8');
$clientid      = htmlspecialchars($_GET['clientid'] ?? '', ENT_QUOTES, 'UTF-8');
$signatureType = htmlspecialchars($_GET['signature'] ?? '', ENT_QUOTES, 'UTF-8');
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Digital Signature Form</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet">
        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
        <style>
            .signature-wrap{border:1px solid #ced4da;border-radius:.25rem;position:relative;user-select:none;background:#fff}
            #signatureCanvas{width:100%;height:280px;display:block;touch-action:none}
            .signature-tools{position:absolute;top:.5rem;right:.5rem;gap:.5rem}
            .signature-tools .btn{padding:.15rem .5rem;font-size:.8rem}
            .canvas-placeholder{position:absolute;left:50%;top:50%;transform:translate(-50%,-50%);color:#999;pointer-events:none}
        </style>
    </head>
    
    <body class="bg-light">
        
        <form id="sigForm" autocomplete="off"><center>
            <div class="mb-3" style='width:90%'>
                <div class="signature-wrap">
                    <canvas id="signatureCanvas"></canvas>
                    <div class="signature-tools d-flex"><button type="button" id="clearCanvas" class="btn btn-outline-secondary">Clear</button></div>
                    <div class="canvas-placeholder">Sign here</div>
                </div>
                <input type="hidden" name="signature_data" id="signature_data">
                <input type="hidden" name="pid" id="signature_pid" value="<?php echo $pid; ?>">
                <input type="hidden" name="clientid" id="signature_clientid" value="<?php echo $clientid; ?>">
                <input type="hidden" name="signature" id="signature_type" value="<?php echo $signatureType; ?>">
            </div>
            
            <div class="d-grid" style='width:90%'>
                <div id="result" class="alert mt-3 d-none" role="alert"></div>
                <button type="submit" class="btn btn-primary" id="submitBtn">Save Signature</button>
            </div>
        </form>
        
        <script>
            (function(){
                const canvas = document.getElementById('signatureCanvas');
                const placeholder = document.querySelector('.canvas-placeholder');
                const ctx = canvas.getContext('2d');
                let drawing = false, lastX = 0, lastY = 0, hasInk = false;
        
                // Hi-DPI aware resize (matches CSS size exactly)
                function resizeCanvas(){
                    const rect = canvas.getBoundingClientRect();
                    const dpr = window.devicePixelRatio || 1;
        
                    // preserve current content while resizing
                    const temp = document.createElement('canvas');
                    temp.width = canvas.width;
                    temp.height = canvas.height;
                    temp.getContext('2d').drawImage(canvas, 0, 0);
        
                    canvas.width = Math.floor(rect.width * dpr);
                    canvas.height = Math.floor(rect.height * dpr);
                    ctx.setTransform(dpr, 0, 0, dpr, 0, 0);
        
                    ctx.lineWidth = 2;
                    ctx.lineCap = 'round';
                    ctx.lineJoin = 'round';
                    ctx.strokeStyle = '#000';
        
                    // redraw preserved content scaled to new size
                    ctx.drawImage(temp, 0, 0, temp.width / dpr, temp.height / dpr);
                }
        
                function pos(e){
                    const r = canvas.getBoundingClientRect();
                    if (e.touches && e.touches.length) {
                        return {x: e.touches[0].clientX - r.left, y: e.touches[0].clientY - r.top};
                    }
                    return {x: e.clientX - r.left, y: e.clientY - r.top};
                }
        
                function start(e){
                    e.preventDefault();
                    drawing = true;
                    hasInk = true;
                    placeholder.style.display = 'none';
                    const p = pos(e);
                    lastX = p.x; lastY = p.y;
                }
        
                function move(e){
                    if (!drawing) return;
                    e.preventDefault();
                    const p = pos(e);
                    ctx.beginPath();
                    ctx.moveTo(lastX,lastY);
                    ctx.lineTo(p.x,p.y);
                    ctx.stroke();
                    lastX = p.x; lastY = p.y;
                }
        
                function end(){ drawing = false; }
        
                function clear(){
                    ctx.clearRect(0,0,canvas.width,canvas.height);
                    hasInk = false;
                    placeholder.style.display = '';
                }
        
                window.addEventListener('resize', resizeCanvas);
                resizeCanvas();
        
                canvas.addEventListener('mousedown', start);
                canvas.addEventListener('mousemove', move);
                canvas.addEventListener('mouseup', end);
                canvas.addEventListener('mouseleave', end);
        
                canvas.addEventListener('touchstart', start, {passive:false});
                canvas.addEventListener('touchmove', move, {passive:false});
                canvas.addEventListener('touchend', end);
        
                $('#clearCanvas').on('click', clear);
        
                $('#sigForm').on('submit', function(e){
                    e.preventDefault();
        
                    if (!hasInk){
                        showMsg('Please provide your signature.', 'warning');
                        return;
                    }
        
                    const dataURL = canvas.toDataURL('image/png');
                    $('#signature_data').val(dataURL);
        
                    $('#submitBtn').prop('disabled', true).text('Saving...');
                    $.ajax({
                        url: 'esignaturesave.php',
                        method: 'POST',
                        data: $(this).serialize(),
                        dataType: 'json'
                    }).done(function(res){
                        if (res && res.success){
                            showMsg('Saved successfully. Reference ID: ' + (res.id ?? ''), 'success');
                            clear(); // keep hidden fields intact
                        } else {
                            showMsg((res && res.message) ? res.message : 'Failed to save.', 'danger');
                        }
                    }).fail(function(){
                        showMsg('Server error.', 'danger');
                    }).always(function(){
                        $('#submitBtn').prop('disabled', false).text('Save Signature');
                    });
                });
        
                function showMsg(msg, type){
                    $('#result')
                    .removeClass('d-none alert-success alert-danger alert-warning')
                    .addClass('alert-' + type)
                    .text(msg);
                }
            })();
        </script>
    </body>
</html>
