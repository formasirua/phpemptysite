<?php

error_reporting(E_ALL);

$memory = @ini_get('memory_limit');
$allowurl = @ini_get('allow_url_fopen');

$requirements = array(
    'PHP Version' => array(version_compare(PHP_VERSION, '5.4', '>='), 'PHP version is ' . PHP_VERSION . '. We require 5.4 or higher.'),
    'PHP GD' => array((extension_loaded('gd') && function_exists('gd_info')), 'PHP library GD Required'),
    'PHP CURL' => array((extension_loaded('curl') && function_exists('curl_init')), 'PHP library CURL Required'),
    'PHP Multibyte String' => array(function_exists('mb_strlen'), 'PHP library Multibyte String Required'),
    'PHP XML extension' => array(extension_loaded('xml'), 'PHP library XML Required'),
    'PHP memory_limit' => array(($memory == '-1' ? true : version_compare($memory, '64', '>=')), 'Your servers memory limit is ' . $memory . '. We require 64MB or higher.'),
    'EXIF Library' => array(function_exists('exif_read_data'), 'PHP library EXIF Required'),
    'allow_url_fopen' => array($allowurl, 'Enable allow_url_fopen')
);

?>

<!DOCTYPE html>
    <html>
        <head>
            <title>crea8socialPRO - Requirements Check</title>
            <style>
                body{
                    margin: 0;
                    padding: 0;
                    font-family: 'Segoe UI', Tahoma, Segoe UI, Arial, sans-serif;
                    font-size: 20px;
                    background: #FAFAFA;
                }
                .header{
                    width: 100%;
                    background: #3498db;
                    padding: 10px;
                    text-align: center;
                    font-size: 25px;
                    color: #ffffff;
                    font-weight: lighter;
                    box-sizing: border-box;
                }
                .container{
                    width: 70%;
                    margin: 20px auto;
                }
                .container ul{
                    list-style: none;
                    width: 100%;
                    margin: 0;
                    padding: 0;
                }
                .container ul li{
                    padding: 0px;
                    border-bottom: solid 2px #ECEDED;
                }
                h1{
                    font-weight: lighter;
                }
                .container ul li div{
                    display: inline-block;
                    width: 48%;
                    font-size: 15px;
                }
                .success{
                    color: #16a085;
                    font-weight: bold;
                }
                .error{
                    color: #e74c3c;
                }
            </style>
        </head>

        <body>
            <div class="header">
                crea8socialPRO
            </div>
            <div class="container">
                <h1>Requirements Check</h1>
                <ul>
                    <?php foreach($requirements as $key => $values):?>
                        <li>
                            <div class="name"><?php echo $key?></div>
                            <div class="value">
                                <?php if($values[0]):?>
                                    <p class="success">Passed</p>
                                <?php else:?>
                                    <p class="error"><?php echo $values[1]?></p>
                                <?php endif?>
                            </div>
                        </li>
                    <?php endforeach?>
                </ul>
            </div>
        </body>
    </html>
