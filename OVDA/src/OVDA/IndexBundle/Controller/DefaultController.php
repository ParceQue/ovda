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
        $email = "";
        $accountEntity = new Account();
        $subForm = $this->get('form.factory')->create(new AccountType(), $accountEntity);

        $request = $this->get('request');
        $cookies = $request->cookies;

        if ($cookies->has('email')) {
            $email = $cookies->get('email');
        }


        return $this->render('default/index.html.twig',
            array(
                'subForm' => $subForm->createView(),
                'email' => $email
            )
        );
    }
}
