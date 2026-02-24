<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Supermarket | Contact Us</title>
    <link rel="icon" type="image/x-icon" href="pics/logos/market-logo2.png">
    <link rel="stylesheet" href="assets/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    
    <?php include 'include/header.php'?>

    <main>
        <h1 align="center" style="margin: 20px 0 5px 0;">Contact Us</h1>

        <section class="content">
            <div class="opinion">
                <h1>We Value Your Feedback!</h1>
                <p class="description">
                We’re thrilled to hear that our product/service worked exceptionally well for your needs.
                Your positive feedback means a lot to us, and we’ll continue to strive for excellence in everything we do.
                <br><br>
                Thanks again for your support, and we look forward to serving you in the future!
                Consolidate your experience by sharing your thoughts with us below.
                </p>
            </div>

            <div class="contact-form">
                <form action="contact-action.php" method="post">
                        <div class="form-field">
                            <label for="customer_name"><strong>Customer's Name</strong></label>
                            <input type="text" name="customer_name" id="customer_name" required>
                        </div>

                        <div class="form-field">
                            <label for="customer_email"><strong>Email Address</strong></label>
                            <input type="email" name="customer_email" id="customer_email" required>
                        </div>

                        <div class="form-field">
                            <label for="customer_mobile"><strong>Mobile Number</strong></label>
                            <input type="text" name="customer_mobile" id="customer_mobile">
                        </div>

                        <div class="form-field">
                            <label for="customer_feedback"><strong>Feedback</strong></label>
                            <textarea name="customer_feedback" id="customer_feedback" rows="5" cols="30"></textarea>
                        </div>

                        <input type="submit" value="Submit Feedback" name="submit-feedback">
                </form>
            </div>
        </section>
        
    </main>

    <?php include 'include/footer.php'?>

</body>
</html>