<?php

namespace App\Service;

use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\DependencyInjection\ParameterBag\ParameterBagInterface;

/**
 * Classe abstraite dédiée aux services
*/
abstract class AbstractService
{
    private readonly ParameterBagInterface $params;
    private readonly EntityManagerInterface $em;

    public function __construct(
        ParameterBagInterface $params,
        EntityManagerInterface $em)
    {
        $this->params = $params;
        $this->em = $em;
    }
}
                    