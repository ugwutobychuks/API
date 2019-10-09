<?php
require_once('config.php');
class API {
    function Select(){
        $db = new Connect;
        $countrylist = array();
        $data = $db->prepare ('SELECT * FROM countrylist ORDER BY id');
        $data->execute();
        while($OutPutData = $data->fetch(PDO::FETCH_ASSOC)){
            $countrylist[$OutPutData['id']] = array (
                'id'            => $OutPutData['id'],
                'country'       => $OutPutData['country'],
                'countrycode'   => $OutPutData['countrycode'],
                'currency'      => $OutPutData['currency'],
                'currencycode'  => $OutPutData['currencycode'],
            );
        }
        return json_encode($countrylist);
    }
}
$API = new API;
header('COntent-Type:application/json');
echo $API->Select();
?>