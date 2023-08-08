<?php

class SendMessage {

    const TOKEN = '5649346806:AAEXG3HUHOc_fEccxHkA67fmi2GQebbacJw';
    const URL = 'https://api.telegram.org/bot' . self::TOKEN;

    public function send($method, $param) {
        $ch = curl_init(self::URL . '/' . $method);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $param);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($ch, CURLOPT_HEADER, false);
        $res = curl_exec($ch);
        curl_close($ch);
    }
}