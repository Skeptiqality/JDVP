<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Footer</title>
    <style>
        * {
            font-family: montserrat, sans-serif;
            padding: 0;
            margin: 0;
        }

        /* Footer */
            footer {
                background-color: #84ADEA;
                padding: 40px 80px;
            }

            .footer-section {
                background-color: #84ADEA;
                display: flex;
                flex-wrap: wrap;
                justify-content: space-between;
            }
            
            .logo-holder-footer {
                width: 150px;
                height: 80px;
                background-color: #ffffff;
                border-radius: 50px;
                display: flex;
                align-items: center;
                justify-content: center;
                margin-bottom: 10px;
            } .logo {
                height: 70px;
            }

            .col {
                display: flex;
                flex-direction: column;
                align-items: flex-start;
                margin-bottom: 20px;
            }

            footer h4 {
                font-size: 16px;
                padding-bottom: 18px;
                margin-bottom: 0;
                font-weight: bold;
            }

            footer p {
                font-size: 13px;
                margin: 0px 0px 8px 0px;
            }

            footer a {
                font-size: 13px;
                text-decoration: none;
                color: #222;
                margin-bottom: 10px;
            }

            .col-copyright {
                width: 100%;
                text-align: center;
            }

            .newsletter-email {
                border: 2px solid black;
                border-radius: 15px;
                width: 250px;
                padding: 2px 0 2px 10px;
                font-size: 14px;
            }

            .newsletter-submit {
                border: 2px solid black;
                border-radius: 15px;
                padding: 2px 8px;
                font-size: 14px;
            }

            /* Screen size Responsiveness */

            @media(max-width: 950px) {
                footer {
                padding: 40px 40px;
                }
            }

            @media(max-width: 840px) {
            
            }

            @media(max-width: 750px) {
            
            }
    </style>
</head>
<body>
    <footer>
        <div class="footer-section">
            <div class="col">
                <div class="logo-holder-footer"> <img class="logo" src="pics/logos/market_logo.png"> </div>
                <h4>Contact</h4>
                <p><strong>Address: </strong> 123 ABC Street, Philippines</p>
                <p><strong>Phone: </strong> 0999-999-9999</p>
                <p><strong>Business Hour: </strong> 7:00 - 19:00, Mon - Sat</p>
            </div>

            <div class="col">
                <h4>About</h4>
                <a href="#about-us">About Us</a>
                <a href="#delivery">Delivery</a>
                <a href="#privacy-policy">Privacy Policy</a>
                <a href="#terms-condition">Terms & Conditon</a>
                <a href="#contact-us">Contact Us</a>
            </div>

            <div class="col">
                <h4>Accounts</h4>
                <a href="#sign-up">Sign Up</a>
                <a href="#cart">View Cart</a>
                <a href="#favorites">Favorites</a>
                <a href="#orders">Orders</a>
                <a href="#help">Help</a>
            </div>

            <div class="col">
                <h4>Newsletter</h4>
                <p>Get E-mail updates about our latest items and special offers.</p>
                    <div class="newsletter-signup">
                        <form action="">
                            <input type="email" class="newsletter-email" placeholder="Your email address">
                            <button type="submit" class="newsletter-submit">Sign Up</button>
                        </form>
                    </div>
            </div>
        </div>

        <div class="col-copyright">
            <p>© 2026, Family Supermarket – All rights reserved.</p>
        </div>
    </footer>
</body>
</html>