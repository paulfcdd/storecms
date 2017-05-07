<?php

namespace AppBundle\Controller\Front;

use AppBundle\Entity\Category;
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

        $doctrine = $this->getDoctrine();

        return $this->render('@App/front/index.html.twig', [
            'categories' => $doctrine->getRepository(Category::class)->findByParent(null),
        ]);
    }

}