<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Supermarket | Home</title>
    <link rel="stylesheet" href="assets/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/carousel.css">
    <link rel="stylesheet" href="css/style.css">
    <script src="assets/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="icon" type="image/x-icon" href="pics/logos/market-logo2.png">
</head>
<body>
    <?php include 'include/header.php'?>

    <main>
        <!-- Carousel -->
        <section class="carousel">
            <div id="myCarousel" class="carousel slide mb-6" data-bs-ride="carousel">
                
                <div class="carousel-indicators">
                    <button
                        type="button"
                        data-bs-target="#myCarousel"
                        data-bs-slide-to="0"
                        class="active"
                        aria-current="true"
                        aria-label="Slide 1">
                    </button>
                    <button
                        type="button"
                        data-bs-target="#myCarousel"
                        data-bs-slide-to="1"
                        aria-label="Slide 2">
                    </button>
                    <button
                        type="button"
                        data-bs-target="#myCarousel"
                        data-bs-slide-to="2"
                        aria-label="Slide 3">
                    </button>
                </div>

                <div class="carousel-inner">
                    <!-- Page 1 -->
                    <div class="carousel-item active">
                        <img src="pics/fish_display1.jpg" style="width:100%; height:100%; object-fit:cover;">
                        <!-- <div class="txt">
                            <div class="carousel-caption text-start">
                                <h1>Example headline.</h1>
                                <p class="opacity-75">
                                Some representative placeholder content for the first slide of
                                the carousel.
                                </p>
                                <p>
                                <a class="btn btn-lg btn-primary" href="#">Sign up today</a>
                                </p>
                            </div>
                        </div> -->
                    </div>

                    <!-- Page 2 -->
                    <div class="carousel-item">
                        <img src="pics/fresh_produce1.jpg" style="width:100%; height:100%; object-fit:cover;">

                        <!-- <div class="txt">
                            <div class="carousel-caption">
                                <h1>Another example headline.</h1>
                                <p>
                                Some representative placeholder content for the second slide
                                of the carousel.
                                </p>
                                <p><a class="btn btn-lg btn-primary" href="#">Learn more</a></p>
                            </div>
                        </div> -->
                    </div>

                    <!-- Page 3 -->
                    <div class="carousel-item">
                        <img src="pics/meat_display1.jpeg" style="width:100%; height:100%; object-fit:cover;">
                        <!-- <div class="txt">
                            <div class="carousel-caption text-end">
                                <h1>One more for good measure.</h1>
                                <p>
                                Some representative placeholder content for the third slide of
                                this carousel.
                                </p>
                                <p>
                                <a class="btn btn-lg btn-primary" href="#">Browse gallery</a>
                                </p>
                            </div>
                        </div> -->
                    </div>
                </div>

                <button
                class="carousel-control-prev"
                type="button"
                data-bs-target="#myCarousel"
                data-bs-slide="prev"
                >
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
                </button>
                <button
                class="carousel-control-next"
                type="button"
                data-bs-target="#myCarousel"
                data-bs-slide="next"
                >
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
                </button>
            </div>
        </section>

        <!-- Product Display -->
        <h1 align="center">Fresh Products!</h1>
        <?php
        include 'include/db_conn.php';

        $sql = "SELECT * FROM products";
        $result = $conn->query($sql);
        ?>
        <section class="products">
            <?php 
            if ($result->num_rows > 0) {
                while($product = $result->fetch_assoc()) {
            ?>
            <div class="product-card">
                <div class="product-img-holder">
                    <img src="action/showimage.php?id=<?php echo $product['product_id']; ?>" alt="<?php echo $product['product_name']; ?>">
                </div>

                <div class="label-box">
                    <strong>Product:</strong> <?php echo $product['product_name']; ?>
                </div>

                <div class="label-box">
                    <strong>Price:</strong> ₱<?php echo number_format($product['price'], 2)?>
                </div>

                <div class="label-box">
                    <strong>Stocks Available:</strong> <?php echo $product['stocks']; ?>
                </div>

                <div class="btn-group">
                    <button class="add-cart" onclick="">Add to Cart</button> 
                    <button id="buy-now" class="buy-now" onclick="openModal('<?php echo $product['product_id']?>',
                                                                            '<?php echo $product['product_name']?>',
                                                                            '<?php echo $product['price']?>')"
                                                                            >Buy Now</button>
                </div>
            </div>

            <?php
            }} else {
                echo "<p>No products available.</p>";
            }
            $conn->close();
            ?>
        </section>

        <section id="modal" class="modal">
            <form method="post" action="product.php">
            <div class="modal-display">
                <span id="close" class="close" onclick="closeModal()">&times;</span>

                <div class="modal-img-holder">
                    <img id="modal_img" class="modal_img" alt="<?php echo $product['product_name']?>">
                </div>

                <div class="order-form">
                    <div class="product-details">
                        <input type="hidden" name="product_id" id="product_id">

                        <div class="form-field">
                            <label for="product_name"><strong>Product</strong></label>
                            <input type="text" name="product_name" id="product_name" readonly>
                        </div>

                        <div class="form-field">
                            <label for="price"><strong>Price</strong></label>
                            <input type="text" name="price" id="price" readonly>
                        </div>

                        <div class="form-field">
                            <label for="order_quantity"><strong>Order Quantity</strong></label>
                            <input type="number" name="order_quantity" id="order_quantity" oninput="computeTotal()" min="1">
                        </div>
    
                        <div class="form-field">
                            <label for="order_totalPrice"><strong>Total Price</strong></label>
                            <input type="number" name="order_totalPrice" id="order_totalPrice" readonly>
                        </div>

                        <button type="submit">Place Order</button>
                    </div>

                    <div class="customer-detail">
                        <div class="form-field">
                            <label for="customer_name"><strong>Customer's Name</strong></label>
                            <input type="text" name="customer_name" id="customer_name" required>
                        </div>

                        <div class="form-field">
                            <label for="customer_address"><strong>Customer's Address</strong></label>
                            <input type="text" name="customer_address" id="customer_address" required>
                        </div>

                        <div class="form-field">
                            <label for="customer_mobile"><strong>Mobile Number</strong></label>
                            <input type="text" name="customer_mobile" id="customer_mobile" required>
                        </div>

                        <div class="form-field">
                            <label for="customer_email"><strong>Email Address</strong></label>
                            <input type="email" name="customer_email" id="customer_email" required>
                        </div>
                    </div>
                </div>    
            </div>
            </form>
        </section>
    </main>

    <?php include 'include/footer.php'?>
</body>

<script>
    
    function openModal(id, name, price) {
        document.getElementById("modal").classList.add("active");
        document.getElementById("product_id").value = id;
        document.getElementById("product_name").value = name;
        document.getElementById("price").value = price;
        // document.getElementById("total_order").value = "";
        // document.getElementById("total_price").value = "";
        document.getElementById("modal_img").src = "action/showimage.php?id=" + id;

        document.getElementById("order_quantity").value = 1;
        document.getElementById("order_totalPrice").value = price;
    }

    function closeModal() {
        document.getElementById("modal").classList.remove("active");
        // document.getElementsByTagName("html").style.overflow = 'visible';
    }

    function computeTotal() {
        let price = document.getElementById("price").value;
        let qty = document.getElementById("order_quantity").value;
        let total = qty * price;
        document.getElementById("order_totalPrice").value = total.toFixed(2);
    }

    // const modal = document.getElementById("modal");
    // const buyBtn = document.getElementById("buy-now");
    // const close = document.getElementById("close");

    // buyBtn.addEventListener("click", () => {
    //     modal.classList.toggle("active");
    // });

    // close.addEventListener("click", () => {
    //     modal.classList.remove("active");
    // });

</script>

</html> 