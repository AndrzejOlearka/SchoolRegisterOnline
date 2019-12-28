<?php

namespace Core\View;

/**
 * View render.
 *
 */
class View
{
    /**
     * Render a view file
     *
     * @param string $view view name
     * @param array $args data displaying in view
     *
     * @return void
     */
    public static function render($view, $args = [])
    {
        extract($args, EXTR_SKIP);

        $file = "../App/Views/{$view}.php";  // relative to Core directory

        if (is_readable($file)) {
            require $file;
        } else {
            throw new \Exception("$file not found");
        }
    }
}