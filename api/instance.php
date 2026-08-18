<?php
include_once('utilities.php');
header("Content-Type: text/plain");

CheckInstance();

if (!file_exists("./Users/" . GetUUID() .  ".rtp")) {
    die(json_encode([
        'status' => "NUH-UH"
    ]));
};

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    if (isset($_POST['content']) && $_POST['content']!="") {
        $uuid = GetUUID();
        file_put_contents("./Users/Commands/" . $uuid . ".str", "#|Borocito-CS-PHP|{$uuid}\nCommand1>\nCommand2>\nCommand3>\n[Response]\n{$_POST['content']}");
    };
};

die(readfile("./Users/Commands/" . GetUUID() . ".str"));
