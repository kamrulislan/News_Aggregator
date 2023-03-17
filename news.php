<?php
//$googleapi = file_get_contents("https://newsapi.org/v2/top-headlines?sources=techcrunch&apiKey=1c5671d2ba5a4580a42e03527c0ed860");
//$googleapi = file_get_contents("https://api.nytimes.com/svc/books/v3/lists/current/hardcover-fiction.json?api-key=4VbuYdCxGyHn3SK31pXDYouqxW3ycGia");
$googleapi = file_get_contents("https://api.nytimes.com/svc/news/v3/content/nyt/business.json?api-key=4VbuYdCxGyHn3SK31pXDYouqxW3ycGia");

$googleapi_news = json_decode($googleapi, true);

echo "<pre>";
print_r($googleapi_news);
echo "</pre>";
