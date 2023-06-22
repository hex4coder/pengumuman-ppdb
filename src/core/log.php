<?php

class UA_Logger
{
    public static function log($message)
    {
        echo ("[INFO] $message <br/>");
    }

    public static function danger($message)
    {
        echo ("[DANGER] $message <br/");
    }
}
