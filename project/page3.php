<?php
// page3.php
?>
<!DOCTYPE html>
<html lang="tr">
<head>
  <meta charset="UTF-8">
  <title>Yeni Video Ekle</title>
  <style>
    body { font-family: Arial; margin: 20px; text-align: center; background-color:rgb(207, 185, 195);}
    form { max-width: 400px; margin: auto; }
    input, textarea { width: 100%; margin: 10px 0; padding: 8px; border-radius: 10px;}
    button { padding: 10px; margin: 5px; border-radius: 10px; background-color:rgb(134, 0, 60); color:rgb(255, 255, 255);}
  </style>
</head>
<body>
  <h2>Yeni Video Ekle</h2>
  <form method="POST">
    <input type="text" name="id" placeholder="Youtube Video ID" required>
    <input type="text" name="link" placeholder="Youtube Link" required>
    <textarea name="desc" placeholder="Açıklama" required></textarea>
    <button type="submit" name="save">Kaydet</button>
    <button type="button" onclick="window.location.href='page2.php'">Vazgeç</button>
  </form>

  <?php
  if (isset($_POST['save'])) {
    $id = trim($_POST['id']);
    $link = trim($_POST['link']);
    $desc = trim($_POST['desc']);

    if ($id && $link && $desc) {
      $date = date("Y-m-d H:i:s");
      $is_deleted = 0;

      $file = fopen("video.csv", "a");
      fputcsv($file, [$id, $link, $desc, $date, $is_deleted], "|");
      fclose($file);

      header("Location: page2.php");
      exit();
    } else {
      echo "<script>alert('Tüm alanları doldurunuz.');</script>";
    }
  }
  ?>
</body>
</html>