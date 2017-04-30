<?php

namespace AppBundle\Controller\Admin;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * Class AdminController
 * @package AppBundle\Controller\Admin
 * @Route("/")
 */
class AdminController extends Controller
{
    /**
     * @Route("admin", name="admin.index")
     */
    public function indexAction() {

        return new Response('admin');
    }
}