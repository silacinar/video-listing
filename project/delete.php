<?php

$id = $_GET['id'] ?? '';
if (!$id) {
  header("Location: page2.php");
  exit();
}

$lines = file("video.csv");
$new_lines = [];

foreach ($lines as $line) {
  $parts = explode("|", trim($line));
  if ($parts[0] == $id) {
    $parts[4] = "1"; // is_deleted alanını 1 yap
    $line = implode("|", $parts);
  }
  $new_lines[] = $line;
}

file_put_contents("video.csv", implode("\n", $new_lines));
header("Location: page2.php");
exit();
?>
