<?php
require_once "sumar.php";
require_once "pi.php";
require_once "about.php";
require_once "index.php";

// ej: sumar/1/2
$action = $_GET["action"];

if($action == ''){
    echo getIndex();
}else{
    if (isset($action)){
        // ["sumar","1","2"]
        $partesURL = explode("/", $action);

        if($partesURL[0] == "sumar"){
            if(isset($partesURL[1]) && isset($partesURL[2])) {
                echo  getSumar($partesURL[1], $partesURL[2]);
            } else {
                echo getSumar(null,null);
            }
        }elseif($partesURL[0] == "pi"){
            echo getPi();
        }elseif($partesURL[0] == "about"){
            if(isset($partesURL[1])){
                echo getAbout($partesURL[1]);
            }else{
                echo getAbout(null);
            }
        }   
    }
}

?>