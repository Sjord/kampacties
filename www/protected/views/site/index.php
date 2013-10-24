<?php
/* @var $this SiteController */

$this->pageTitle=Yii::app()->name;
?>

<?php

function print_namen($explos) {
    $names = array_map(function ($e) { return CHtml::encode($e->naam); }, $explos);
    echo implode(', ', $names);
}

foreach ($kampacties as $kampactie) {
?>

    <div class="container kampactie" data-kampactie-id="<?php echo $kampactie->id; ?>">
            <div class="jumbotron">
                    <h2><?php echo CHtml::encode($kampactie->naam); ?></h2>
                    <div class="datum"><?php echo $kampactie->datumFormatted(); ?></div>
                    <div class="present">Aanwezig: 
                        <?php print_namen($kampactie->aanwezig); ?>
                    </div>
                    <div class="absent">Afwezig: 
                        <?php print_namen($kampactie->afwezig); ?>
                    </div>
                    <button class="btn btn-primary add-to-action-button"><span class="glyphicon glyphicon-plus"></span> Voeg jezelf toe</button>

                    <form class="add-to-action-form" method="POST" action="<?php echo $this->createUrl('kampacties/add',array('kampactie_id' => $kampactie->id)) ?>">
                        <table class="table">
                            <tr>
                                <td>Naam:</td>
                                <td><input type="text" name="name" /></td>
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
