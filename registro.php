<?php
    require_once("conexion.php");
    $db = new Database;
    $conectar = $db -> conectar();

    require 'vendor/autoload.php';
    use Picqer\Barcode\BarcodeGeneratorPNG;

    if ((isset($_POST["registro"])) && ($_POST["registro"] == "formu")) {
        $dueño = $_POST['dueño'];
        $barrio = $_POST['barrio'];
        $frente = $_POST['frente'];
        $ancho = $_POST['ancho'];

        $codigo_barras = uniqid() . rand(1000, 9999);
        $generator = new BarcodeGeneratorPNG();
        $codigo_barras_imagen = $generator->getBarcode($codigo_barras, $generator::TYPE_CODE_128);

        file_put_contents(__DIR__. '/images/' . $codigo_barras . '.png', $codigo_barras_imagen);

        $insertsql = $conectar->prepare("INSERT INTO lote(dueño,barrio,frente,ancho,cod_bar) VALUES (?,?,?,?,?)");
        $insertsql->execute([$dueño,$barrio,$frente,$ancho,$codigo_barras]);

        $usua = $conectar->prepare("SELECT * FROM lote");
        $usua->execute();
        $asigna = $usua->fetchAll(PDO::FETCH_ASSOC);
    }

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lote</title>
    <link rel="stylesheet" href="Css/style.css">
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <main class="container">
        <div class="row">
            <div class="col">
                <br>
                <h2>Registro de Lotes</h2>
                <br>
                <form method="POST" enctype="multipart/form-data">
                    <div class="form-group">
                        <label for="dueño">Nombre del dueño:</label>
                        <input type="text" class="form-control" id="dueño" name="dueño" required>
                    </div>
                    <div class="form-group">
                        <label for="barrio">Barrio donde se encuentra el lote:</label>
                        <input type="text" class="form-control" id="barrio" name="barrio" required>
                    </div>
                    <div class="form-group">
                        <label for="frente">Largo del lote:</label>
                        <input type="text" class="form-control" id="frente" name="frente" required>
                    </div>
                    <div class="form-group">
                        <label for="ancho">Ancho del lote:</label>
                        <input type="text" class="form-control" id="ancho" name="ancho" required>
                    </div>
                    <input type="submit" class="btn btn-primary" value="Registrar">
                    <input type="hidden" name="registro" value="formu">
                </form>
            </div>
        </div>
    </main>

    <div class="container">
        <div class="row">
            <div class="col">
                <br>
                <div class="table-responsive">
                    <table class="table table-striped table-bordered table-custom">
                        <thead>
                            <tr>
                                <th>Dueño</th>
                                <th>Barrio</th>
                                <th>Largo</th>
                                <th>Ancho</th>
                                <th>Codigo de Barras</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($asigna as $usua) { ?>
                                <tr>
                                    <td><?= $usua["dueño"] ?></td>
                                    <td><?= $usua["barrio"] ?></td>
                                    <td><?= $usua["frente"] ?></td>
                                    <td><?= $usua["ancho"] ?></td>
                                    <td><img src="images/<?= $usua["cod_bar"] ?>.png" class="img-fluid" style="max-width: 200px;"></td>
                                </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>



    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
