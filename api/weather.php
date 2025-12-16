<?php 
function getTopHotCities() {
global $ELASTIC_URL, $INDEX;


$query = [
"size" => 0,
"aggs" => [
"cities" => [
"terms" => ["field" => "city"],
"aggs" => [
"max_temp" => ["max" => ["field" => "temperature"]]
]
]
]
];


sendElasticRequest($query);
}
function getTopColdCities() {
global $ELASTIC_URL, $INDEX;


$query = [
"size" => 0,
"aggs" => [
"cities" => [
"terms" => ["field" => "city"],
"aggs" => [
"min_temp" => ["min" => ["field" => "temperature"]]
]
]
]
];


sendElasticRequest($query);
}
function getRainfallTrends() {
$query = [
"size" => 0,
"aggs" => [
"by_city" => [
"terms" => ["field" => "city"],
"aggs" => [
"avg_rainfall" => ["avg" => ["field" => "rainfall"]]
]
]
]
];


sendElasticRequest($query);
}
function getSeasonalPatterns() {
$query = [
"size" => 0,
"aggs" => [
"by_season" => [
"terms" => ["field" => "season"],
"aggs" => [
"avg_temp" => ["avg" => ["field" => "temperature"]]
]
]
]
];


sendElasticRequest($query);
}
function getWeatherAnomalies() {
$query = [
"query" => [
"range" => [
"temperature" => ["gt" => 40]
]
]
];


sendElasticRequest($query);
}
function sendElasticRequest($query) {
global $ELASTIC_URL, $INDEX;


$ch = curl_init("$ELASTIC_URL/$INDEX/_search");
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($query));
curl_setopt($ch, CURLOPT_HTTPHEADER, ['Content-Type: application/json']);


$response = curl_exec($ch);
curl_close($ch);


echo $response;
}

?>