<?php

namespace AppBundle\Controller\Admin;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Yaml\Parser;

/**
 * Class AdminController
 * @package AppBundle\Controller\Admin
 * @Route("/admin")
 */
class AdminController extends Controller
{
    /**
     * @Route("", name="admin.index")
     */
    public function indexAction() {

        dump($this->get('security.authorization_checker')->isGranted('ROLE_SUPER_ADMIN'));

        return $this->render('@App/admin/index.html.twig');
    }

    /**
     * @return Response
     */
    public function renderMenuAction() {
        $yml = new Parser();

        $menu = $yml->parse(file_get_contents($this->getParameter('admin.menu')));

        return $this->render('@App/admin/menu.html.twig', [
            'menu' => $menu,
        ]);
    }

    /**
     * @param mixed $parameter
     * @Route("/list/{parameter}", name="admin.object.list")
     */
    public function listObjectsAction($parameter) {
        return new Response($parameter);
    }

    /**
     * @param null $parameter
     * @param Request $request
     * @Route("/manage/{parameter}", name="admin.manage_object")
     */
    public function manageObjectAction($parameter = null, Request $request) {

    }
}