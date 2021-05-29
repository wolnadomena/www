<?php

// https://whois.webtest.pl/index.php?domain=softeck.com
// https://whois.webtest.pl/?domain=softeck.com

// Load composer framework
if (file_exists(__DIR__ . '/vendor/autoload.php')) {
    require(__DIR__ . '/vendor/autoload.php');
}

use phpWhois\Whois;

require("load_func.php");

header('Content-Type: application/json');

try {
    $domain = $_GET['domain'];

    if (empty($domains)) {
        throw new Exception("domain is empty");
    }

    $domain = strtolower($domain);

//    $domain = 'softreck.com';

    load_func([
        'https://php.defjson.com/def_json.php',
    ], function () {

        global $domain;

        $whois = new Whois();
        $result = $whois->lookup($domain, false);

        echo def_json("", [
            "status" => $result['regrinfo']['registered'],
            "domain" => $domain
        ]);
    });
} catch (Exception $e) {
    // Set HTTP response status code to: 500 - Internal Server Error
    echo def_json("", [
            "message" => $e->getMessage(),
            "domain" => $domain
        ]
    );
}