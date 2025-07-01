<?php

echo "Debug: index.php is working! Update users.php";



/*echo "Debug: index.php is working! after users.php";
*/

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

/*echo "<pre>"; // Make output more readable in HTML

echo "🛠️ DEBUG START<br>";

echo "__DIR__: " . __DIR__ . "<br>";
echo "Current working directory (getcwd()): " . getcwd() . "<br>";*/

// Check if the required file exists
$configPath = __DIR__ . "/../config/db-connection.php";
//echo "Looking for config file at: $configPath<br>";

/*if (!file_exists($configPath)) {
    echo "❌ File does NOT exist at that path.<br>";
} else {
    echo "✅ File FOUND.<br>";
}*/

/*return new Service\UsersService(
    require __DIR__ . "/../config/db-connection.php"
);*/

$db = require $configPath;
//var_dump($db);
#echo "Durin that time $db";
return new Service\UsersService($db);
#var_dump($usersService);

/*try {
    $db = require $configPath;
    echo "✅ DB connection loaded.<br>";

    $usersService = new Service\UsersService($db);
    echo "✅ UsersService created successfully.<br>";

    var_dump($usersService);

} catch (Throwable $e) {
    echo "❌ Error: " . $e->getMessage();
}*/

echo "</pre>";


#$usersService = new Service\UsersService(
#    #require "config/db-connection.php"
 #   require dirname(__DIR__) . "/config/db-connection.php";
#);

#echo "UsersService initialized successfully.<br>";
#var_dump($usersService); // or print_r($usersService);


