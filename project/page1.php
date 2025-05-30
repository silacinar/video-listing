<?php
// page1.php
// Kullanici giris sayfasi
?>
<!DOCTYPE html>
<html lang="tr">
<head>
  <meta charset="UTF-8">
  <title>Giris Sayfasi</title>
  <style>
    body { font-family: Arial; margin: 50px; text-align: center; background-color:rgb(207, 185, 195);}
    form { width: 300px; margin: auto; }
    input { width: 100%; margin: 5px 0; padding: 10px; border-radius: 10px;}
    button { width: 100%; margin: 5px 0; padding: 10px; background-color:rgb(134, 0, 60); color: white; border: none; border-radius: 10px;}
  </style>
</head>
<body>
  <h2>Video Portal - Giriş</h2>
  <form method="POST">
    <input type="text" name="username" placeholder="Kullanıcı Adı" required>
    <input type="password" name="password" placeholder="Şifre" required>
    <button type="submit" name="login">Giriş Yap</button>
  </form>

  <?php
  if (isset($_POST['login'])) {
    $username = trim($_POST['username']);
    $password = trim($_POST['password']);

    $file = fopen("user.csv", "r");
    $found = false;
    while (($line = fgetcsv($file, 1000, "|")) !== FALSE) {
      if ($line[0] == $username && $line[1] == $password) {
        $found = true;
        break;
      }
    }
    fclose($file);

    if ($found) {
      header("Location: page2.php");
      exit();
    } else {
      echo "<script>alert('Kullanıcı adı veya şifre yanlış.');</script>";
    }
  }
  ?>
</body>
</html>
