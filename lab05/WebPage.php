<?php
    include "Page.php";
    $newPage = new Page("Web Page ", 2019, ", Copyright by Phan Quoc Toan");
    echo $newPage->get();
?>