<?php 
    $filename = "visitors.txt"; 

    $file = file($filename); 
    $file = array_unique($file); 
    $hits = count($file); 
?>

<div id='visitor-counter' class='text-center' style='margin-right: 15px;'>
    Unique Visitors : <strong><?=$hits; ?></strong>
</div>

<?php
    $fd = fopen ($filename , "r"); 
    $fstring = fread ($fd , filesize ($filename)) ; 
    fclose($fd) ; 
    $fd = fopen ($filename , "w"); 
    $fcounted = $fstring."\n".getenv("REMOTE_ADDR"); 
    $fout= fwrite ($fd , $fcounted );
    fclose($fd); 
?>