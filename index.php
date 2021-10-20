<?php
require 'vendor/autoload.php';
use Symfony\Component\HttpClient\HttpClient;

$client = HttpClient::create();
$day = rand(1,30);
$response = $client->request('GET', 'https://api.nasa.gov/planetary/apod?api_key=DEMO_KEY&date=2021-09-' . $day);
$imageData = $response->toArray();
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
<h1>
    Image du jour de la NASA
</h1>
<h2>
    <?= $imageData['title'] ?>
</h2>
<p>
    <?= $imageData['explanation'] ?>
</p>
<img src="<?= $imageData['url'] ?>" alt="Image du jour">
</body>
</html>
