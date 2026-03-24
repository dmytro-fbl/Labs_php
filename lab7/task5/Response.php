<?php

namespace task5;

class Response
{
    private int $statusCode = 200;
    private array $headers = [];

    public function __construct()
    {
        if(!ob_get_level()){
            ob_start();
        }
    }

    public function setStatus($code){
        $this->statusCode = $code;
        return $this;
    }

    public function addHeader($header){
        $this->headers[] = $header;
        return $this;
    }

    public function send($content)
    {
        if(ob_get_length()) ob_clean();

        http_response_code($this->statusCode);

        foreach ($this->headers as $header) {
            header($header);
        }
        echo $content;
        ob_end_flush();
    }
}