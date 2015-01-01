<?php

namespace OVDA\IndexBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;

class DefaultController extends Controller
{
    /**
     * @Route("/", name="homepage")
     */
    public function indexAction()
    {
        $temoignages = $this->getDoctrine()->getManager()->getRepository("OVDAIndexBundle:Temoignage")->findAll();
        return $this->render('default/index.html.twig',
            array(
                'temoignages' => $temoignages
            )
        );
    }
}
