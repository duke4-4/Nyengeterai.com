<?php
// Check if required parameters are set
if(isset($_GET['buyer_email']) && isset($_GET['quantity']) && isset($_GET['name']) && isset($_GET['amt'])) {
    $to = $_GET['buyer_email'];
    $quantity = $_GET['quantity'];
    $amt = $_GET['amt'];
    $name = $_GET['name'];
    $product = isset($_GET['product']) ? $_GET['product'] : 'book';
    
    if($product == 'ticket') {
        $subject = "Your High Tea Launch Ticket Confirmation";
        
        // Create HTML email for ticket
        $message = "
        <html>
        <head>
            <style>
                body { font-family: Arial, sans-serif; line-height: 1.6; }
                .container { max-width: 600px; margin: 0 auto; padding: 20px; }
                .header { text-align: center; margin-bottom: 30px; }
                .details { background-color: #f9f9f9; padding: 20px; border-radius: 8px; }
                .event-info { margin-top: 30px; }
                .footer { text-align: center; margin-top: 30px; font-size: 14px; }
            </style>
        </head>
        <body>
            <div class='container'>
                <div class='header'>
                    <img src='https://nyengeterai.com/Website_Mockup-01.jpg' alt='Logo' style='max-width: 150px;'>
                    <h1>Thank You {$name} for Your Ticket Purchase!</h1>
                </div>
                
                <div class='details'>
                    <h2>Ticket Details</h2>
                    <p><strong>Event:</strong> Moments with God Journal High Tea Launch</p>
                    <p><strong>Quantity:</strong> {$quantity}</p>
                    <p><strong>Total Amount:</strong> ${$amt}</p>
                </div>
                
                <div class='event-info'>
                    <h2>Event Information</h2>
                    <p><strong>Date:</strong> December 14, 2024</p>
                    <p><strong>Time:</strong> 2:30 PM</p>
                    <p><strong>Location:</strong> Coco Mia Garden Cafe - Chisipite</p>
                    <p><strong>Dress Code:</strong> White with a touch of yellow</p>
                </div>
                
                <div class='footer'>
                    <p>If you have any questions, please contact us at moments@nyengeterai.com</p>
                </div>
            </div>
        </body>
        </html>
        ";
    } else {
        $subject = "Your Moments with God Order Receipt";
        
        // Create HTML email for book
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
                    <img src='https://nyengeterai.com/Website_Mockup-01.jpg' alt='Logo' style='max-width: 150px;'>
                    <h1>Thank You {$name} for Your Order!</h1>
                </div>
                
                <div class='details'>
                    <h2>Order Details</h2>
                    <p><strong>Product:</strong> Moments with God</p>
                    <p><strong>Quantity:</strong> {$quantity}</p>
                    <p><strong>Total Amount:</strong> ${$amt}</p>
                </div>
                
                <div class='book-info'>
                    <h2>About Your Purchase</h2>
                    <p>The Moments with God prayer journal is your perfect companion for daily devotion. 
                       This guide includes prayer prompts, weekly planners, and space for recording your 
                       spiritual journey.</p>
                </div>
                
                <div class='footer'>
                    <p>If you have any questions, please contact us at moments@nyengeterai.com</p>
                </div>
            </div>
        </body>
        </html>
        ";
    }
    
    // Email headers
    $headers = "MIME-Version: 1.0\r\n";
    $headers .= "Content-type: text/html; charset=UTF-8\r\n";
    $headers .= "From: moments@nyengeterai.com\r\n";
    $headers .= "Reply-To: moments@nyengeterai.com\r\n";
    
    // Send email
    mail($to, $subject, $message, $headers);
}

// Start HTML output
$pageTitle = "Thank You - Moments with God";
$styles = [
    "w3.css",
    "index.css",
    "https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css",
    "https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400;500;600;700&display=swap"
];

?>
<!DOCTYPE html>
<html>
<head>
    <title><?php echo $pageTitle; ?></title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php foreach($styles as $style): ?>
        <link rel="stylesheet" href="<?php echo $style; ?>">
    <?php endforeach; ?>
    <link rel="icon" type="image/png" href="fav.png">
</head>
<body class="bg-gray-50 font-['Montserrat']">
    <div class="min-h-screen flex items-center justify-center px-4">
        <div class="max-w-4xl w-full bg-white rounded-lg shadow-xl overflow-hidden">
            <div class="flex flex-col md:flex-row">
                <!-- Image Section -->
                <div class="md:w-1/2">
                    <img src="MOG.jpeg" alt="Moments with God Book" class="w-full h-full object-cover">
                </div>

                <!-- Content Section -->
                <div class="md:w-1/2 p-8">
                    <div class="text-center mb-8">
                        <img src="log.png" alt="Logo" class="h-12 mx-auto mb-4">
                        <!-- personalised thank you -->
                        <h2 class="text-3xl font-bold text-gray-800 mb-2">Thank You <?php echo $name; ?>!</h2>
                        <p class="text-gray-600">Your order has been confirmed</p>
                    </div>

                    <div class="text-center mb-8">
                        <p class="text-gray-600 mb-4">A detailed receipt has been sent to your email.</p>
                        <div class="bg-yellow-50 p-4 rounded-lg">
                            <h4 class="font-semibold mb-2">Book Description</h4>
                            <p class="text-sm text-gray-600"><?php echo "The Moments with God prayer journal is your guide to creating a meaningful daily practice of prayer, complete with prompts and planners for your spiritual journey."; ?></p>
                        </div>
                        <!-- Added Check Email Button -->
                        <a href="mailto:<?php echo $to; ?>" 
                           style="background-color: rgb(214,185,59);" 
                           class="inline-block w-full py-2 mt-4 rounded-lg text-black font-medium hover:opacity-90 transition-opacity text-center">
                            Check Your Email
                        </a>
                    </div>

                    <!-- Newsletter Signup -->
                    <div class="text-center">
                        <h3 class="font-semibold mb-4">Stay Connected</h3>
                        <p class="text-gray-600 mb-4">Join our newsletter for spiritual insights and updates</p>
                        <form action="insert.php" method="POST" class="space-y-4">
                            <input type="email" name="email" placeholder="Enter your email" 
                                   class="w-full px-4 py-2 border rounded-lg focus:ring-2 focus:ring-yellow-400 focus:border-transparent"
                                   required>
                            <button type="submit" 
                                    style="background-color: rgb(214,185,59);" 
                                    class="w-full py-2 rounded-lg text-black font-medium hover:opacity-90 transition-opacity">
                                Subscribe
                            </button>
                            <button type="submit" 
                                    style="background-color: rgb(214,185,59);" 
                                    class="w-full py-2 rounded-lg text-black font-medium hover:opacity-90 transition-opacity">
                              <a href="https://nyengeterai.com/preorder.html">Back to Pre-Order</a>
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
