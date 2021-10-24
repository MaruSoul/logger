<?php

namespace Mary\Logger;

class FileWriter implements WriterInterface
{
    private $fileName;

    public function __construct(string $fileName = 'logger.txt')
    {
        $this->fileName = 'logs/' . $fileName;
    }


    public function write(string $formatData): void
    {
        file_put_contents($this->fileName, $formatData . ';' . PHP_EOL, FILE_APPEND);
    }
}
