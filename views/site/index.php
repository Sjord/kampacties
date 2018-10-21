<?php
use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\ActiveForm;
use app\models\Explorer;
?>

<div class="container thermometer">
    <div class="progress">
        <?php
            $goal = 6000;
            $default = 50;

            $total = 0;
            foreach ($thermometer as $kampactie) {
                $geld = $kampactie->geld ?: $default;
                $total += $geld;
            }
            $goal = max($total, $goal);

            $classes = array('success', 'warning', 'danger', 'info');
            $c_index = 0;

            foreach ($thermometer as $kampactie) {
                $desc  = $kampactie->naam;
                if ($kampactie->geld) {
                    $desc .= ' (€ '.$kampactie->geld.')';
                }

                $geld = $kampactie->geld ?: $default;
                $perc = 100 * $geld / $goal;
?>
                <div 
                    class="progress-bar progress-bar-<?php echo $classes[$c_index]; ?>" 
                    aria-valuenow="<?php echo $perc; ?>" 
                    title="<?php echo Html::encode($desc); ?>"
                    style="width: <?php echo $perc; ?>%"
                    >
                </div>
<?php       
                $c_index = ($c_index + 1) % count($classes);
            }
        ?>
    </div>
</div>

<?php

function print_namen($explos) {
    $names = array_map(function ($e) { return Html::encode($e->naam); }, $explos);
    echo implode(', ', $names);
}

foreach ($kampacties as $kampactie) {
?>

    <div class="container panel panel-default kampactie" data-kampactie-id="<?php echo $kampactie->id; ?>">
            <div class="panel-body">
                    <h2><?= Html::encode($kampactie->naam); ?></h2>
                    <p><?= Html::encode($kampactie->omschrijving); ?></p>
                    <div class="datum"><?php echo $kampactie->datumFormatted(); ?></div>
                    <div class="present">Aanwezig: 
                        <?php print_namen($kampactie->present); ?>
                    </div>
                    <div class="absent">Afwezig: 
                        <?php print_namen($kampactie->absent); ?>
                    </div>
                    <button class="btn btn-primary add-to-action-button hidden"><span class="glyphicon glyphicon-plus"></span> Voeg jezelf toe</button>
                    <form class="add-to-action-form" method="POST" action="<?= Url::to(["kampactie/add"]) ?>">
                        <input id="form-token" type="hidden" name="<?=Yii::$app->request->csrfParam?>" value="<?=Yii::$app->request->csrfToken?>"/>
                        <input type="hidden" name="kampactie_id" value="<?= $kampactie->id ?>">
                        <table class="table">
                            <tr>
                                <td>Naam:</td>
                                <td><input type="text" name="naam" value="<?= Html::encode($naam) ?>" autocomplete="given-name"></td>
                            </tr>
                            <tr>
                                <td>Ben je er bij?</td>
                                <td>
                                    <button class="btn btn-success" name="status" value="aanwezig"><span class="glyphicon glyphicon-thumbs-up"></span> Aanwezig</button> 
                                    <button class="btn btn-danger" name="status" value="afwezig"><span class="glyphicon glyphicon-thumbs-down"></span> Afwezig</button>
                                </td>
                            </tr>
                        </table>
                    </form>
            </div>
    </div>

<?php
}
?>
