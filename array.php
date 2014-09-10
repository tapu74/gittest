<?php
$contacts = array();

$contacts["Friends"] = array("Me", "John Doe");
$contacts["Family"] = array("Mom", "Dad");
$contacts["Enemies"] = array("Stalin", "Hitler");

foreach($contacts as $categoryName => $value)
{
    echo "<b>" . $categoryName . ":</b><br />";
    foreach($contacts[$categoryName] as $name)
    {
        echo $name . "<br />";
    }
    echo "<br />";
}



$values = "Rabbit|Whale|Penguin|Bird";

$array = explode("|", $values);
print_r($array);

echo "<br /><br />";

$string = implode(" and ", $array);
echo $string;

echo "<br /><br />";
$array = array("Dog", "Tiger", "Snake", "Dog");

echo "Animals in array:<br />";
foreach($array as $value)
    echo $value . "<br />";

echo "<br />";

$array = array_unique($array);

echo "Animals in unique array:<br />";
foreach($array as $value)
    echo $value . "<br />";
	echo "<br /><br />";
	$animals = array("Dog", "Tiger", "Snake", "Goat");
$randomAnimal = $animals[array_rand($animals, 1)];
echo "Random animal: " . $randomAnimal;

echo "<br /><br />";
$animals = array("Dog", "Tiger", "Snake", "Goat", "Rabbit", "Whale", "Bird");
echo "Unsorted animals: " . implode(", ", $animals);
echo "<br /><br />";

sort($animals);
echo "Sorted animals: " . implode(", ", $animals);
echo "<br /><br />";

$animals = array_reverse($animals);
echo "Sorted animals, descending order: " . implode(", ", $animals);
?>