<?php

namespace AppBundle\Controller\Security;

use FOS\UserBundle\Controller\SecurityController as Base;

/**
 * Class SecurityController
 * @package AppBundle\Controller\Security
 * {@inheritdoc}
 */
class SecurityController extends Base
{
    public function renderLogin(array $data)
    {
        if ('admin_login' == $this->get('request_stack')->getCurrentRequest()->attributes->get('_route')) {
            $template = '@App/admin/login.html.twig';
        } else {
            $template = 'FOSUserBundle::Security::login.html.twig';
        }

        return $this->render($template, $data);
    }
}