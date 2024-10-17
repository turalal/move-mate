<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Veritabanı bağlantısı (Örnek MySQL)
    $conn = new mysqli('localhost', 'kullanici_adi', 'sifre', 'veritabani_adi');

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Şifreyi hash'leme
    $hashed_password = password_hash($password, PASSWORD_DEFAULT);

    // Kullanıcıyı veritabanına ekleme
    $sql = "INSERT INTO users (email, password) VALUES ('$email', '$hashed_password')";

    if ($conn->query($sql) === TRUE) {
        echo "Kayıt başarıyla tamamlandı!";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();
}
?>
