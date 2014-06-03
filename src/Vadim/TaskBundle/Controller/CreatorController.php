<?php

namespace Vadim\TaskBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Symfony\Component\HttpFoundation\Request;
use Vadim\TaskBundle\Entity\Creator;
use Vadim\TaskBundle\Form\Type\CreatorType;

class CreatorController extends Controller
{

    public function newAction(Request $request)
    {
        $form = $this->createForm(new CreatorType());
        $form->handleRequest($request);

        if ($form->isValid()) {
            /** @var Creator $creator */
            $creator = $form->getData();
            $this->getDoctrine()->getManager()->persist($creator);
            $this->getDoctrine()->getManager()->flush();

            return $this->redirect($this->generateUrl('vadim_task_new'));
        }

        return $this->render('VadimTaskBundle:Creator:new.html.twig', ['form' => $form->createView()]);
    }

}
