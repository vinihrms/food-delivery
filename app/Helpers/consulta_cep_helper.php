<?php

if(!function_exists('consultaCep')){

    function consultaCep(string $cep){

        $urlViaCep = "https://viacep.com.br/ws/{$cep}/json/";

        $ch = curl_init();

        curl_setopt($ch, CURLOPT_URL, $urlViaCep);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

        $json = curl_exec($ch);

        $resultado = json_decode($json);

        return  $resultado;
    
    }

}