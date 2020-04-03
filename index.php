<?php

header('Content-Type: text/plain');


//http://logging.apache.org/log4php/quickstart.html


if(file_exists('main/php/Logger.php')){
    include 'main/php/Logger.php';
    $log = true;
}
else {
    var_dump('no file!');
    $log = false;
}


if($log){


    /*Logger::configure("layout_xml.xml");
    $log = Logger::getRootLogger();
    $log->debug("Hello World!");
    $log->info("Hello World!");*/

    $a = array(
        '1'=> '2',
        '3'=> '4',
    );

// Fetch a logger, it will inherit settings from the root logger

    Logger::configure('layout_xml.xml');

    $log = Logger::getLogger('myAppender');

    $log->debug(json_encode($a));

// Start logging
//$log->trace("My first message.");   // Not logged because TRACE < WARN
    $log->debug('DEBUG ' .date("Y-m-d H:i:s"));  // Not logged because DEBUG < WARN
    $log->info('INFO ' .date("Y-m-d H:i:s"));    // Not logged because INFO < WARN
    $log->warn('WARN ' .date("Y-m-d H:i:s"));   // Logged because WARN >= WARN
    $log->error('ERROR ' .date("Y-m-d H:i:s"));   // Logged because ERROR >= WARN
    $log->fatal('FATAL ' .date("Y-m-d H:i:s"));   // Logged because FATAL >= WARN

}
print_r(file_exists('myLog.log'));

if(file_exists(__DIR__ .'/myLog.log')){
    $log_file = file_get_contents('myLog.log');
    var_dump($log_file);
    file_put_contents('myLog.log', '');
}