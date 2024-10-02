<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles.css">>
    <link href="https://fonts.googleapis.com/css2?family=Futura+Light&display=swap" rel="stylesheet">
 
    <style>
        ul {
            list-style-type: none;
        }
        ul li {
            margin: 10px 0;
        }
        a {
            text-decoration: none;
            color: blue;
        }
        a:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>
   
    <?php
    include 'C:/xampp/htdocs/DemureWebsite/include/connect.php'; // Include database connection

    $Category_ID = $_GET['Category_ID']; // Get category ID from URL

    // Fetch subcategories related to the selected category
    $sql = "SELECT * FROM subcategory WHERE Category_ID = $Category_ID";
    $result = $conn->query($sql);

    echo "<ul>";
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            echo "<li><a href='productlist.php?sub_id=" . $row['sub_id'] . "'>" . $row['Subcategory_Name'] . "</a></li>";
        }
    } else {
        echo "<li>No subcategories found.</li>";
    }
    echo "</ul>";

    $conn->close();
    ?>
</body>
</html>
