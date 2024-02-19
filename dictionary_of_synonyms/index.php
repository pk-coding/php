<?php
$thesaurus = array("money" => array("cash"), "small" => array("little", "short"), "fun" => array("attraction", "party"));

function getSynonyms($thesaurus, $arg)
{
    $jsonData = array(
        "word" => $arg,
        "synonyms" => [],
    );
    $save = json_encode($jsonData, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES);
    $myArray = [];
    foreach ($thesaurus as $key => $value) {
        if ($key == $arg) {
            foreach ($value as $key => $value) {
                array_push($myArray, $value);
                $jsonData = array(
                    "word" => $arg,
                    "synonyms" => $myArray,
                );
                $save = json_encode($jsonData, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES);
            }
        }
    }
    return $save;
}
echo getSynonyms($thesaurus, "fun");
?>