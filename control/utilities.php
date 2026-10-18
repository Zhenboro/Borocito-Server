<?php
function CheckInstance() {
    $headers = getallheaders();
    if (!array_key_exists('User-Agent', $headers)) {
        http_response_code(400);
        die(json_encode(array(
            "status" => "WHO"
        )));
    }

    if (!str_contains($headers['User-Agent'], 'Borocito')) {
        http_response_code(400);
        die(json_encode(array(
            "status" => "WHO TF ARE U LMAOOOOO"
        )));
    }

    if (!array_key_exists('UUID', $headers)) {
        http_response_code(400);
        die(json_encode(array(
            "status" => "NO KEY, NO PARTY"
        )));
    }
};

function GetUUID() {
    return getallheaders()["UUID"];
};