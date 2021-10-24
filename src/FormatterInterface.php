<?php

namespace Mary\Logger;

interface FormatterInterface
{
    public function format($level, string|\Stringable $message, array $context = []): string;
}

