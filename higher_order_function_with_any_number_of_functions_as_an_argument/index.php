<?php

class Pipeline
{
    public $allFunctions = '';
    public function make()
    {
        $args = func_get_args();
        $this->allFunctions = $args;
    }
    public function result($myArg)
    {
        $container = [];
        $container[0] = $myArg;
        for ($i = 0; $i < count($this->allFunctions); $i++) {
            $result = $this->allFunctions[$i]($container[0]);
            $container[0] = $result;
        }
        return $result;
    }
}

$newPipelineObject = new Pipeline();
$newPipelineObject->make(function ($var) {
    return $var * 3;
}, function ($var) {
    return $var + 1;
}, function ($var) {
    return $var / 2;
});
echo $newPipelineObject->result(5);
?>