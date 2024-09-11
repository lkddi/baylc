<?php

namespace App\Exceptions;

use Exception;

class WokeException extends Exception
{
    protected array $data;

    public function __construct($message, $data = [], $code = 208)
    {
        parent::__construct($message, $code);
        $this->data = $data;
    }

// 可以通过这个 getter 方法获取 $data 属性

    public function getData()
    {
        return $this->data;
    }

    public function render($request)
    {
        return response()->json([
            'message' => $this->getMessage(),
//            'code' => $this->getCode(),
            'data' => $this->data,
        ], $this->getCode());
    }


}
