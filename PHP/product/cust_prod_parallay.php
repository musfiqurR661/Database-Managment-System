<?php
// Connect to MySQL for customer
$conn_customer = new mysqli("localhost", "ruijregl_admin", "4h0}k1]yOTlH", "ruijregl_project_pharmabrew");

if ($conn_customer->connect_error) {
    die("Connection failed: " . $conn_customer->connect_error);
}

// Connect to MySQL for product
$conn_product = new mysqli("localhost", "ruijregl_admin", "4h0}k1]yOTlH", "ruijregl_project_pharmabrew");

if ($conn_product->connect_error) {
    die("Connection failed: " . $conn_product->connect_error);
}

// Add customer or product based on form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
    // Add customer
    $custId = $_POST['custId'];
    $name = $_POST['name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $address = $_POST['address'];
    
    $sql_customer = "INSERT INTO customer (custId, name, email, phone, address) VALUES ('$custId', '$name', '$email', '$phone', '$address')";
    
    if ($conn_customer->query($sql_customer) === TRUE) {
        echo "New customer added successfully";
    } else {
        echo "Error: " . $sql_customer . "<br>" . $conn_customer->error;
    }

    // Add product
    $productName = $_POST['productName'];
    $variant = $_POST['variant'];
    $productionDate = $_POST['productionDate'];
    $unitPrice = $_POST['unitPrice'];
    $expDate = $_POST['expDate'];
    $quantity = $_POST['quantity'];
    $description = $_POST['description'];
    $unitPerStrips = $_POST['unitPerStrips'];
    
    $sql_product = "INSERT INTO product (productName, variant, productionDate, unitPrice, expDate, quantity, description, unitPerStrips) 
            VALUES ('$productName', '$variant', '$productionDate', '$unitPrice', '$expDate', '$quantity', '$description', '$unitPerStrips')";
    
    if ($conn_product->query($sql_product) === TRUE) {
        echo "New product added successfully";
    } else {
        echo "Error: " . $sql_product . "<br>" . $conn_product->error;
    }

    // Close connections
    $conn_customer->close();
    $conn_product->close();
}
?>

<!-- HTML form to add customer -->
<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
    <h2>Add Customer</h2>
    Customer ID: <input type="text" name="custId"><br>
    Name: <input type="text" name="name"><br>
    Email: <input type="email" name="email"><br>
    Phone: <input type="text" name="phone"><br>
    Address: <input type="text" name="address"><br>
    <input type="submit" value="Add Customer">
</form>

<!-- HTML form to add product -->
<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
    <h2>Add Product</h2>
    Product Name: <input type="text" name="productName"><br>
    Variant: <input type="text" name="variant"><br>
    Production Date: <input type="date" name="productionDate"><br>
    Unit Price: <input type="text" name="unitPrice"><br>
    Expiry Date: <input type="date" name="expDate"><br>
    Quantity: <input type="text" name="quantity"><br>
    Description: <textarea name="description"></textarea><br>
    Unit Per Strips: <input type="text" name="unitPerStrips"><br>
    <input type="submit" value="Add Product">
</form>
