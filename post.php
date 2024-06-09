<?php
$dsn = 'mysql:dbname=db;host=127.0.0.1:3306';
$user = 'root';
$password = '';

try {
    $dbh = new PDO($dsn, $user, $password);

    // Используем подготовленный запрос
    $SQL = "INSERT INTO `contact` (`name`, `time`, `phone`, `message`) VALUES (?, ?, ?, ?)";
    $stmt = $dbh->prepare($SQL);

    // Выполняем запрос с данными из $_POST
    $stmt->execute([$_POST['Name'], $_POST['time_'], $_POST['Phone'], $_POST['message']]);

    header("Location: success.php?name=" . urlencode($_POST['Name']) . "&time=" . urlencode($_POST['time_']));

    exit(); 
} catch(PDOException $e) {
    // Если произошла ошибка, выводим сообщение об ошибке
    echo "Ошибка: " . $e->getMessage();
}
?>
