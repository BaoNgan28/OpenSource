<?php
class OrderModel {
    private $conn;

    public function __construct($db) {
        $this->conn = $db;
    }

    public function createOrder($name, $phone, $address, $cart) {
        try {
            $this->conn->beginTransaction();

            // 1. Chèn vào bảng orders
            $query = "INSERT INTO orders (name, phone, address) VALUES (:name, :phone, :address)";
            $stmt = $this->conn->prepare($query);
            $stmt->execute([
                ':name' => htmlspecialchars(strip_tags($name)),
                ':phone' => htmlspecialchars(strip_tags($phone)),
                ':address' => htmlspecialchars(strip_tags($address))
            ]);

            $orderId = $this->conn->lastInsertId();

            // 2. Chèn vào bảng order_details
            $queryDetail = "INSERT INTO order_details (order_id, product_id, quantity, price) 
                            VALUES (:order_id, :product_id, :quantity, :price)";
            $stmtDetail = $this->conn->prepare($queryDetail);

            foreach ($cart as $productId => $item) {
                $stmtDetail->execute([
                    ':order_id' => $orderId,
                    ':product_id' => $productId,
                    ':quantity' => $item['quantity'],
                    ':price' => $item['price']
                ]);
            }

            $this->conn->commit();
            return true;
        } catch (Exception $e) {
            $this->conn->rollBack();
            return false;
        }
    }
}