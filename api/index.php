<?php
header("Content-Type: application/json");

$ES_USER = "elastic";
$ES_PASS = "elastic@123";
$ES_INDEX = "weather";
$ES_URL = "http://localhost:9200/$ES_INDEX";

function esRequest($endpoint, $method = "GET", $body = null) {
    global $ES_USER, $ES_PASS;
    $ch = curl_init($endpoint);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_CUSTOMREQUEST, $method);
    curl_setopt($ch, CURLOPT_USERPWD, "$ES_USER:$ES_PASS");
    curl_setopt($ch, CURLOPT_HTTPHEADER, ["Content-Type: application/json"]);
    if ($body) curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($body));
    $res = curl_exec($ch);
    curl_close($ch);
    return $res;
}

$action = $_GET['action'] ?? '';

/* INSERT */
if ($action === "insert") {
    $data = json_decode(file_get_contents("php://input"), true);
    echo esRequest("$GLOBALS[ES_URL]/_doc", "POST", $data);
}

/* SEARCH */
elseif ($action === "search") {
    $city = $_GET['city'];
    $query = ["query" => ["match" => ["city" => $city]]];
    echo esRequest("$GLOBALS[ES_URL]/_search", "POST", $query);
}

/* UPDATE */
elseif ($action === "update") {
    $id = $_GET['id'];
    $data = json_decode(file_get_contents("php://input"), true);
    echo esRequest("$GLOBALS[ES_URL]/_update/$id", "POST", ["doc" => $data]);
}

/* DELETE */
elseif ($action === "delete") {
    $id = $_GET['id'];
    echo esRequest("$GLOBALS[ES_URL]/_doc/$id", "DELETE");
}

/* HOTTEST */
elseif ($action === "hot") {
    $query = [
        "size" => 0,
        "aggs" => [
            "hot" => [
                "terms" => ["field" => "city.keyword"],
                "aggs" => ["max_temp" => ["max" => ["field" => "temperature"]]]
            ]
        ]
    ];
    echo esRequest("$GLOBALS[ES_URL]/_search", "POST", $query);
}
