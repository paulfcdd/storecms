<?php

namespace AppBundle\Controller\Front;

use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

/**
 * Class FrontController
 * @package AppBundle\Front
 * @Route("/")
 */
class FrontController extends Controller
{

    /**
     * @Route("", name="front.index")
     */
    public function indexAction() {
        return $this->render('@App/front/index.html.twig');
    }

}