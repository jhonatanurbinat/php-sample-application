<?php

/**
 * Returns the best negotiated format according to RFC 7231.
 */
echo "Looking NEGOTIATE1111111111111111111D";

$negotiator = new \Negotiation\Negotiator();

//echo $negotiator;

echo "NEGOTIATED123123";
#var_dump($_SERVER["HTTP_ACCEPT"]);
$best = $negotiator->getBest($_SERVER["HTTP_ACCEPT"], ['text/html', 'application/json']);
                    
echo $best->getValue();

/*if ($best) {
    echo "✅ Best match: " . $best->getValue() . "<br>";
} else {
    echo "❌ No matching format<br>";
}*/


return (new \Negotiation\Negotiator())
    ->getBest($_SERVER["HTTP_ACCEPT"], ['text/html', 'application/json'])
    ->getValue();
