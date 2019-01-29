<?php
session_start();
class Lista{
    public $destino;
    public $arquivo;
    public $extensao;

    public function __construct($destinatario){
        $this->destino = $destinatario;
    }

    public function adicionarNaPasta($file, $sessao){
        $this->arquivo = $sessao;

        $this->extensao = pathinfo($file["name"]);
        $this->extensao = ".".$this->extensao['extension'];

        if(move_uploaded_file($file["tmp_name"], $this->destino.$this->arquivo.$this->extensao)){
            $_SESSION["extensao"] = $this->extensao;
        }else{
            header("Location : campanha.php?dados='não foi possível salvar o arquivo no sistema'");
        }
    }
}
?>