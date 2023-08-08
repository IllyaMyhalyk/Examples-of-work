<?php

class DataProcessing {

    private $response;

    public function __construct(SendMessage $response) {
        $this->response = $response;
        $this->textResponse();
        $this->imageResponse();
    }

    public function textResponse() {
        array_walk($_POST, function(&$value, $key) {
            $value = "{$key}:{$value}";
        });

        $arr = [
            'chat_id' => -1001855194624,
            'parse_mode' => 'HTML',
            'text' => str_replace(',', PHP_EOL, implode(', ', $_POST))
        ];
        $this->response->send('sendMessage', $arr);
    }

    public function getName() {
        if (!empty($_POST['name'])) {
            return $_POST['name'];
        }
        return;
    }

    public function imageResponse() {
        if (empty($_FILES)) {
            return;
        }
        $arr = [
            'chat_id' => -1001855194624,
            'caption' => $this->getName(),
            'photo'=> new CurlFile($_FILES['file']['tmp_name'], $_FILES['file']['type'], $_FILES['file']['name']),
        ];
        $this->response->send('sendPhoto', $arr);
    }

}