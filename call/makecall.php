<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Make Call - Nexis365</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css">
    <style>
        .circle-icon {
            width: 80px;
            height: 80px;
            background-color: #28a745;
            border-radius: 50%;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            font-size: 35px;
            color: #fff;
            margin: 10px;
        }
        .calling-section {
            display: none;
            margin-top: 20px;
        }
    </style>
</head>

<body>

<div class="container text-center mt-5">
    <h2 class="mb-4">Nexis365 Calling System</h2>

    <!-- Call Icons -->
    <div class="mb-4">
        <span class="circle-icon">
            <i class="fa fa-phone"></i>
        </span>

        <span class="mx-4">
            <i class="fa fa-phone-volume fa-3x text-success"></i>
        </span>

        <span class="circle-icon">
            <i class="fa fa-phone"></i>
        </span>
    </div>

    <!-- Destination Number Input -->
    <div class="mb-3">
        <input type="text" id="toNumber" class="form-control text-center" placeholder="Enter Destination Number"
               value="+8801707938108" required>
    </div>

    <!-- Call Button -->
    <div class="mb-4">
        <button id="callBtn" class="btn btn-success btn-lg">Call</button>
    </div>

    <!-- Calling Animation -->
    <div class="calling-section" id="callingSection">
        <img src="calling.gif" alt="Calling..." width="120">
        <h4 class="mt-3">Calling to <span id="showNumber"></span> ...</h4>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
<script src="https://use.fontawesome.com/releases/v5.8.1/js/all.js"></script>

<script>
    $('#callBtn').click(function () {
        var toNumber = $('#toNumber').val();

        if (toNumber === '') {
            alert('Please enter a number');
            return false;
        }

        $('#callBtn').hide();
        $('#showNumber').text(toNumber);
        $('#callingSection').show();

        $.ajax({
            url: 'make_call.php',
            method: 'POST',
            data: {toNumber: toNumber},
            success: function (response) {
                console.log('Call Triggered');
                console.log(response);
            },
            error: function () {
                alert('Failed to make call.');
            }
        });
    });
</script>

</body>
</html>
