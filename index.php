<?php
//Подключитесь к базе данных с помощью PDO.
//Сохраните данные формы в таблицу reviews , содержащую поля:
//id (INT, PRIMARY KEY, AUTO_INCREMENT)
//name (VARCHAR)
//review (TEXT)
//rating (INT)
//created_at (TIMESTAMP)
//Подсказки:
//Создайте таблицу в MySQL:CREATE TABLE reviews (
//id INT AUTO_INCREMENT PRIMARY KEY,
//name VARCHAR(255) NOT NULL,
//review TEXT NOT NULL,
//rating INT NOT NULL,
//created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
//);
//Для вставки данных используйте SQL-запрос INSERT :
//if ($_SERVER['REQUEST_METHOD'] == 'POST') {
//$name = $_POST['name'];
//$review = $_POST['review'];
//$rating = (int) $_POST['rating'];
//$sql = "INSERT INTO reviews (name, review, rating) VALUES (:name, :review,
//:rating)";
//$stmt = $pdo->prepare($sql);
//$stmt->execute(['name' => $name, 'review' => $review, 'rating' => $rating]);
//echo "Отзыв успешно добавлен!";
//}
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $dsn = "mysql:host=localhost;dbname=project3.8";
    $username = "root";
    $password = "";
    try {
        $pdo = new PDO($dsn, $username, $password);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        echo "Connected successfully";
        $name = $_POST['name'];
        $review = $_POST['review'];
        $rating = (int) $_POST['rating'];
        $sql = "INSERT INTO reviews (name, review, rating) VALUES (:name, :review, :rating)";
        $stmt = $pdo->prepare($sql);
        $stmt->execute(['name' => $name, 'review' => $review, 'rating' => $rating]);
        echo "Отзыв успешно добавлен!";
    } catch (PDOException $e) {
        echo "Connection failed: " . $e->getMessage();
    }
 }
?>