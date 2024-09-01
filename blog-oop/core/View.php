<?php

namespace Core;

use RuntimeException;

class View {
  public static function render(string $template, array $data = [], string $layout = null): string {
    $content = static::renderTemplate(
      $template,
      $data
    );
    return static::renderLayout($layout, $data, $content);
  }

  public static function partial(string $template, array $data = []): string {
    return static::renderTemplate("/partials/$template", $data);
  }

  protected static function renderTemplate(string $template, array $data): string {
    extract($data);
    $path = dirname(__DIR__) . "/app/Views/$template.php";

    if (!file_exists($path)) {
      throw new RuntimeException("Error: Template file not found: $path");
    }

    ob_start();
    require $path;
    return ob_get_clean();
  }

  protected static function renderLayout(?string $template, array $data, string $content): string {
    if (null === $template) {
      return $content;
    }

    extract([...$data, 'content' => $content]);
    $path = dirname(__DIR__) . "/app/Views/$template.php";

    if (!file_exists($path)) {
      throw new RuntimeException("Error: Layout file not found: $path");
    }

    ob_start();
    require $path;
    return ob_get_clean();
  }
}