<?php

namespace OVDA\IndexBundle\Controller;

use OVDA\IndexBundle\Entity\Account;
use OVDA\IndexBundle\Form\AccountType;
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
        $accountEntity = new Account();
        $subForm = $this->get('form.factory')->create(new AccountType(), $accountEntity);

        return $this->render('default/index.html.twig',
            array(
                'subForm' => $subForm->createView()
            )
        );
    }
}
