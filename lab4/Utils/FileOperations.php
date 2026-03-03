<?php

class FileOperations
{
    static string $dir="text";

    static public function readFile(string $fileName): string{
        $filePath = self::$dir . DIRECTORY_SEPARATOR . $fileName;
        if(file_exists($filePath))
            return file_get_contents($filePath);
        return "Файл не знайдено";
    }
    static public function writeFile(string $fileName, string $content): void{
        $filePath = self::$dir . DIRECTORY_SEPARATOR . $fileName;
        file_put_contents($filePath, $content, FILE_APPEND);
    }

    static public function deleteFile(string $fileName): void{
        $filePath = self::$dir . DIRECTORY_SEPARATOR . $fileName;
        file_put_contents($filePath, "");
    }
}