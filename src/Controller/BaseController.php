<?php

namespace App\Controller;

use Symfony\Component\HttpFoundation\Request;
use Twig\Environment;

class BaseController implements ControllerInterface {

    /** @var Environment $twig */
    protected $twig;

    /** @var Request $request */
    protected $request;

    /** @var array $params */
    protected $params;

    /**
     * BaseController constructor.
     *
     * @param Environment $twig
     * @param Request $request
     * @param array $params
     */
    public function __construct (Environment $twig, Request $request, array $params) {
        $this->twig = $twig;
        $this->request = $request;
        $this->params = $params;
    }

    public function run () {
        // TODO: Implement run() method.
    }

}