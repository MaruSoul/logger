<?php

namespace Mary\Logger;

class DbWriter implements WriterInterface
{
    private ?\PDO $pdo = null;

    public function __construct(\PDO $pdo)
    {
        $this->pdo = $pdo;
    }

    public function write(string $formatData): void
    {
        $stm = $this->pdo->prepare("INSERT INTO logs SET `data`=?");
        $stm->execute([$formatData]);
    }
}
