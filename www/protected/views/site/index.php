<?php
/* @var $this SiteController */

$this->pageTitle=Yii::app()->name;
?>

<?php

function print_namen($explos) {
    $names = array_map(function ($e) { return $e->naam; }, $explos);
    echo implode(', ', $names);
}

foreach ($kampacties as $kampactie) {
?>

    <div class="container">
            <div class="jumbotron">
                    <?php echo $kampactie->naam . ' &mdash; ' . $kampactie->datum; ?>
                    <div class="present">Aanwezig: 
                        <?php print_namen($kampactie->aanwezig); ?>
                    </div>
                    <div class="absent">Afwezig: 
                        <?php print_namen($kampactie->afwezig); ?>
                    </div>
                    <button class="btn btn-primary add-to-action-button">Voeg jezelf toe</button>

                    <form class="add-to-action-form">
                        <table class="table">
                            <tr>
                                <td>Naam:</td>
                                <td><input type="text" /></td>
                            </tr>
                            <tr>
                                <td>Geheime wachtwoord:</td>
                                <td><input type="password" /></td>
                            </tr>
                            <tr>
                                <td>Ben je er bij?</td>
                                <td><button class="btn btn-success">Aanwezig</button> <button class="btn btn-danger">Afwezig</button></td>
                            </tr>
                        </table>
                    </form>
            </div>
    </div>

<?php
}
?>
