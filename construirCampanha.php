<?php
session_start();

?>
<!DOCTYPE <!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Page Title</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">

</head>
<body>
    <h2 class="text-center my-5">chegou a hora de definir sua campanha <strong><?php echo $_SESSION["campanha"];?></strong></h2>
    <h3 class="text-center my-2">digite uma mensagem e envie sua campanha para seus contatos!!</h3>
    <div class="container">
        <form method="POST" enctype="multipart/form-data" action="enviarWhats.php">
            <div class="form-group text-center">
                <textarea name="mensagem" id="mensagem" cols="30" rows="10"></textarea><br>

                <label>coloque aqui sua imagem<input type="file" name="fotoVideo"></label>
            </div>
            <div class="form-group text-center">
                <input type="submit" value="enviar mensagem" class="btn btn-primary">
            </div>
            <?php
            $error = isset($_GET["dados"]) ? $_GET["dados"] : "";

            if($error != ""){
                echo "<div class='alert alert-danger' role='alert'>".$error."</div>";

            }
        ?>
        </form>
    </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js?id=2"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
</body>
</html>