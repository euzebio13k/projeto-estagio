<?php

use App\Entity\Vaga;
//require ('../vendor/autoload.php');

$vagas = Vaga::getVagas();

$resultados = '';
foreach ($vagas as $vaga) {
    $resultados .= '<option value="' . $vaga->id . '">' . $vaga->titulo . '</option>';
}
?>
<?= $resultados ?>
