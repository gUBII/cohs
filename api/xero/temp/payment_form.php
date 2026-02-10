<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Stripe Payment</title>
    <script src="https://js.stripe.com/v3/"></script>
</head>
<body>
    <h2>Pay for Payroll Processing</h2>
    <form id="payment-form">
        <label>Amount (USD):</label>
        <input type="number" id="amount" required>
        <br><br>
        <div id="card-element"></div>
        <br>
        <button type="submit">Pay</button>
    </form>

    <script>
        var stripe = Stripe("pk_test_51R2brdGaoihjfZ4giV9nMNW7n8TXB0fSQXehCo7w1whNw5l3ODBe2kb3ZB2jYTBJLFholvo9ki7zQ0xbvyBiLXkK00DzlavwW9"); // Replace with your Stripe Publishable Key
        var elements = stripe.elements();
        var card = elements.create("card");
        card.mount("#card-element");

        document.getElementById("payment-form").addEventListener("submit", async function(event) {
            event.preventDefault();
            
            const { token, error } = await stripe.createToken(card);
            if (error) {
                alert(error.message);
            } else {
                fetch("charge.php", {
                    method: "POST",
                    headers: { "Content-Type": "application/x-www-form-urlencoded" },
                    body: "token=" + token.id + "&amount=" + document.getElementById("amount").value
                }).then(response => response.text())
                  .then(data => alert(data));
            }
        });
    </script>
</body>
</html>
