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
    <h2 class="text-center my-5">Crie sua campanha!!</h2>
    <div class="container">
        <form method="post" action="definirCampanha">
            <div class="form-group">
                <input type="text" class="form-control" name="nomeCampanha" placeholder="Digite o nome da campanha">
            </div>
            <div class="form-group text-center">
                <input type="submit" value="Criar a campanha" class="btn btn-primary">
            </div>
        </form>
        <?php
            $error = isset($_GET["dados"]) ? $_GET["dados"] : "";

            if($error != ""){
                echo "<div class='alert alert-danger' role='alert'>".$error."</div>";

            }
        ?>
    </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js?id=2"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
</body>
</html>