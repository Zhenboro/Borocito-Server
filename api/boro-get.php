<?php
header("Content-Type: text/plain");

$URL = $_SERVER['HTTP_HOST'];

if (isset($_GET['component']) && $_GET['component']!="") {
    $componente = $_GET['component'];

    $componente_bin = "./boro-get/binaries/" . $componente . ".zip";
    if (isset($_GET['download']) && $_GET['download']!="") {
        header('Content-Type: application/octet-stream');
        header('Content-Disposition: attachment; filename="'.basename($componente_bin).'"');
        die(readfile($componente_bin));
    };

    $componente_inf = "./boro-get/" . $componente . ".inf";
    if (file_exists($componente_inf)) {
        die(readfile($componente_inf));
    };
};

$componentes = array();
$iterator = new DirectoryIterator("./boro-get");
foreach($iterator as $fileInfo) {
    if($fileInfo->isDot()) continue;
    if(!$fileInfo->isDir()) {
        $componentes[] =  $fileInfo->getFilename();
    };
};

$retorno = "
# Boro-Get Repository Configuration File
[REPOSITORIES]
";
foreach($componentes as $componente) {
    $nombre = str_replace(".inf", "", $componente);
    $retorno .= $nombre . "=" . $URL . "/api/boro-get/repository?component=" . $nombre . "\n";
}
die($retorno);
