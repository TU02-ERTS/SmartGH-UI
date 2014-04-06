<?php

$lim = $_GET['limit'] ? $_GET['limit'] : 32;

$data = shell_exec("tail -n $lim /var/log/serialmon/serialmon.dat");

$data_arr = explode("\n", $data);
array_pop($data_arr);

$data_arr = array_map(
    function($line) {
        $num_arr = preg_split("/\s+/", $line);
        return array("T" => date("d-m H:i:s", $num_arr[0]),
                     "t0" => $num_arr[1],
                     "l0" => $num_arr[2],
                     "h0" => $num_arr[3],
                     "t1" => $num_arr[4],
                     "l1" => $num_arr[5],
                     "h1" => $num_arr[6]);
    },
    $data_arr);

echo json_encode($data_arr);

?>
