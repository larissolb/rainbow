<?php
class Controller
{
    public function generateResponse($view, array $data,
                                     $template='template_rainbow.php')
    {
        extract($data);
        require_once __DIR__ . '/../Views/' . $template;
    }
}