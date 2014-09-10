<?PHP
  // Original PHP code by Chirp Internet: www.chirp.com.au
  // Please acknowledge use of this code by including this header.
//$conn = oci_connect('ultimus', 'ultimus', '192.168.0.87/pblprim');
$conn = oci_connect('ict_mamun', 'Premier_007', '10.200.1.5/pbldb2');

if (!$conn) {
    $e = oci_error();
    trigger_error(htmlentities($e['message'], ENT_QUOTES), E_USER_ERROR);
	exit();
}
  $sql="select t.account_number,t.acc_title,t.branch_id,t.product_id,
a.customer_concentration_id,a.sector_sbs_id,t.ro_emp_id,t.curr_id,
to_char(t.acc_open_dt,'DD-MON-RR') acc_open_dt,t.opening_balance_lcy,t.current_balance_lcy,t.closing_balance_lcy,
t.prod_int_tot_cr,t.customer_id,to_char(A.MAKE_DT,'DD-MON-RR') customer_create_date--,si.order_amt,si.ord_creat_dt,si.ins_type,to_date(A.MAKE_DT,'dd-mm-yyyy') customer_create_date
from rtl_demand_ac_mast t,cor_cus_profile a
where t.customer_id=a.customer_id(+) and T.ACC_STATUS <>'C'";
  
  $statement = ociparse($conn, $sql);
	ociexecute($statement);
	$data=oci_fetch_array($statement);
	/*
  $data = array(
    array("firstname" => "Mary", "lastname" => "Johnson", "age" => 25),
    array("firstname" => "Amanda", "lastname" => "Miller", "age" => 18),
    array("firstname" => "James", "lastname" => "Brown", "age" => 31),
    array("firstname" => "Patricia", "lastname" => "Williams", "age" => 7),
    array("firstname" => "Michael", "lastname" => "Davis", "age" => 43),
    array("firstname" => "Sarah", "lastname" => "Miller", "age" => 24),
    array("firstname" => "Patrick", "lastname" => "Miller", "age" => 27)
  );
  */
  function cleanData($str)
  {
    $str = preg_replace("/\t/", "\\t", $str);
    $str = preg_replace("/\r?\n/", "\\n", $str);
    if(strstr($str, '"')) $str = '"' . str_replace('"', '""', $str) . '"';
  }
/*
  function cleanData(&$str)
  {
    $str = preg_replace("/\t/", "\\t", $str);
    $str = preg_replace("/\r?\n/", "\\n", $str);
    if(strstr($str, '"')) $str = '"' . str_replace('"', '""', $str) . '"';
  }*/

  // file name for download
  /*
  $filename = "website_data_" . date('Ymd') . ".xls";

  header("Content-Disposition: attachment; filename=\"$filename\"");
  header("Content-Type: application/vnd.ms-excel");
*/

$filename = "AuditReport.xls"; 
    header("Content-Type: text/plain");
    header("Content-Disposition: attachment; filename=\"$filename\""); 
    header("Content-Type: application/vnd.ms-excel;charset=UTF-16LE");
	
	
	$flag = false;
while($row = oci_fetch_assoc($statement)) 
{   
   // echo "Hello";
    if(!$flag)
    {
        echo implode("\t", array_keys($row)) . "\r\n";
        $flag = true;
    }
        array_walk($row, 'cleanData');
        echo implode("\t", array_values($row)) . "\r\n";
}
        exit;
	
	
/*
  $flag = false;
  foreach($data as $row) {
  if(!$flag) {
      // display field/column names as first row
      echo implode("\t", array_keys($row)) . "\n";
      $flag = true;
    }
	
   array_walk($row, 'cleanData');
    echo implode("\t", array_values($row)) . "\n";
  }
  */

?>