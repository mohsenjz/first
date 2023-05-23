<?php

function checknum($num)
{
    if ($num > 1) {
        throw new Exception("value must be 1 or below");
    }
    return true;
}


// checknum(3);

try {
    checknum(0);
    echo "if you see this, the number is 1 or below";
} catch (Exception $ex) {
    echo $ex->getMessage();
}
