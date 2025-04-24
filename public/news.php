<?php
require_once __DIR__ . '/../vendor/autoload.php';
use App\Database;
include '../templates/header.php';

$db = new Database();
$news = $db->getNews();

echo "<h2>Latest News</h2>";
foreach ($news as $item) {
    echo "<div class='card mb-3'><div class='card-body'>";
    echo "<h5 class='card-title'>{$item['title']}</h5>";
    echo "<p class='card-text'>{$item['content']}</p>";
    echo "<small class='text-muted'>Posted on: {$item['created_at']}</small>";
    echo "</div></div>";
}
include '../templates/footer.php';
?>
