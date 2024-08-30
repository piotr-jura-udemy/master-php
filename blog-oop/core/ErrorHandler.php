<?php

namespace Core;

class ErrorHandler {
  public static function handleException(\Throwable $exception) {
    // 1) Log the error
    static::logError($exception);
    // php bin/load_schema.php
    if (php_sapi_name() === 'cli') {
      static::renderCliError($exception);
    } else {
      static::renderErrorPage($exception);
    }
  }

  private static function renderCliError(\Throwable $exception): void {
    $isDebug = App::get('config')['app']['debug'] ?? false;

    if ($isDebug) {
      $errorMessage = static::formatErrorMessage(
        $exception,
        "\033[31m[%s] Error:\033[0m %s: %s in %s on line %d\n"
      );
      $trace = $exception->getTraceAsString();
    } else {
      $errorMessage = "\033[31mAn unexpected error occurred. Please check error log for details.\033[0m\n";
      $trace = "";
    }

    fwrite(STDERR, $errorMessage);
    if ($trace) {
      fwrite(STDERR, "\nStack trace:\n$trace\n");
    }
    exit(1);
  }

  private static function renderErrorPage(\Throwable $exception): void {
    $isDebug = App::get('config')['app']['debug'] ?? false;

    if ($isDebug) {
      $errorMessage = static::formatErrorMessage(
        $exception,
        "[%s] Error: %s: %s in %s on line %d\n"
      );
      $trace = $exception->getTraceAsString();
    } else {
      $errorMessage = "An unexpected error occurred. Please check error log for details.";
      $trace = "";
    }

    http_response_code(500);
    echo View::render('errors/500', [
      'errorMessage' => $errorMessage,
      'trace' => $trace,
      'isDebug' => $isDebug
    ], 'layouts/main');
    exit();
  }

  private static function logError(\Throwable $exception): void {
    $logMessage = static::formatErrorMessage(
      $exception,
      "[%s] Error: %s: %s in %s on line %d\n"
    );
    error_log($logMessage, 3, __DIR__ . '/../logs/error.log');
  }

  public static function handleError($level, $message, $file, $line) {
    $exception = new \ErrorException($message, 0, $level, $file, $line);
    self::handleException($exception);
  }

  private static function formatErrorMessage(\Throwable $exception, string $format): string {
    return sprintf(
      $format,
      date('Y-m-d H:i:s'),
      get_class($exception),
      $exception->getMessage(),
      $exception->getFile(),
      $exception->getLine()
    );
  }
}