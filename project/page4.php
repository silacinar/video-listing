<?php
// page4.php
?>
<!DOCTYPE html>
<html lang="tr">
<head>
  <meta charset="UTF-8">
  <title>Video Güncelle</title>
  <style>
    body { font-family: Arial; margin: 20px; text-align: center; background-color:rgb(207, 185, 195);}
    form { max-width: 400px; margin: auto; }
    input, textarea { width: 100%; margin: 10px 0; padding: 8px; border-radius: 10px;}
    button { padding: 10px; margin: 5px; border-radius: 10px; background-color:rgb(134, 0, 60); color:rgb(255, 255, 255);}
  </style>
</head>
<body>
  <h2>Video Güncelle</h2>
  <?php
  $id = $_GET['id'] ?? '';
  $video = null;
  $lines = file("video.csv");

  foreach ($lines as $line) {
    $parts = explode("|", trim($line));
    if ($parts[0] == $id) {
      $video = $parts;
      break;
    }
  }

  if (!$video) {
    echo "<p>Video bulunamadı.</p>";
    exit();
  }
  ?>
  <form method="POST">
    <input type="text" name="id" value="<?= htmlspecialchars($video[0]) ?>" readonly>
    <input type="text" name="link" value="<?= htmlspecialchars($video[1]) ?>" required>
    <textarea name="desc" required><?= htmlspecialchars($video[2]) ?></textarea>
    <button type="submit" name="save">Kaydet</button>
    <button type="button" onclick="window.location.href='page2.php'">Vazgeç</button>
  </form>

  <?php
  if (isset($_POST['save'])) {
    $link = trim($_POST['link']);
    $desc = trim($_POST['desc']);
    $new_lines = [];

    foreach ($lines as $line) {
      $parts = explode("|", trim($line));
      if ($parts[0] == $id) {
        $parts[1] = $link;
        $parts[2] = $desc;
        $line = implode("|", $parts);
      }
      $new_lines[] = $line;
    }

    file_put_contents("video.csv", implode("\n", $new_lines));
    header("Location: page2.php");
    exit();
  }
  ?>
</body>
</html>
