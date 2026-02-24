<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Header</title>
    <link rel="stylesheet" href="assets/dist/css/bootstrap.min.css">
    <link rel="icon" type="image/x-icon" href="pics/logos/market-logo2.png">
    <style>
        @import url("https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400;500;600;700&display=swap");

        * {
            font-family: montserrat, sans-serif;
        }

        /* Navbar */
        header {
            z-index: 998;
            position: sticky;
            top: 0;
        }

        .navbar {
            padding: 0px 80px;
            background-color: #84ADEA;
            width: 100%;
            height: 100px;
        }

        .logo-holder {
            width: 150px;
            height: 80px;
            background-color: #ffffff;
            border-radius: 50px;
            display: flex;
            align-items: center;
            justify-content: center;
            margin-right: 15px;
        } .logo-holder-footer {
            width: 150px;
            height: 80px;
            background-color: #ffffff;
            border-radius: 50px;
            display: flex;
            align-items: center;
            justify-content: center;
            margin-bottom: 10px;
        }

        .logo {
            height: 70px;
        }

        .text-navs a {
            text-decoration: none;
            color: #ffffff;
            margin-right: 20px;
            font-size: 16px;
            font-weight: 550;
        }

        .text-navs a:hover {
            color: rgb(231, 231, 231);
        }

        .logo-navs a {
            margin-right: 20px;
        }

        .txt {
            display: none;
            text-decoration: none;
            color: #ffffff;
            font-size: 16px;
            font-weight: 550;
        } .txt:hover {
            color: rgb(231, 231, 231);
        }

        .hamburger-menu {
            display: none;
            cursor: pointer;
        }

        .bar {
            display: block;
            width: 25px;
            height: 3px;
            margin: 5px auto;
            -webkit-transition: all 0.3s ease-in-out;
            transition: all 0.3s ease-in-out;
            background-color: #ffffff;
        }

        /* Screen size Responsiveness */

        @media(max-width: 950px) {
            .navbar {
            padding: 0px 40px;
            }
        
            footer {
            padding: 40px 40px;
            }
        }

        @media(max-width: 840px) {
            .hamburger-menu {
                display: block;
            }

            .hamburger-menu.active .bar:nth-child(2){
                opacity: 0;
            } .hamburger-menu.active .bar:nth-child(1){
                transform: translateY(8px) rotate(45deg);
            } .hamburger-menu.active .bar:nth-child(3){
                transform: translateY(-8px) rotate(-45deg);
            }
        
            /* .logo-holder {
                width: 130px;
                height: 70px;
            }
        
            .logo {
                height: 60px;
            } */
        
            .logo-navs {
                position: fixed;
                right: -100%;
                top: 100px;
                gap: 0;
                flex-direction: column;
                background-color: #84ADEA;
                width: 180px;
                display: flex;
            
            }
        
            .logo-navs a {
                margin: 10px 0 10px 20px;
            } .profile {
                margin-right: 20px;
            } .cart {
                width: 40px;
                position: relative;
                right: 4px;
                margin-right: 11px;
            } .txt {
                display: inline-block;
            }
        
            .logo-navs.active {
                right: 0;
            }
        
            .text-navs a {
                font-size: 14px;
            }
        }

        @media(max-width: 750px) {
            .text-navs {
                border-top: 5px solid #5e7dac;
                position: fixed;
                right: -100%;
                top: 100px;
                gap: 0;
                flex-direction: column;
                background-color: #84ADEA;
                width: 100%;
                height: 175px;
                display: flex;
                align-items: center;
            } .text-navs a {
                font-size: 16px;
                margin: 16px 0 0 0;
            }
        
            .text-navs.active {
                right: 0;
            }
        
            .logo-navs {
                top: 270px;
                width: 100%;
                align-items: center;
            } .logo-navs a {
                margin: 10px 0;
            }

            .profile {
                display: none;
            } .cart {
                display: none;
            }
        }
    </style>
</head>
<body>
    <header>
        <section class="navbar">
            <div class="logo-holder">
                <img class="logo" src="pics/logos/market_logo.png">
            </div>

            <div class="text-navs">
                <a href="home-page.php">HOME</a>
                <a href="product-page.php">PRODUCTS</a>
                <a href="about-page.php">ABOUT US</a>
                <a href="contact-page.php">CONTACT US</a>
            </div>

            <div class="logo-navs">
                <a href="#profile"><img class="profile" src="pics/logos/profile-logo.svg" style="width: 25px;"><txt class="txt">PROFILE</txt></a>
                <a href="#cart"><img class="cart" src="pics/logos/cart-logo.svg" style="width: 35px;"><txt class="txt">CART</txt></a>
            </div>

            <div class="hamburger-menu">
                <span class="bar"></span>
                <span class="bar"></span>
                <span class="bar"></span>
            </div>
        </section>
    </header>

    <script>
        document.addEventListener("DOMContentLoaded", () => {
            const menu = document.querySelector(".hamburger-menu");
            const navMenu = document.querySelector(".logo-navs");
            const textNavs = document.querySelector(".text-navs");
        
            menu.addEventListener("click", () => {
                const mediaSize = window.matchMedia("(max-width: 840px)").matches;
            
                menu.classList.toggle("active");
                navMenu.classList.toggle("active");
                if (mediaSize) {
                    textNavs.classList.toggle("active");
                }
            });
        });
    </script>
</body>
</html>