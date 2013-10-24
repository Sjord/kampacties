<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <title><?php echo CHtml::encode($this->pageTitle); ?></title>

        <link href="bootstrap/css/bootstrap.css" rel="stylesheet">
        <link href="css/kampacties.css" rel="stylesheet">
    </head>

    <body>

        <div class="container">
            <div class="page-header">
                    <h1>Kampacties</h1>
            </div>
        </div>

        <?php echo $content; ?>


        <script src="//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
        <script src="bootstrap/js/bootstrap.min.js"></script>
        <script src="js/kampacties.js"></script>
    </body>
</html>

