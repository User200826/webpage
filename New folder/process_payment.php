<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Payment Processing</title>
    <style>
        /* Basic styling for the body */
        body {
            font-family: Arial, sans-serif;
            background-color: #f9f9f9;
            margin: 0;
            padding: 0;
            text-align: center;
        }

        /* Container styling */
        .container {
            max-width: 600px;
            margin: 50px auto;
            padding: 20px;
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        /* Heading styling */
        h1 {
            color: #333;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Payment Processing</h1>
        <?php
            // Process the payment here
            // You can retrieve payment status from a database or any other source
            // For demonstration purposes, let's assume the payment is successful
            



if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['payment_option'])) {
    // Get form data
    $name = isset($_POST['name']) ? $_POST['name'] : '';
    $email = isset($_POST['email']) ? $_POST['email'] : '';
    $address = isset($_POST['address']) ? $_POST['address'] : '';

    // You can process the selected payment option here if needed
    $selected_option = $_POST['payment_option'];
    switch ($selected_option) {
        case 'googlepay':
            $redirect_url = "https://pay.google.com";
            break;
        case 'phonepe':
            $redirect_url = "https://www.phonepe.com";
            break;
        case 'upi':
            $redirect_url = "https://your-upi-payment-url";
            break;
        case 'netbanking':
            $redirect_url = "https://your-netbanking-url";
            break;
        case 'cashondelivery':
            $redirect_url = "https://your-cash-on-delivery-url";
            break;
        default:
            // Redirect to payment form if no valid option is selected
            $redirect_url = "payment_form.html";
            break;
    }
    // Append form data to the redirect URL query string
    $redirect_url .= "?name=" . urlencode($name) . "&email=" . urlencode($email) . "&address=" . urlencode($address);

    // Redirect user to the payment page with form data
    header("Location: $redirect_url");
    exit;
} else {
    // Redirect user back to the payment form if no option is selected
    header("Location: payment_form.html");
    exit;
}

$payment_status = "success";

if ($payment_status === "success") {
    echo "<p>Your payment was successful. Thank you!</p>";
} else {
    echo "<p>Sorry, there was an error processing your payment. Please try again later.</p>";
}
?>
</div>
</body>
</html>