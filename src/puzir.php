<?php
foreach ($_POST['arr'] as $key => $value){
    if (!empty($value)) {
        $arr[]=$value;
    }
}
$was = $arr;

function puzirik(&$arr)
{
    for ($i = 0; $i < count($arr); $i++) {
        if (!empty($arr[$i + 1])) {
            if ($arr[$i] > $arr[$i + 1]) {
                $temp_arr = $arr[$i];
                $arr[$i] = $arr[$i + 1];
                $arr[$i + 1] = $temp_arr;
            }
        }
    }
    return $arr;
}

foreach ($arr as $value) {
    puzirik($arr);
}

$result = [
    'bilo' => $was,
    'stalo' => $arr
];

echo json_encode($result);

