<?php

namespace RLDatix\Lib;

class Logger
{
    public static function log($message, $status = 'INFO')
    {
        $string = date('Y-m-d H:i:s').' - '.strtoupper($status)."\r\n".$message."\r\n\r\n";
        // Write the contents to the file,
        // using the FILE_APPEND flag to append the content to the end of the file
        // and the LOCK_EX flag to prevent anyone else writing to the file at the same time
        file_put_contents(APP_LOG_FILE, $string, FILE_APPEND | LOCK_EX);
    }
}
