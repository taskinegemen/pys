<?php
namespace app\helpers;
class Helper
{

    public static function helperStatus($status)
    {
        if($status=="Bekliyor")
        {
            return "warning";
        }
        else if($status=="Ret")
        {
            return "danger";
        }
        else if($status=="Kabül")
        {
            return "success";
        }
        else
        {
            return "success";
        }
    }
}

?>