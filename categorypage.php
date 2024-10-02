<!DOCTYPE html> 
<html lang="en">
<head>
<div class="logo">Demure</div>
           
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    

    <title>Categories</title>
    <link rel="stylesheet" href="styles.css">
    <link href="https://fonts.googleapis.com/css2?family=Futura+Light&display=swap" rel="stylesheet">
    <style>
        body {
            margin: 0;
            height: 100vh;
            background-color: #f0f0f0;
            background-image:
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
            font-family: 'Brandon Grotesque';
            color: #f9f5f2;
        }
        

        .category-container {
            display: flex;
            justify-content: center;
            padding: 20px;
            position: sticky;
            top: 0;
            z-index: 10;
        }

        .category-container h1 {
            margin-bottom: 20px;
        }

        /* Categories displayed horizontally */
        .category {
            list-style-type: none;
            padding: 0;
            margin: 0;
            display: flex;
            justify-content: center; /* Align categories horizontally */
            gap: 20px;
        }

        .category li {
            position: relative;
            margin: 0 10px;

        }

        .category a {
            text-decoration: none;
    color: #000000; /* Dark gray */
    font-size: 0.88rem;
    padding: 0.5rem 1rem;
    font-family: 'Brandon Grotesque', sans-serif;
    text-transform: uppercase;
           
           
        }

        .category a:hover {
            color: #e1abc4; /* Soft pink */
            border-bottom: 2px solid #ffb0c7; /* Underline effect */
        }

        /* Subcategories - hidden by default */
        .subcategory {
            display: none;
            position: absolute;
            top: 100%;
            left: 0;
            background-color: rgba(255, 255, 255, 0.9);
            border: 1px solid #ccc;
            padding: 10px;
            z-index: 1;
        }

        .subcategory a {
            display: block;
            text-decoration: none;
            color: black;
            padding: 5px;
        }

        .subcategory a:hover {
            color: #e1abc4; /* Soft pink */
            border-bottom: 2px solid #ffb0c7; /* Underline effect */

        }

        /* Display subcategories when hovering over the category */
        .category li:hover .subcategory {
            display: block;
        }
        footer {
    background-color: #b69a85;
    margin-top: 50px;
    padding: 20px;
    font-family: 'Brandon Grotesque Thin';
    box-sizing: border-box;
    bottom: 0;
    right: 0;
    left: 0;
    width: 100%;
    position:fixed;
}

.footer-container {
    display: flex;
    justify-content: space-between;
    max-width: 1200px;
    margin: 0 auto;
    padding-bottom: 20px;
    border-bottom: 1px solid #ddd;
}
.footer-container p{
    font-family: 'Brandon Grostesque Thin';
    display: flex;
    justify-content: space-between;
    max-width: 1200px;
    margin: 0 auto;
    padding-bottom: 20px;
}
.footer-column {
    flex: 1;
    padding: 0 ;
    list-style: none;
    font-family: 'Brandon Grotesque Light';
    font-size: 0.9rem;
}

.footer-column h4 {
    font-family: 'Brandon Grotesque Light';
    font-size: 1.1rem;
    color: #493238;
    margin-bottom: 15px;
    text-transform: uppercase;
}


.footer-column p {
    font-family: 'Brandon Grostesque Thin';
    font-size: 0.95rem;
    line-height: 1.6;
    margin-bottom: 20px;
    color: #f7f7f7;
}
.footer-link{
    line-height: 1.7;
    margin-bottom: 30px;
}

.footer-link a{
    font-family: 'Brandon Grotesque';
    text-decoration: none;
    color: #ffffff;
    font-size: 0.76rem;
    text-transform: uppercase;
}

.footer-link a:hover{
    border-bottom: 1.5px solid #ff96b4;
}
.email-signup {
    display: flex;
    flex-direction: column;
}

.email-signup input[type="email"] {
    padding: 10px;
    width: 94%;
    border: 1px solid #fff;
    border-radius: 4px;
    margin-bottom: 10px;
    background-color: #f7f7f7;
    color: #333;
    font-size: 0.95rem;
}

.email-signup button {
  padding: 15px 30px;
  background-color: #29111b;
  cursor: pointer;
  border-radius: 5px;
  text-transform: uppercase;
  display: inline-flex;
  align-items: center;
  border: none;
  color: #fff6f6;
  justify-content: center;
}

.email-signup button:hover {
    background-color: #ffc7d6;
    color: #552f42;
}

.footer-bottom {
    font-family: 'Brandon Grotesque';
    text-align: center;
    padding-top: 20px;
    font-size: 0.9rem;
    color: #ffffff;
    margin: 0;
}

   
       
    </style>
</head>

<body>

 

    <div class="category-container">
       
        <ul class="category">
            <?php
            include 'C:/xampp/htdocs/DemureWebsite/include/connect.php'; // Include database connection

            // Fetch all categories
            $sql = "SELECT * FROM category";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    // For each category, fetch related subcategories
                    $category_id = $row['Category_ID'];
                    echo "<li><a href='#'>" . $row['Category_Name'] . "</a>";

                    // Fetch subcategories for the current category
                    $sub_sql = "SELECT * FROM subcategory WHERE Category_ID = $category_id";
                    $sub_result = $conn->query($sub_sql);

                    if ($sub_result->num_rows > 0) {
                        echo "<div class='subcategory'>";
                        while ($sub_row = $sub_result->fetch_assoc()) {
                            echo "<a href='productlist.php?sub_id=" . $sub_row['sub_id'] . "'>" . $sub_row['Subcategory_Name'] . "</a>";
                        }
                        echo "</div>";
                    }

                    echo "</li>";
                }
            } else {
                echo "<li>No categories found.</li>";
            }

            $conn->close();
            ?>
        </ul>
    </div>
 
</body>
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
</footer>
</html>
