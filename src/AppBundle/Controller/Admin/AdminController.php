<?php

namespace AppBundle\Controller\Admin;

use AppBundle\Form\CategoryType;
use Doctrine\ORM\EntityManager;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Form\Form;
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
        return $this->render('@App/admin/menu.html.twig', [
            'menu' => $yml->parse(file_get_contents($this->getParameter('admin.menu'))),
        ]);
    }

    /**
     * @param $parameter
     * @return Response
     * @Route("/list/{parameter}", name="admin.object.list")
     */
    public function listObjectsAction($parameter) {

        $doctrine = $this->getDoctrine();

        $entity = 'AppBundle\\Entity\\'.ucfirst($parameter);

        return $this->render('@App/admin/list_object.html.twig', [
            'objects' => $doctrine->getRepository($entity)->findAll(),
        ]);
    }

    /**
     * @param Request $request
     * @param $object
     * @param null | $id
     * @return Response
     * @Route("/manage/{object}/{id}", name="admin.manage_object")
     */
    public function manageObjectAction(Request $request, $object, $id = null) {

        /** @var EntityManager $em */
        $em = $this->getDoctrine()->getManager();

        /** @var string $entity */
        $entity = 'AppBundle\\Entity\\'.ucfirst($object);

        /** @var string $type */
        $type = 'AppBundle\\Form\\'.ucfirst($object).'Type';

        $data = $em->getRepository($entity)->findOneBy(['id' => $id]);

        /** @var Form $form */
        $form = $this
            ->createForm($type, $data)
            ->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {

            $em->persist($form->getData());

            $em->flush();
        }

        return $this->render('@App/admin/manage_object.html.twig', [
            'form' => $form->createView(),
        ]);

    }
}