<?php
/**
 * Created by PhpStorm.
 * User: ASW
 * Date: 06/01/2018
 * Time: 13:47
 */

require_once '../vendor/autoload.php';
Twig_Autoloader::register();

$loader = new Twig_Loader_Filesystem('../views');
$twig = new Twig_Environment($loader, array('auto_reload' => true));
$template = $twig->loadTemplate('getValue1View.html.twig');

if(isset($_POST['x1'])){
    try{
        $wsdl = "http://soapwebservicetemplate20180108114346.azurewebsites.net/Service1.svc?wsdl";
        $client = new SoapClient($wsdl);
        $numbers = array('x1' => $_POST['x1'], 'x2' => $_POST['x2'], 'x3' => $_POST['x3']);
        $result = $client->GetValue1($numbers);
    } catch(SoapFault $exception){
        print_r($exception->getMessage());
    }

    $default = array('resultat' => 'GangesXX: ' . $result-> GetValue1Result .'Cm3', 'x1' => 'X1: '.$numbers['x1'], 'x2' => ' X2: '.$numbers['x2'], 'x3' => ' X3: '.$numbers['x3']);
} else { $default = array('resultat' => "");
}

echo $template->render($default);



?>