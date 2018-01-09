<?php
/**
 * Created by PhpStorm.
 * User: ASW
 * Date: 06/01/2018
 * Time: 14:44
 */
ini_set("soap.wsdl_cache_enabled", "0");

require_once '../vendor/autoload.php';
Twig_Autoloader::register();

$loader = new Twig_Loader_Filesystem('../views');
$twig = new Twig_Environment($loader, array('auto_reload' => true));


try{
    $wsdl = "http://soapwebservicetemplate20180108114346.azurewebsites.net/Service1.svc?wsdl";
    $client1 = new SoapClient($wsdl);
    $result1 = $client1->GetListXX();

    print_r($result1);

} catch(SoapFault $exception){
    print_r($exception->getMessage());
}

   # $array = $result1->GetListXXResult->GetListXX;
   # print_r($array);
    #print "<table border='2'>
//            <tr>
//                <th>Navn</th>
//                <th>X1</th>
//                <th>X2</th>
//                <th>X3</th>
//                <th>X4</th>
//            </tr>
//            ";
//    #foreach ($array as $k => $v) {
//        print "
//            <tr>
//                <td align='right'>" . ($k + 1) . "</td>
//                <td>" . $v->Navn . "</td>
//                <td><img src='" . $v->X1 . "'></td>
//                <td align='right'>" . $v->X2 . "</td>
//                <td align='right'>" . $v->X3 . "</td>
//                <td align='right'>" . $v->X4 . "</td>
//            </tr>";
//    }
//    print "</table>";







#$test = $result1->GetListXXResult();

//$template = $twig->loadTemplate('getListElementsView.html.twig');
//$parametersToTwig = array("XXes"=>$test);
//echo $template->render($parametersToTwig);