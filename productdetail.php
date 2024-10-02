<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product Details</title>
    <link rel="stylesheet" href="styles.css">
    <link href="https://fonts.googleapis.com/css2?family=Futura+Light&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Brandon Grotesque';
            margin: 0;
            padding: 0;
            background-image: url('pics/pexels-mdsnmdsnmdsn-1831234.jpg');
        }
        .container {
            display: flex;
            justify-content: space-between;
            max-width: 1200px;
            margin: 50px auto; /* Center the container on the page */
            padding: 20px;
            background-color: white;
            border-radius: 10px;
            box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.1);
        }
        .product-image {
            flex: 1;
            text-align: center;
        }
        .product-image img {
            width: 100%;
            max-width: 400px; 
            height: auto;
            border-radius: 10px;
            object-fit: cover;
        }
        .product-details {
            flex: 1.5;
            margin-left: 40px;
        }
        .product-details h1 {
            font-size: 2.2em;
            margin: 0 0 10px;
            color: #333;
        }
        .product-details h2 {
            font-size: 1.5em;
            color: #555;
            margin-bottom: 20px;
        }
        .price {
            font-size: 1rem;
            font-weight: bold;
            color:#5e3647;
            margin-bottom: 20px;
        }
        .description {
            padding: 0.5rem 0;
    color: #333;
}
        
        .add-to-cart {
            font-family: 'Brandon Grotesque', sans-serif;
            background-color: #f1d1d1ef;
            color: rgb(58, 28, 44);
            padding:9px 20px;
            border: none;
            font-size: 0.85rem;
            cursor: pointer;
            text-transform: uppercase;
            letter-spacing: 1px;
        }
        .add-to-cart:hover {
            color: #ffffff;
            background-color: #522a3c;
        }
       
    </style>
</head>
<body>

<div class="container">
    <?php
    include 'C:/xampp/htdocs/DemureWebsite/include/connect.php'; // Include the database connection

    // Get the product ID from the URL
    $prod_id = $_GET['ProdID'];

    // Fetch product details using the ProdID
    $sql = "SELECT * FROM productlist WHERE ProdID = $prod_id";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        
        // Display product image and details
        echo "
        <div class='product-image'>
            <img src='" . $row['picUrl'] . "' alt='" . $row['P_Name'] . "'>
        </div>
        <div class='product-details'>
            <h1>" . $row['P_Name'] . "</h1>
            <h2>By " . $row['P_Brand'] . "</h2>
            <p class='price'>$ " . $row['Price'] . "</p>
            <p class='description'>" . $row['P_Description'] . "</p>
            <button class='add-to-cart'>Add to Cart</button>
        </div>";
    } else {
        echo "<p>Product not found.</p>";
    }

    $conn->close();
    ?>
</div>

</body>
<?php include 'footer.php'; ?>
</html>
