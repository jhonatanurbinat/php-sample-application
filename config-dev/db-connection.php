<?php

#echo "Debug: index.php is working! DD config-dev.php";

#echo "TT";

return new PDO("mysql:host=db;dbname=sampledb", "sampleuser", "samplepass", [
    PDO::ATTR_PERSISTENT => true,
    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
]);


#echo "Debug: index.php is working! after config-dev.php";