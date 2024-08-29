<?php
namespace App\Enums;

enum ResponseCodeEnums: int
{

    /*
    |--------------------------------------------------------------------------
    | User
    |--------------------------------------------------------------------------
    */
    case USER_REQUEST_ERROR = 2001;
    case USER_REQUEST_VALIDATION_ERROR = 2002;
    case USER_REQUEST_SUCCESSFUL = 2003;
    case USER_NOT_FOUND = 2004;
    case USER_REQUEST_NOT_FOUND = 2005;
    case USER_SERVICE_REQUEST_ERROR = 2006;
    case USER_PUSH_NOTIFICATION_ERROR = 2007;
    case USER_CANT_INVITE_SELF_ERROR = 2008;




    public function getCode()
    {
        return $this;
    }

    public function toString()
    {
        return match ($this) {
            /*
            |--------------------------------------------------------------------------
            | User Response
            |--------------------------------------------------------------------------
            */
            self::USER_REQUEST_ERROR => [
                'status' => 400,
                'response_code' => $this,
                'message' => $this->name
            ],
            self::USER_NOT_FOUND => [
                'status' => 400,
                'response_code' => $this,
                'message' => $this->name
            ],
            self::USER_REQUEST_NOT_FOUND => [
                'status' => 400,
                'response_code' => $this,
                'message' => $this->name
            ],
            self::USER_REQUEST_VALIDATION_ERROR => [
                'status' => 400,
                'response_code' => $this,
                'message' => $this->name
            ],
            self::USER_REQUEST_SUCCESSFUL => [
                'status' => 200,
                'response_code' => $this,
                'message' => $this->name
            ],
            self::USER_SERVICE_REQUEST_ERROR => [
                'status' => 400,
                'response_code' => $this,
                'message' => $this->name
            ],
            self::USER_PUSH_NOTIFICATION_ERROR => [
                'status' => 400,
                'response_code' => $this,
                'message' => $this->name
            ],
            self::USER_CANT_INVITE_SELF_ERROR => [
                'status' => 400,
                'response_code' => $this,
                'message' => $this->name
            ],


        };
    }
}
