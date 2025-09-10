<?php

require __DIR__.'/vendor/autoload.php';

use \App\File\Upload;


$msg = '';
        
if(isset($_FILES['arquivo']['error'])){
    echo "<pre>";  
print_r($_FILES['arquivo']); 
echo "</pre>";
//exit;
     $upload = new Upload($_FILES['arquivo']);
     $msg = $upload->upload(__DIR__.'/files');
     
}



include __DIR__.'/includes/formulario.php';