<?php
/**
 * Created by PhpStorm.
 * User: Utilisateur
 * Date: 2015-01-03
 * Time: 11:36
 */

namespace OVDA\IndexBundle\Controller;


use OVDA\IndexBundle\Entity\Account;
use OVDA\IndexBundle\Form\AccountType;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Config\Definition\Exception\Exception;
use Symfony\Component\HttpFoundation\JsonResponse;use Symfony\Component\HttpFoundation\Response;

class AccountController extends Controller {

    public function subAccountCreationAction() {
        $request = $this->container->get('request');
        $success = false;
        $message = "";

        if ($request->isXmlHttpRequest()) {
            $account = new Account();
            $subForm = $this->get('form.factory')->create(new AccountType(), $account);

            $email = $request->get('email');
            $password = $request->get('password');

            if ($email && $password) {
                $account->setEmail($email);
                $account->setPassword($password);
                try {
                    $em = $this->getDoctrine()->getManager();
                    $em->persist($account);
                    $em->flush();
                    $success = true;
                    $message = 'Merci de vous être enregistré!';
                } catch (\Doctrine\DBAL\DBALException $e) {
                    $success = false;
                    $message = "Cet email est déjà utilisé";
                }

            }
        }

       $response = new JsonResponse();
       $response->setData(array(
           'success' => $success,
           'message' => $message
       ));

        return $response;
    }

}