<?php

namespace Ibrokhim\AlifPhp\Services;

class FileIOService
{

    public function readFromFile(string $filename): string
    {
        return file_get_contents($filename);
    }

    public function writeToFile(string $filename, string $data, int $flag = FILE_APPEND | LOCK_EX): bool
    {
        return file_put_contents($filename, $data, $flag);
    }
}