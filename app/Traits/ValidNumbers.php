<?php

namespace App\Traits;

trait ValidNumbers
{

    public function validNumbers($customers)
    {
        foreach ($customers as $key => $value) {
            if (
                preg_match('/\(237\)\ ?[2368]\d{7,8}/', $value->phone) ||
                preg_match('/\(251\)\ ?[1-59]\d{8}/', $value->phone) ||
                preg_match('/\(212\)\ ?[5-9]\d{8}/', $value->phone) ||
                preg_match('/\(256\)\ ?\d{9}/', $value->phone) ||
                preg_match('/\(258\)\ ?[28]\d{7,8/', $value->phone)
                ) {
                $customers[$key]['valid'] = "Valid";
            } else {
                $customers[$key]['valid'] = "Not Valid";
            }
        }
        return $customers;
    }

}
