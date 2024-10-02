<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet"href="styles.css">
    <link href="https://fonts.googleapis.com/css2?family=Futura+Light&display=swap" rel="stylesheet">
    <title>Product List</title>
    <style>
        /* Add background image to the body */
        body {
            background-image: url('https://media.gettyimages.com/id/1530725916/photo/empty-studio-3d-exhibition-background-pastel-creamy-pink-beige-stage-with-soft-natural.jpg?s=612x612&w=0&k=20&c=4I0mqSlJbAn73_nuer6iCIn4RM-hTBQiV2PR2gXy8ro=');
            background-size: cover; /* Makes the image cover the entire background */
            background-position: center; /* Centers the background image */
            background-repeat: no-repeat; /* Ensures the image doesn't repeat */
            font-family: 'Brandon Grotesque';
            color: #333; /* Text color */
        }
        .productlist-container {
            display: flex;
            flex-wrap: wrap;
            gap: 20px;
        }
        .productlist:hover {
            transform: scale(1.05);
        }

        .productlist {
            width: 30%; /* Set each product to take 30% of the row width */
            background-color:#ffffff ;
            padding: 5px;
            margin-bottom: 20px;
            box-shadow: 0px 2px 5px rgba(0, 0, 0, 0.1);
            text-align: center;
            border-radius: 5px;
        }
        .productlist img {
            width: 50%;
            height: auto;
            object-fit: cover;
            border-radius: 5px;

        }
        h2 {
            font-size: 1.2em;
            margin: 10px 0;
        }
        .price {
            font-size: 1rem;
            font-weight: bold;
            color:#5e3647;
            margin-bottom: 20px;
        }
        .productlist a {
            text-decoration: none;
            color: inherit; /* Keep the original text color */
        }
       
        


    </style>
</head>
<body>

<div class="productlist-container">
    <?php
    include 'C:/xampp/htdocs/DemureWebsite/include/connect.php'; // Include database connection

    $sub_id = $_GET['sub_id']; // Get subcategory ID from URL

    // Fetch products related to the selected subcategory
    $sql = "SELECT * FROM productlist WHERE sub_id = $sub_id";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            echo "<div class='productlist'>";
            echo "<a href='productdetail.php?ProdID=" . $row['ProdID'] . "'>"; // Make the product clickable
            echo "<img src='" . $row['picUrl'] . "' alt='" . $row['P_Name'] . "'>";
            echo "<h2>" . $row['P_Name'] . "</h2>";
            echo "<p>" . $row['P_Brand'] . "</p>";
            echo "<p class='price'>$ " . $row['Price'] . "</p>";
            echo "</a>";
            echo "</div>";
        }
    } else {
        echo "No products found.";
    }

    $conn->close();
    ?>
</div>

 <!-- Footer -->
 <footer>
    <div class="footer-container">
        <!-- Column 1: About Demure -->
        <div class="footer-column">
            <h4>About Demure</h4>
            <p>
                Discover premium beauty products with Demure. Our exclusive range is designed to enhance your natural beauty, combining elegance with quality.
            </p>
        </div>

        <!-- Column 2: Help -->
        <div class="footer-column">
            <h4>Help</h4>
            <div class="footer-link">
                <li><a href="customer-service.html">Customer Service</a></li>                <li><a href="shipping-info.html">Shipping Info</a></li>
                <li><a href="returns-exchnages.html">Returns & Exchanges</a></li>
                <li><a href="faqs.html">FAQs</a></li>
                </div>
        </div>

        <!-- Column 3: Email Signup -->
        <div class="footer-column">
            <h4>Sign Up for Email</h4>
            <p>Be the first to know about new arrivals, exclusive offers, and more!</p>
            <form class="email-signup" action="#" method="POST">
                <input type="email" name="email" placeholder="Enter your email" required>
                <button type="submit">Sign Up</button>
                
            </form>
        </div>
    </div>
    <!-- Bottom Footer -->
    <div class="footer-bottom">
        <p>&copy; 2024 Demure. All rights reserved.</p>
    </div>
</body>

</html>
