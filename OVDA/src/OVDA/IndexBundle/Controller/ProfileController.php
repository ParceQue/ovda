<?php

namespace OVDA\IndexBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;

class ProfileController extends Controller
{
    /**
     * @Route("/profile/")
     */
    public function indexAction()
    {
        return $this->render('default/profile.html.twig');
    }
}
