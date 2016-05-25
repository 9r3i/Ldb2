<?php
//set_time_limit(0);
require_once('Ldb.2.5.php');
$ldb = new Ldb('_test');

$ldb->create_table('test');
$sel = $ldb->select('test','album=Celebrities');

$ri = 0;
/* foreach($sel as $r){
  //$ldb->insert('test',array('nomor'=>$r['aid']+count($sel)));
  $ri++;
  $ldb->update('test','aid='.$r['aid'],array('nomor'=>$r['aid']));
  if($ri==1){
    break;
  }
} */

header('content-type: text/plain');
//print_r($sel);
//print_r($ldb);
echo PHP_EOL.PHP_EOL.$ldb->spend_time().' sec - '.count($sel).' lines'.PHP_EOL;
$result = array();
foreach($sel as $s){
  $result[] = $s['name'];
}
$result = array_unique($result);
print_r(implode(PHP_EOL,$result));
print_r($result);


/* 
SELECT
speed ->
0.0550 sec - 1667 lines
0.0500 sec - 3334 lines
0.4070 sec - 3334 lines (x10)
0.4300 sec - 3334 lines (x10)

INSERT
   1 = 0.0200 sec
  10 = 0.1190 sec
 100 = 2.7542 sec - 912 lines
 100 = 3.1992 sec - 1012 lines

UPDATE
819 lines per 30 sec
29 line per sec
  1 = 0.0580 sec - 1667 lines
  1 = 0.0980 sec - 3334 lines
 10 = 0.3560 sec - 1667 lines
 10 = 0.7300 sec - 3334 lines
100 = 3.3832 sec - 1667 lines
100 = 7.9295 sec - 3334 lines

 */