<?php

namespace App\Controllers;


abstract class AbstractController
{

    /**
     * This should be handled by a templating service, but our application is too small to take that into consideration.
     *
     * @param  string $name
     * @param  array  $variables
     * @return string
     */
    public function view($name, array $variables = [])
    {
        extract($variables);

        ob_start();
        include base_path('resources/views/'.$name.'.php');
        $contents = ob_get_clean();
        return $contents;
    }
}