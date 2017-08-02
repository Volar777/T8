<?php
function sdelRevArr ($arr,$i,$id_fields){

    $BB = [];
    $arrr = $arr[$i];
    foreach($arrr as $v) {
        $time1 = time();
        $BB[] = [
                'id' => "$v",
                'name' => 'Keep Calm443',
                'last_modified' => "$time1",
                'custom_fields' => [
						[
                        //Нестандартное дополнительное поле типа "мультисписок", которое мы создали
                        'id' => (int)$id_fields,
                        'values' => ['tho']
						]
					]
                ];
     }
    $leads['request']['leads']['update'] = $BB;

    $subdomain = '*************'; //Aккаунт - поддомен
    //Формируем ссылку для запроса
    $link = 'https://'.$subdomain.'.amocrm.ru/private/api/v2/json/leads/set';
    $out = initialization($link,$leads,'POST','J');
}