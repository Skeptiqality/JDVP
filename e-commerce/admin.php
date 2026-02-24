<!DOCTYPE html>

    <?php
        $host = "localhost";
        $user = "root";
        $pass = "";
        $db_name = "supermarket_db";

        $conn = mysqli_connect($host, $user, $pass, $db_name);

        if (!$conn) {
            die("Connection failed ". mysqli_connect_error());
        }

        $nextSID = 1;
        $result = $conn->query("SELECT MAX(product_id) AS product_id FROM products");
        
        if ($result && $row = $result->fetch_assoc()) {
            $nextSID = $row['product_id'] + 1;
        }
    ?>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Supermarket | Admin Panel</title>
    <link rel="icon" type="image/x-icon" href="pics/logos/market-logo2.png">
    <style>

        
        /* Main */
        /* Form Container */

        main {
            display: flex;
            justify-content: space-evenly;
            align-content: center;
            align-items: flex-start;
        }

        .form-container {
            width: 300px;
            padding: 20px;
            margin: 30px;
            border: 2px solid black;
            border-radius: 20px;
        }

        label {
            font-weight: bold;
        }

        #form1 {
            display: flex;
            flex-direction: column;
        }

        #preview-image {
            width: 100%;
            height: 250px;
            margin: 10px 0;
            border: 2px solid #000;
            object-fit: cover;
        }

        .form-div {
            display: flex;
            flex-direction: column;
            margin-bottom: 10px;
        }

        .form-fields {
            width: 100%;
            display: flex;
            flex-direction: column;
            margin-bottom: 15px;
        }

        .botn {
            margin-bottom: 5px;
            border: 2px solid #000000;
        } .botn:hover {
            background-color: rgb(200, 200, 200);
        } .botn:active {
            background-color: rgb(222, 222, 222);
        }

        /* Record Container */

        .record-container {
            margin: 30px;
        }

        table {
            width: 900px;
            border: 2px solid black;
        }

        thead tr th, tbody tr td {
            border: 2px solid black;
            text-align: center;
        }
        
        table img {
            width: 150px;
            margin: 10px;
        } 


    </style>
</head>
<body>
    <?php include 'include/header.php'?>

    <main>
        <div class="form-container">
            <h2 align="center"> Product Registration </h2>
            <form action="admin-action.php" method="post" enctype="multipart/form-data" id="form1">
                <div class="form-div">
                    
                    <div class="form-fields">
                        <label for="product_image">Product Image</label>
                        <img id="preview-image" alt="Image Preview">
                        <input type="file" name="product_image" id="product_image" accept="image/*" onchange="previewImage(event);">
                    </div>
                    
                    <div class="form-fields">
                        <label for="product_id">Product ID</label>
                        <input type="number" name="product_id" id="product_id" value="<?php echo $nextSID; ?>" readonly>
                    </div>

                    <div class="form-fields">
                        <label for="product_name">Product Name</label>
                        <input type="text" name="product_name" id="product_name" required>
                    </div>

                    <div class="form-fields">
                        <label for="price">Price</label>
                        <input type="number" name="price" id="price" step="0.01" required>
                    </div>

                    <div class="form-fields">
                        <label for="stocks">Stocks Available</label>
                        <input type="number" name="stocks" id="stocks" required>
                    </div>

                </div>

                <button class="botn" name="register" value="Register">Register</button>
                <!-- <button class="botn" name="update" value="Update">Update</button> -->
                <button class="botn" type="reset"  name="reset" value="Reset">Reset</button>
            </form>
        </div>

        <div class="record-container">
            <table>
                <thead>
                    <tr>
                        <th> Product Image </th>
                        <th> Product ID </th>
                        <th> Product Name </th>
                        <th> Price </th>
                        <th> Stocks </th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        $sql = "SELECT * FROM products";
                        $result = $conn->query($sql);

                        if ($result->num_rows > 0) {
                            while ($row = $result->fetch_assoc()) { ?>
                                <tr>
                                    <td width="170px"> <img src="showimage.php?id=<?php echo $row["product_id"]?>" alt=""> </td>
                                    <td width="100px"> <?php echo $row["product_id"]?> </td>
                                    <td> <?php echo $row["product_name"]?> </td>
                                    <td> <?php echo $row["price"]?> </td>
                                    <td> <?php echo $row["stocks"]?> </td>
                                </tr>
                            <?php
                            }
                        } else {
                                echo "<tr><td colspan='5'> No records found. </td></tr>";
                        }
                    ?>
                </tbody>
            </table>
        </div>
    </main>
</body>

<script>
    const previewImage = (event) => {
        const files = event.target.files;
        if (files.length > 0) {
            const imageUrl = URL.createObjectURL(files[0]);
            const imageElement = document.getElementById("preview-image");
            imageElement.src = imageUrl;
        }
    } 


    // fetch('fetch_students.php')
    //     .then(response => response.json())
    //     .then(data => {
    //         const tbody = document.querySelector("table tbody");
    //         tbody.innerHTML = "";
    //         if (data.length === 0) {
    //             tbody.innerHTML = "<tr><td colspan='5'> No records found. </td></tr>";
    //         } else {
    //             data.forEach(product => {
    //                 const row = document.createElement("tr");
    //                 row.innerHTML = `
    //                     <td> ${product.product_image} </td>
    //                     <td> ${product.product_id} </td>
    //                     <td> ${product.product_name} </td>
    //                     <td> ${product.price} </td>
    //                     <td> ${product.stocks} </td>
    //                 `;
    //                 row.addEventListener("click", function () {
    //                     const cells = row.querySelectorAll("td");
    //                     document.getElementById("product_image").value = cells[0].textContent;
    //                     document.getElementById("product_id").value = cells[1].textContent;
    //                     document.getElementById("product_name").value = cells[2].textContent;
    //                     document.getElementById("price").value = cells[3].textContent;
    //                     document.getElementById("stocks").value = cells[4].textContent;
    //                 });
    //                 tbody.appendChild(row);
    //             });
    //         }
    //     })
    //     .catch(error => console.error("Error fetching data:", error));
</script>

</html>