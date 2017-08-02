<?php

function cont($n1 = 200)
{
    global $sdel;
    $AA = [];
    for ($i = 0; $i < $n1; $i++){
        $AA[] = ['name' => "Kontact $i",
            'linked_leads_id' => $sdel[$i]
        ];
    }

    $contacts['request']['contacts']['add'] = $AA;

    $subdomain = '***************'; #Аккаунт - поддомен
    //Формируем ссылку для запроса
    $link = 'https://' . $subdomain . '.amocrm.ru/private/api/v2/json/contacts/set';

    $out=initialization($link,$contacts,'POST','J');
    
    $Response = json_decode($out, true);
    $Response = $Response['response']['contacts']['add'];

    sleep(1);
}