<?php

namespace AppBundle\Controller\Admin;

use Symfony\Component\Routing\Annotation\Route;

/**
 * Class SettingsController
 * @package AppBundle\Controller\Admin
 * @Route("/admin/settings")
 */
class SettingsController
{
    /**
     * @Route("/general", name="admin.settings.general")
     */
    public function settingsGeneralAction() {

    }

    /**
     * @Route("/localization", name="admin.settings.localization")
     */
    public function settingsLocalizationAction() {

    }
}