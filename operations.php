<?php

function inputFields($placeholder, $name, $value, $type) {
    $ele = "
    <input type='$type' placeholder='$placeholder' name='$name' value='$value' autocomplete=\"off\">
    ";

    echo $ele;
}

?>