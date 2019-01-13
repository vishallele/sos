<?php

namespace SOS\UserBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\Security\Http\Authentication\AuthenticationUtils;

class SecurityController extends Controller
{
    /**
     * @Route("/login", name="Login")
     */
    public function loginAction(AuthenticationUtils $authenticationUtils)
    {
        //get the login error if there is one
        $error = $authenticationUtils->getLastAuthenticationError();
        
        //last user name entered by user
        $lastUsername = $authenticationUtils->getLastUsername();
        
        return $this->render('@SOSUser/Security/login.html.twig', array(
            'error' => $error,
            'lastUsername' => $lastUsername
        ));
    }

}
