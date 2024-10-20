<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $dsn = "mysql:host=localhost;dbname=project3.8";
    $username = "root";
    $password = "";
    try {
        $pdo = new PDO($dsn, $username, $password);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        echo "Connected successfully";
//        Для получения данных используйте SQL-запрос SELECT :
        $sql = "SELECT * FROM reviews";
        $stmt = $pdo->query($sql);
        $reviews = $stmt->fetchAll(PDO::FETCH_ASSOC);
//        Выведите отзывы на странице:
        foreach ($reviews as $review) {
            echo "<p><strong>{$review['name']}</strong>: {$review['review']} (Рейтинг:{$review['rating']})</p>";
        }
    } catch (PDOException $e) {
        echo "Connection failed: " . $e->getMessage();
    }
 }
?>