<?php
/*
 * https://www.wolnadomena.pl/index.php?domain=softreck.com
 * https://www.wolnadomena.pl/?domain=softreck.com
 * http://localhost:8080/index.php?domain=softreck.com
 */

require("load_func.php");
$html = '';


if (empty($_POST["domains"])) {
    $_POST["domains"] = "softreck.com";
}

try {

    if (isset($_POST["dns"])) {

        load_func([
            'https://php.letjson.com/let_json.php',
            'https://php.defjson.com/def_json.php',
            'https://php.eachfunc.com/each_func.php',
            'https://domain.phpfunc.com/get_domain_by_url.php',
            'https://domain.phpfunc.com/clean_url.php',
            'https://domain.phpfunc.com/clean_url_multiline.php',

        ], function () {

            // Clean URL
            $domains = clean_url_multiline($_POST["domains"]);

            if (empty($domains)) {
                throw new Exception("domain list is empty");
            }

            $domain_list = array_values(array_filter(explode(PHP_EOL, $domains)));

            if (empty($domain_list)) {
                throw new Exception("domain list is empty");
            }

            $domain_nameserver_list = each_func($domain_list, function ($url) {

                if (empty($url)) return null;

                $url = clean_url($url);

                if (empty($url)) return null;

                if (!(strpos($url, "http://") === 0) && !(strpos($url, "https://") === 0)) {
                    $url = "http://" . $url;
                }

                $domain = get_domain_by_url($url);

                return "
 <div>
    <a href='$url' target='_blank'> $domain</a> 
    - 
    <a class='dns' href='https://domain-dns.parkingomat.pl/get.php?domain=$domain' target='_blank'> - </a>
</div>
            ";
            });

            global $html;

            $html = implode("<br>", $domain_nameserver_list);
//        var_dump($domain_nameserver_list);
//        var_dump($screen_shot_image);

        });
    }

    if (isset($_POST["registered"])) {

        load_func([
            'https://php.letjson.com/let_json.php',
            'https://php.defjson.com/def_json.php',
            'https://php.eachfunc.com/each_func.php',
            'https://domain.phpfunc.com/get_domain_by_url.php',
            'https://domain.phpfunc.com/clean_url.php',
            'https://domain.phpfunc.com/clean_url_multiline.php',

        ], function () {

            // Clean URL
            $domains = clean_url_multiline($_POST["domains"]);

            if (empty($domains)) {
                throw new Exception("domain list is empty");
            }

            $domain_list = array_values(array_filter(explode(PHP_EOL, $domains)));

            if (empty($domain_list)) {
                throw new Exception("domain list is empty");
            }

            $domain_nameserver_list = each_func($domain_list, function ($url) {

                if (empty($url)) return null;

                $url = clean_url($url);

                if (empty($url)) return null;

                if (!(strpos($url, "http://") === 0) && !(strpos($url, "https://") === 0)) {
                    $url = "http://" . $url;
                }

                $domain = get_domain_by_url($url);

                return "
 <div>
    <a href='$url' target='_blank'> $domain</a> 
    -
    <a class='registered' href='https://www.wolnadomena.pl/registered.php?domain=$domain' target='_blank'> - </a>
</div>
            ";
            });

            global $html;

            $html = implode("<br>", $domain_nameserver_list);
//        var_dump($domain_nameserver_list);
//        var_dump($screen_shot_image);

        });
    }




    if (isset($_POST["whois"])) {

        load_func([
            'https://php.letjson.com/let_json.php',
            'https://php.defjson.com/def_json.php',
            'https://php.eachfunc.com/each_func.php',
            'https://domain.phpfunc.com/get_domain_by_url.php',
            'https://domain.phpfunc.com/clean_url.php',
            'https://domain.phpfunc.com/clean_url_multiline.php',

        ], function () {

            // Clean URL
            $domains = clean_url_multiline($_POST["domains"]);

            if (empty($domains)) {
                throw new Exception("domain list is empty");
            }

            $domain_list = array_values(array_filter(explode(PHP_EOL, $domains)));

            if (empty($domain_list)) {
                throw new Exception("domain list is empty");
            }

            $domain_nameserver_list = each_func($domain_list, function ($url) {

                if (empty($url)) return null;

                $url = clean_url($url);

                if (empty($url)) return null;

                if (!(strpos($url, "http://") === 0) && !(strpos($url, "https://") === 0)) {
                    $url = "http://" . $url;
                }

                $domain = get_domain_by_url($url);

                return "
 <div>
    <a href='$url' target='_blank'> $domain</a> 
    -
    <a class='whois' href='https://www.wolnadomena.pl/whois.php?domain=$domain' target='_blank'> - </a>
</div>
            ";
            });

            global $html;

            $html = implode("<br>", $domain_nameserver_list);
        });
    }



    if (isset($_POST["whois"])) {

        load_func([
            'https://php.letjson.com/let_json.php',
            'https://php.defjson.com/def_json.php',
            'https://php.eachfunc.com/each_func.php',
            'https://domain.phpfunc.com/get_domain_by_url.php',
            'https://domain.phpfunc.com/clean_url.php',
            'https://domain.phpfunc.com/clean_url_multiline.php',

        ], function () {

            // Clean URL
            $domains = clean_url_multiline($_POST["domains"]);

            if (empty($domains)) {
                throw new Exception("domain list is empty");
            }

            $domain_list = array_values(array_filter(explode(PHP_EOL, $domains)));

            if (empty($domain_list)) {
                throw new Exception("domain list is empty");
            }

            $domain_nameserver_list = each_func($domain_list, function ($url) {

                if (empty($url)) return null;

                $url = clean_url($url);

                if (empty($url)) return null;

                if (!(strpos($url, "http://") === 0) && !(strpos($url, "https://") === 0)) {
                    $url = "http://" . $url;
                }

                $domain = get_domain_by_url($url);

                return "
 <div>
    <a href='$url' target='_blank'> $domain</a> 
    -
    <a class='whois' href='https://www.wolnadomena.pl/whois.php?domain=$domain' target='_blank'> - </a>
</div>
            ";
            });

            global $html;

            $html = implode("<br>", $domain_nameserver_list);
        });
    }



} catch (Exception $e) {
    // Set HTTP response status code to: 500 - Internal Server Error
    $html = $e->getMessage();
}




?>


<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <title>Wolna Domena .pl - Check Your domains list</title>

    <script src="//ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet"/>
    <link href="style.css" rel="stylesheet"/>

</head>
<body>
<div class="container box">

    <h2 class="center">Wolna Domena .pl</h2>
    <p class="center">More Than WHOIS...</p>
    <hr>
    <form method="post">
        <div class="form-group">
            <label>Enter domain names, line by line</label>
            <br>
            <textarea name="domains" cols="55" rows="20"><?php echo $_POST["domains"] ?></textarea>
        </div>
        <br/>
        <input type="submit" name="dns" value="DNS" class="btn btn-info btn-lg"/>
        <input type="submit" name="whois" value="WHOIS" class="btn btn-info btn-lg"/>
        <input type="submit" name="registered" value="REGISTERED" class="btn btn-info btn-lg"/>
    </form>
    <br/>
    <?php
    echo $html;
    ?>
</div>
<div style="clear:both"></div>
<br/>
<hr>
<div class="center">
    <div>
        API webscreen:
        <a href="http://webscreen.pl:3000/remove/png" target='_blank'> remove png </a>
        |
        <a href="http://webscreen.pl:3000/remove/txt" target='_blank'> remove txt </a>

    </div>

    <div>
        DEV:
        <a href="https://github.com/webtest-pl/www" target='_blank'>source code</a>
        |
        <a href="https://webtest.pl/" target='_blank'> production </a>
        |
        <a href="http://localhost:8080/" target='_blank'> localhost </a>

    </div>

    <div>
        Supported by:
        <a href="https://softreck.com" target='_blank'>softreck.com</a>
        |
        <a href="https://softreck.pl" target='_blank'>softreck.pl</a>
        |
        <a href="https://www.webstream.dev" target='_blank'>webstream.dev</a>
        |
        <a href="https://www.apifunc.com" target='_blank'>apifunc.com</a>

    </div>
</div>

<script>
    $('a.dns').each(function () {
        var atext = $(this);
        var url = atext.attr('href');
        var jqxhr = $.ajax(url)
            .done(function (result) {
                var nameservers = result.nameserver.join(", ");
                console.log(nameservers);
                atext.html(nameservers);
                atext.addClass("active");
            });
    });
</script>



<script>
    $('a.whois').each(function () {
        var atext = $(this);
        var url = atext.attr('href');
        var jqxhr = $.ajax(url)
            .done(function (result) {
                var info = result.whois.domain;
                console.log(info);
                // var whois = Object.keys(info).join(',');
                var whois = '';
                if ("undefined" !== typeof result.whois.domain.name) whois += result.whois.domain.name + '<br>';
                if ("undefined" !== typeof result.whois.domain.expires) whois += result.whois.domain.expires + '<br>';
                if ("undefined" !== typeof result.whois.domain.created) whois += result.whois.domain.created + '<br>';
                if ("undefined" !== typeof result.whois.domain.status) whois += Object.values(result.whois.domain.status).join('<br>');
                if ("undefined" !== typeof result.whois.domain.sponsor)  whois += Object.values(result.whois.domain.sponsor).join('<br>');
                console.log(whois);

                atext.addClass("active");
                atext.html(whois);
            });
    });
</script>


<script>
    $('a.registered').each(function () {
        var atext = $(this);
        var url = atext.attr('href');
        var jqxhr = $.ajax(url)
            .done(function (result) {
                console.log(result);
                console.log(atext);
                console.log(result.registered);
                atext.addClass("active");
                atext.html(result.registered);
            });
    });
</script>

</body>
</html>
