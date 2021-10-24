<?php

namespace Mary\Logger;

use Psr\Log\LogLevel;
use Psr\Log\LoggerInterface;

class Logger implements LoggerInterface
{
    private ?WriterInterface $writer = null;
    private ?FormatterInterface $formatter = null;

    public function __construct(WriterInterface $writer, FormatterInterface $formatter) {
        $this->writer = $writer;
        $this->formatter = $formatter;
    }

    public function emergency(string|\Stringable $message, array $context = []): void
    {
        $this->log(LogLevel::EMERGENCY, $message, $context);
    }

    public function alert(string|\Stringable $message, array $context = []): void
    {
        $this->log(LogLevel::ALERT, $message, $context);
    }

    public function critical(string|\Stringable $message, array $context = []): void
    {
        $this->log(LogLevel::CRITICAL, $message, $context);
    }

    public function error(string|\Stringable $message, array $context = []): void
    {
        $this->log(LogLevel::ERROR, $message, $context);
    }

    public function warning(string|\Stringable $message, array $context = []): void
    {
        $this->log(LogLevel::WARNING, $message, $context);
    }

    public function notice(string|\Stringable $message, array $context = []): void
    {
        $this->log(LogLevel::NOTICE, $message, $context);
    }

    public function info(string|\Stringable $message, array $context = []): void
    {
        $this->log(LogLevel::INFO, $message, $context);
    }

    public function debug(string|\Stringable $message, array $context = []): void
    {
        $this->log(LogLevel::DEBUG, $message, $context);
    }

    public function log($level, string|\Stringable $message, array $context = []): void
    {
        $formatData = $this->format($level, $message, $context);
        $this->write($formatData);
    }

    public function format($level, string|\Stringable $message, array $context = []): string
    {
        return $this->formatter->format($level, $message, $context);
    }

    public function write(string $formatData): void
    {
        $this->writer->write($formatData);
    }
}
