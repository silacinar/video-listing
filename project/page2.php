<?php
// page2.php
?>
<!DOCTYPE html>
<html lang="tr">
<head>
  <meta charset="UTF-8">
  <title style='align-items: center';>Video Listesi</title>
  <style>
    body {
      font-family: Arial;
      margin: 20px;
      text-align: center;
      background-color:rgb(207, 185, 195);
    }

    .video-card {
      border: 2px solid #ccc;
      padding: 5px;
      margin-bottom: 10px;
      display: flex;
      align-items: center;
      justify-content: space-between;
      width: 1000px;
      margin: 7px auto;
      background-color:rgb(255, 255, 255);
      border-radius: 15px;
    }

    .video-thumb img {
      width: 80px;
      height: 60px;
      border: 1px solid black;
      border-radius: 10px;
    }

    .video-info {
      display: flex;
      flex-direction: column;
      justify-content: center;
      margin-left: 10px;
      flex-grow: 1;
    }

    .video-info .desc {
      font-weight: bold;
    }

    .video-info .date {
      font-size: 0.9em;
      color: #333;
    }

    .actions {
      display: flex;
      align-items: center;
    }

    .actions button {
      margin-left: 5px;
      padding: 5px 10px;
      border-radius: 10px;
    }

    .video-content {
      display: flex;
      align-items: center;
      flex-grow: 1;
    }
  </style>

  <script>
    function confirmDelete(id) {
      if (confirm("Bu videoyu silmek istediğinizden emin misiniz?")) {
        window.location.href = 'delete.php?id=' + id;
      }
    }
  </script>
</head>
<body>
  <h2>VİDEO LİSTESİ</h2>
  <a href="page3.php"><button style="border-radius: 10px; background-color:rgb(134, 0, 60); color:rgb(255,255,255)">Yeni Video Ekle</button></a>
  <br><br>

  <?php
  $file = fopen("video.csv", "r");
  while (($line = fgetcsv($file, 1000, "|")) !== FALSE) {
    if (count($line) < 5) {
      continue;
    }

    list($id, $link, $desc, $date, $is_deleted) = $line;

    if ($is_deleted == "0") {
      echo "<div class='video-card'>";
        echo "<div class='video-content'>";
          echo "<div onclick=\"window.open('$link', '_blank')\" class='video-thumb'>";
            echo "<img src='https://img.youtube.com/vi/$id/default.jpg' alt='Thumbnail'>";
          echo "</div>";
          echo "<div class='video-info'>";
            echo "<div class='desc'>$desc</div>";
            echo "<div class='date'>Eklenme Tarihi: $date</div>";
          echo "</div>";
        echo "</div>";
        echo "<div class='actions'>";
          echo "<a href='page4.php?id=$id'><button>Güncelle</button></a>";
          echo "<button onclick=\"confirmDelete('$id')\">❌</button>";
        echo "</div>";
      echo "</div>";
    }
  }
  fclose($file);
  ?>
</body>
</html>
