<?php

namespace Mary\Logger;

class Formatter implements FormatterInterface
{
    public function format($level, string|\Stringable $message, array $context = []): string
    {
        return date('d:m:Y H:i:s') . " {$level}: {$message} | " . json_encode($context);
    }
}

