<?php
session_start();

class TextInput
{
    public static $newValue = '';

    public function add(&$text)
    {
        $text = "22default44text88";
        $inputTextValue = $_POST['textInput'];
        $inputNumericValue = $_POST['numericInput'];
        if (ctype_alnum($inputTextValue) == false) {
            $_SESSION['err_textInput'] = "The fields can only consist of letters and numbers (no Polish characters)";
            header('Location: index.php');
        } else {
            static::$newValue = $inputTextValue . " " . $inputNumericValue . " " . $text;
        }
    }
    public function getValue()
    {
        return static::$newValue;
    }
}


class Numericinput extends TextInput
{
    public function add(&$text)
    {
        $test = static::$newValue;
        $i = 0;
        $onlyNumeric = '';
        while ($i < strlen($test)) {
            if (is_numeric($test[$i]))
                $onlyNumeric .= $test[$i];
            $i++;
        }
        return $onlyNumeric;
    }
}

$newTextInput = new TextInput();
$newTextInput->add($text);
echo $newTextInput->getValue() . "<br />";

$newNumericInput = new Numericinput();
echo $newNumericInput->add($text) . "<br />";

?>