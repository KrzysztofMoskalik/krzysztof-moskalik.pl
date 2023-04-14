<?php

namespace App\Controller;

class HomeController extends BaseController {
    public function run () {

        $template = $this->twig->load('index.html.twig');

        echo $template->render(['content' => 'home']);
    }

}