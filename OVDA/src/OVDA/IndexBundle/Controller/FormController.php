<?php
/**
 * Created by PhpStorm.
 * User: Utilisateur
 * Date: 2015-01-01
 * Time: 11:58
 */

namespace OVDA\IndexBundle\Controller;


use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Symfony\Component\HttpFoundation\Request;


class FormController extends Controller {

    /**
     * @Route("/{type}", name="forms")
     */
    public function indexAction($type = null)
    {
        $className = "OVDA\IndexBundle\Entity\\" . $type;
        $typeEntity = new $className();
        $typeType  = "OVDA\IndexBundle\Form\\" . $type . "Type";
        $form = $this->get('form.factory')->create(new $typeType(), $typeEntity);

        return $this->render('default/forms.html.twig',
            array(
                'type' => $type,
                'form' => $form->createView()
            )
        );
    }

    /**
     * @Route("/{type}/create", name="create")
     */
    public function create($type = null, Request $request) {
        $className = "OVDA\IndexBundle\Entity\\" . $type;
        $typeEntity = new $className();
        $typeType  = "OVDA\IndexBundle\Form\\" . $type . "Type";
        $form = $this->get('form.factory')->create(new $typeType(), $typeEntity);

        $form->handleRequest($request);

        if ($form->isValid()) {
            $typeEntity = $form->getData();
            $em = $this->getDoctrine()->getManager();
            $em->persist($typeEntity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('forms'));
    }
}