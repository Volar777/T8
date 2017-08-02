<?php
function sdel ($n1 = 200){
    global $comp;
    $AA = [];
    for ($i = 0; $i < $n1; $i++){
        $AA[] = ['name' => "Sdelka $i",
            'linked_company_id' => $comp[$i]
        ];
    }
    $leads['request']['leads']['add'] = $AA;

    $subdomain='****************'; //Аккаунт - поддомен
	//Формируем ссылку для запроса
    $link = 'https://'.$subdomain.'.amocrm.ru/private/api/v2/json/leads/set';

    $out = initialization($link,$leads,'POST','J');

    $Response = json_decode($out,true);
    $Response = $Response['response']['leads']['add'];

    global $sdel;
    $sdel = [];
    foreach($Response as $v){
        if(is_array($v)) {
            $sdel[] = $v['id'];
        }
    }
    sleep(1);
}