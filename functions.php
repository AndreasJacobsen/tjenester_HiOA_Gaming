<?php
//Simple functions to remove special characters, anti-hacking.


function test_input($data)
{
    $xcounter = 0;
    $data = trim($data);
    return preg_replace('/[^A-Za-z0-9\. ]/', '', $data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    if($data == null){
        $xcounter++;
        global $error;
        $error = "You have ".$xcounter. " emtpy fields";
    }
}
function error_test(){
    global $error;
    echo $error;
    return $error;
    if($error != null ) {
        return true;
        echo "true";
    }
    else{
        return false;
        echo "false";
    }
}

function test_date($data)
{
   $data = trim($data);
    return preg_replace('~^(((0[1-9]|[12]\\d|3[01])\\/(0[13578]|1[02])\\/((19|[2-9]\\d)\\d{2}))|((0[1-9]|[12]\\d|30)\\/(0[13456789]|1[012])\\/((19|[2-9]\\d)\\d{2}))|((0[1-9]|1\\d|2[0-8])\\/02\\/((19|[2-9]\\d)\\d{2}))|(29\\/02\\/((1[6-9]|[2-9]\\d)(0[48]|[2468][048]|[13579][26])|((16|[2468][048]|[3579][26])00))))$~','', $data);
    $data = htmlspecialchars($data);
}

?>