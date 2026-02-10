<?php

// Replace with your Stripe Secret Key
$stripe_secret_key = "sk_test_51R2brdGaoihjfZ4gb77oTofqcd4HGmaRDPOaSujpjDs5D2hPtAQsDPVqrhROif4mwzpzTuPitqgUl2mDWJnH2W5w00Dfj95scY"; 

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $amount = $_POST["amount"] * 100; // Convert to cents
    $token = $_POST["token"]; // Token from Stripe.js

    // Stripe API request
    $charge_url = "https://api.stripe.com/v1/charges";
    $charge_data = [
        "amount" => $amount,
        "currency" => "usd",
        "source" => $token,
        "description" => "Payroll Processing Payment"
    ];

    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $charge_url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_POST, true);
    curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($charge_data));
    curl_setopt($ch, CURLOPT_HTTPHEADER, [
        "Authorization: Bearer " . $stripe_secret_key
    ]);

    $charge_response = curl_exec($ch);
    curl_close($ch);

    $charge_data = json_decode($charge_response, true);

    if (isset($charge_data["id"])) {
        echo "✅ Payment Successful! Charge ID: " . $charge_data["id"];

        // Redirect to Xero PayRun
        header("Location: run_payrun.php");
        exit;
    } else {
        echo "❌ Payment Failed: " . htmlspecialchars($charge_response);
    }
}
?>
