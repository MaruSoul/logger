<?php

namespace Mary\Logger;

interface WriterInterface
{
    public function write(string $formattedData): void;
}
