<?php

namespace SOS\UserBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;

class DefaultController extends Controller
{
    /**
     * @Route("/welcomepage")
     */
    public function indexAction()
    {
        return $this->render('@SOSUser/Default/index.html.twig');
    }
}
