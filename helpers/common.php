<?php

if(!function_exists('getFromDateAttribute')){
    function getFromDateAttribute($value, $format = 'd-m-Y H:i:s')
    {
        // goi ham nay bat ky noi dau
        return \Carbon\Carbon::parse($value)->format($format);
    }
}