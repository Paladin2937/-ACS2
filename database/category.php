<?php
include 'conf.php'; // Kết nối database

// Lấy ID sản phẩm từ URL 
$product_id = isset($_GET['id']) ? intval($_GET['id']) : 0;

// Truy vấn sản phẩm từ cơ sở dữ liệu
$sql = "SELECT * FROM product WHERE id = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $product_id);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows > 0) {
    $product = $result->fetch_assoc();
} else {
    echo "Product not found!";
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo htmlspecialchars($product['name']); ?></title>
    <style>
        .product-container {
            max-width: 600px;
            margin: 50px auto;
            padding: 20px;
            border: 1px solid #ccc;
            border-radius: 10px;
            text-align: center;
        }
        .product-container img {
            max-width: 100%;
            height: auto;
            border-radius: 10px;
        }
        .product-container h1 {
            font-size: 24px;
            margin: 20px 0;
        }
        .product-container p {
            font-size: 16px;
            margin: 10px 0;
        }
        .product-container .price {
            font-size: 20px;
            font-weight: bold;
            color: #d9534f;
        }
    </style>
</head>
<body>
    <div class="product-container">
        <img src="<?php echo htmlspecialchars($product['image_url']); ?>" alt="<?php echo htmlspecialchars($product['name']); ?>">
        <h1><?php echo htmlspecialchars($product['name']); ?></h1>
        <p><?php echo nl2br(htmlspecialchars($product['description'])); ?></p>
        <p class="price">$<?php echo number_format($product['price'], 2); ?></p>
    </div>
</body>
</html>
