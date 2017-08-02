<?php
function ref500($i){// вывод списока id
    $subdomain = '************'; //Aккаунт - поддомен

    $limit_rows1 = $i * 500;
	$link = 'https://' . $subdomain . '.amocrm.ru/private/api/v2/json/leads/list?limit_rows=' . $limit_rows1 . '&limit_offset=500';
	$out = initialization($link);

    $Response = json_decode($out,true);
    $Response = $Response['response']['leads'];
    
    echo '<br>';
    $varId = [];
        foreach($Response as $v) {
            if (is_array($v))
                $varId[] = $v['id'];
           }
        return $varId;
}