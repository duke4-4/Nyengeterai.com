<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve POST data
    $name = htmlspecialchars($_POST["name"]);
    $email = htmlspecialchars($_POST["email"]);
    $quantity = intval($_POST["quantity"]);
    $amt = floatval($_POST["amt"]);

    // Include Paynow SDK
    require_once('Paynow-PHP-SDK-master/autoloader.php');

    $paynow = new Paynow\Payments\Paynow(
        '18706', 
        '13b27f2b-3980-4607-9deb-1af378656eb6',
        "https://nyengeterai.com/smsticket.html",
        "https://nyengeterai.com/smsticket.html"
    );

    $payment = $paynow->createPayment('Book Pre-order', $email);
    $payment->add('Moments with God Book', $amt);

    $response = $paynow->send($payment);

    if ($response->success()) {
        $link = $response->redirectUrl();
        $pollUrl = $response->pollUrl();

        // Construct email
        $subject = "Pre-order Confirmation - Moments with God";
        $message = "Dear $name,\n\n";
        $message .= "Thank you for pre-ordering 'Moments with God'!\n";
        $message .= "Order Details:\n";
        $message .= "Quantity: $quantity\n";
        $message .= "Amount Paid: $ $amt\n";
        $message .= "Transaction Reference: " . $payment->reference . "\n\n";
        $message .= "We will notify you once the book is ready.\n\n";
        $message .= "Best regards,\nNyengeterai";

        // Email headers
        $headers = "From: moments@nyengeterai.com\r\n";
        $headers .= "Reply-To: moments@nyengeterai.com\r\n";
        $headers .= "Content-Type: text/plain; charset=UTF-8\r\n";

        // Send email
        if (mail($email, $subject, $message, $headers)) {
            echo "Email sent successfully!";
        } else {
            echo "Failed to send email.";
        }

        // Redirect to payment link
        header("Location: $link");
        exit;
    } else {
        echo "Payment initialization failed!";
    }
}
?>
