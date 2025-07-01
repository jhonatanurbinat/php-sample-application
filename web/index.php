<?php



#lastJoinedUsers = (require "dic/users.php")->getLastJoined();

#echo "Debug: index.php is working! index.php update $lastJoinedUsers";

echo "Before calling getLastJoined()<br>";

$lastJoinedUsers = (require __DIR__ . '/../dic/users.php')->getLastJoined();

echo "After calling getLastJoined()<br>";

#var_dump($lastJoinedUsers);


switch (require __DIR__ . '/../dic/negotiated_format.php') {
    case "text/html":
        echo "AAA";
        (new Views\Layout(
            "Twitter - Newcomers", new Views\Users\Listing($lastJoinedUsers), true
        ))();
        exit;

    case "application/json":
        echo "BBB";
        header("Content-Type: application/json");
        echo json_encode($lastJoinedUsers);
        exit;
}

http_response_code(406);
