<?php
defined('BASEPATH') OR exit('No direct script access allowed');

function prediction($stock, $classifier)
{
  $ci = &get_instance();
  $cmd = 'java -classpath "assets/upload/weka.jar" weka.core.converters.CSVLoader -N "last" assets/balance_csv.csv > assets/stock.arff ';
  exec($cmd,$output);
  $cmd = 'java -classpath "assets/upload/weka.jar" '.$classifier.' -t assets/stock.arff -d assets/upload/'.$stock.'.model -p 12';
  exec($cmd,$output);
  for ($i=5;$i<sizeof($output);$i++)
  {
    $data[$i-5]  = explode(",",preg_replace('/\s+/', ',', trim(preg_replace('@[^A-Z\ ]@', "", $output[$i]))).",<br>");
    $out[$i-5] = $data[$i-5][1];
  }
  return $out[0];
}

?>
