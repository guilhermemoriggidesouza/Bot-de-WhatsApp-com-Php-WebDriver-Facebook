<?php
namespace Facebook\WebDriver; //Definição do namespace
use Facebook\WebDriver\Remote\DesiredCapabilities;
use Facebook\WebDriver\Remote\RemoteWebDriver;
use Facebook\WebDriver\Chrome\ChromeOptions;
use Facebook\WebDriver\Remote\WebDriverCapabilites;
use Lista;
use Facebook\WebDriver\Remote\LocalFileDetector;
header("Content-type: text/html; charset=utf-8"); //definindo o cabeçalho para utf-8
    
require_once('vendor/autoload.php');//realizando o autoload das classes pelo composer
require_once('dadosExcel.php');
require_once('Lista.php');
require_once('SeleniumClient/webDriverWait.php');


$host = 'http://localhost:4444/wd/hub';

 // definindo a url como a do google

$arquivo = "arquivos/excel/".$_SESSION["campanha"].".xls";
$fotoVideo = $_FILES['fotoVideo'];
$mensagem = $_POST["mensagem"];


$obLista = new Lista("arquivos/excel/");
$obLista->adicionarNaPasta($fotoVideo, $_SESSION["campanha"]."foto");

$newFotoVideo = "arquivos/excel/".$_SESSION["campanha"]."foto".$_SESSION["extensao"];
   
$chromeOptions = new ChromeOptions();
$desiredcapabilities = DesiredCapabilities::chrome();
$desiredcapabilities->setCapability(ChromeOptions::CAPABILITY, $chromeOptions);
$desiredcapabilities->setCapability('acceptSslCerts', false);
$desiredcapabilities->setCapability('VERSION', "2.45");
$driver = RemoteWebDriver::create($host, $desiredcapabilities);
// Host default

$arrRec = dadosExcel(); 

$url = 'https://web.whatsapp.com/';
$driver->get($url);
$pesquisa = $driver->findElement(WebDriverBy::id('app'));
sleep(30);
echo "conecte QRcode";
echo "<br>";

$tamanhArr = count($arrRec);
    for($i = 0; $i < $tamanhArr; $i++){
        $block = 'block';
        $url = 'https://web.whatsapp.com/send?phone='.$arrRec[$i]["celular"];
        $driver->get($url);

        echo $arrRec[$i]["celular"];
        echo "<br>";
        echo $newFotoVideo;
        echo "<br>";
        sleep(8);
        $pesquisa =  $driver->findElement(WebDriverBy::xpath('//*[@id="main"]/footer/div[1]/div[2]/div/div[2]'));
            
        $pesquisa->sendKeys($mensagem);
        $pesquisa->sendKeys(array(WebDriverKeys::ENTER)); 
        sleep(3);
    
        $upload = $driver->findElement(WebDriverBy::xpath('//*[@id="main"]/header/div[3]/div/div[2]/div/span'));
        $upload->click();
        sleep(1);
        //$galeria = $driver->findElement(WebDriverBy::xpath('//*[@id="main"]/header/div[3]/div/div[2]/span/div/div/ul/li[1]/input'));
        $driver->executeScript('document.querySelector("#main header div._1i0-u div div.rAUz7._3TbsN span div div ul li:nth-child(1) input").style.display="block";');
        //$galeria->click();
        sleep(5);

        $fileInput = $driver->findElement(WebDriverBy::xpath('//*[@id="main"]/header/div[3]/div/div[2]/span/div/div/ul/li[1]/input'));

        $fileInput->setFileDetector(new LocalFileDetector());
      
        $fileInput->sendKeys($newFotoVideo);
        sleep(1);
        $fileEnviar = $driver->findElement(WebDriverBy::xpath('//*[@id="app"]/div/div/div[2]/div[2]/span/div/span/div/div/div[2]/div/span/div/div[2]/div/div[3]/div[1]/div[2]'));
        sleep(1);
        $fileEnviar->sendKeys(array(WebDriverKeys::ENTER)); 
        sleep(5);
    }     
?>