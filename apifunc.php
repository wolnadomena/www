<?php

// https://apifunc.github.io/php/apifunc.php
// curl https://apifunc.github.io/php/apifunc.php --output apifunc.php

/**
 * @param array $func_url_array
 * @param $callback
 * @param string $local_path
 * @return mixed
 *
 * @throws Exception
 */
function apifunc(array $func_url_array, $callback, $local_path = '.apifunc')
{
    /** @var string $func_url */
    foreach ($func_url_array as $func_url) {

        $file_name = basename($func_url);

        // IF exist in current folder
        if (file_exists($file_name)) {
            include_once($file_name);
            continue;
        }

        // If exist PATH
        if (!empty($local_path)) {
            if (!file_exists($local_path)) {
                if (!mkdir($local_path) && !is_dir($local_path)) {
                    throw new \RuntimeException(sprintf('Directory "%s" was not created', $local_path));
                }
            }
            $local_path = $local_path . DIRECTORY_SEPARATOR;
        }

        // FILE
        $path = $local_path . $file_name;

        // download if not exist
        if (!file_exists($path)) {

            // check if URL exist
            if (!url_exists($func_url)) {
                throw new Exception("The Url: " . $func_url . " not exist ");
            }

            // check if File is writeable
            $out = fopen($path, "wb");
            if ($out == FALSE) {
                throw new Exception("File not opened");
            }

//            echo "::url: ". $func_url;


            $ch = curl_init();

            curl_setopt($ch, CURLOPT_FILE, $out);
            curl_setopt($ch, CURLOPT_HEADER, 0);
            curl_setopt($ch, CURLOPT_URL, $func_url);

            curl_exec($ch);

            if (!empty(curl_error($ch))) {
                throw new Exception("Error for url: " . $func_url . " : " . curl_error($ch));
            }

            curl_close($ch);
            //fclose($handle);
        }

        //    if(!@include($path)) throw new Exception("Failed to include 'script.php'");

        if (!file_exists($path)) {
            throw new Exception("File: " . $path . " not exist");
        }

        // include
        include_once($path);
    }

    return $callback($func_url_array);
}


/**
 * @param $url
 * @return bool
 */
function url_exists($url)
{
    if (curl_init($url) === false) {
        return false;
    }

    $headers = @get_headers($url);
    if (strpos($headers[0], '200') === false) {
        return false;
    }

    return true;
}
