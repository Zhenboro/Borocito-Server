<?php
include_once('utilities.php');
header("Content-Type: text/plain");

CheckInstance();

if (!file_exists("./Users/" . GetUUID() .  ".rtp")) {
    http_response_code(401);
    die(json_encode([
        'status' => "NUH-UH"
    ]));
};

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    if (isset($_POST['content']) && $_POST['content']!="") {
        $uuid = GetUUID();
        file_put_contents("./Users/Commands/" . $uuid . ".str", $_POST['content']);
        die("OK! " . $uuid);
    };
};

die(file_get_contents("./Users/Commands/" . GetUUID() . ".str"));
