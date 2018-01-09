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
$template = $twig->loadTemplate('getValue2View.html.twig');

if(isset($_POST['x2'])){
    try{
        $wsdl = "http://soapwebservicetemplate20180108114346.azurewebsites.net/Service1.svc?wsdl";
        $client = new SoapClient($wsdl);
        $numbers = array('x2' => $_POST['x2'], 'x3' => $_POST['x3'], 'x4' => $_POST['x4']);
        $result = $client->GetValue2($numbers);
    } catch(SoapFault $exception){
        print_r($exception->getMessage());
    }

    $default = array('resultat' => 'DivideresXX: ' . $result-> GetValue2Result .'cm', 'x2' => 'X2: '.$numbers['x2'], 'x3' => ' X3: '.$numbers['x3'], 'x4' => ' X4: '.$numbers['x4']);
} else { $default = array('resultat' => "");
}

echo $template->render($default);



?><?php
/**
 * Created by PhpStorm.
 * User: ASW
 * Date: 09/01/2018
 * Time: 00:09
 */