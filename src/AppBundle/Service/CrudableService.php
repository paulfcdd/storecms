<?php

namespace AppBundle\Service;

use Doctrine\ORM\EntityManager;

/**
 * Class CrudableService
 * @package AppBundle\Service
 */
class CrudableService
{
    /** @var EntityManager */
    private $em;

    /**
     * CrudableService constructor.
     * @param EntityManager $em
     */
    public function __construct(EntityManager $em) {
        $this->em = $em;
    }

    public function save() {
    }

    public function delete() {

    }


}