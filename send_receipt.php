<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Get JSON data
    $data = json_decode(file_get_contents('php://input'), true);
    
    $to = $data['email'];
    $subject = "Your Moments with God Order Receipt";
    
    // Create HTML email
    $message = "
    <html>
    <head>
        <style>
            body { font-family: Arial, sans-serif; line-height: 1.6; }
            .container { max-width: 600px; margin: 0 auto; padding: 20px; }
            .header { text-align: center; margin-bottom: 30px; }
            .details { background-color: #f9f9f9; padding: 20px; border-radius: 8px; }
            .book-info { margin-top: 30px; }
            .footer { text-align: center; margin-top: 30px; font-size: 14px; }
        </style>
    </head>
    <body>
        <div class='container'>
            <div class='header'>
                <img src='https://nyengeterai.com/log.png' alt='Logo' style='max-width: 150px;'>
                <h1>Thank You for Your Order!</h1>
            </div>
            
            <div class='details'>
                <h2>Order Details</h2>
                <p><strong>Product:</strong> Moments with God</p>
                <p><strong>Quantity:</strong> {$data['quantity']}</p>
                <p><strong>Total Amount:</strong> ${$data['total']}</p>
            </div>
            
            <div class='book-info'>
                <h2>About Your Purchase</h2>
                <p>The Moments with God prayer journal is your perfect companion for daily devotion. 
                   This guide includes prayer prompts, weekly planners, and space for recording your 
                   spiritual journey.</p>
            </div>
            
            <div class='footer'>
                <p>If you have any questions, please contact us at support@nyengeterai.com</p>
            </div>
        </div>
    </body>
    </html>
    ";
    
    // Email headers
    $headers = "MIME-Version: 1.0\r\n";
    $headers .= "Content-type: text/html; charset=UTF-8\r\n";
    $headers .= "From: Moments Store <noreply@nyengeterai.com>\r\n";
    $headers .= "Reply-To: support@nyengeterai.com\r\n";
    
    // Send email
    mail($to, $subject, $message, $headers);
}
?> 