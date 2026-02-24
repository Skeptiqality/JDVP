<?php
include '../include/db_conn.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $customer_name = $_POST['customer_name'];
    $customer_email = $_POST['customer_email'];
    $customer_mobile = $_POST['customer_mobile'];
    $customer_feedback = $_POST['customer_feedback'];

    if (isset($_POST['submit-feedback'])) {
        $sql = "INSERT INTO feedbacks (customer_name, customer_email, customer_mobile, customer_feedback)
                VALUES (?, ?, ?, ?)";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("ssis", $customer_name, $customer_email, $customer_mobile, $customer_feedback);

        if ($stmt->execute()) {
            echo "<script>
                    alert('Feedback received successflly!');
                    window.location.href='contact-page.php';
                  </script>";
        } else {
            echo "Error" . $stmt->error; 
        }
    
        $stmt->close();
        $conn->close();
    }
}