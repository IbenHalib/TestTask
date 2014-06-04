<?php

namespace Vadim\TaskBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Vadim\TaskBundle\Entity\Creator;
use Vadim\TaskBundle\Form\Type\FiltrationType;
use Vadim\TaskBundle\Form\Type\CreatorType;

class CreatorController extends Controller
{

    public function newAction(Request $request)
    {
        $form = $this->createForm(new CreatorType());
        $form->handleRequest($request);

        if ($form->isValid()) {
            /** @var Creator $creator */
            $creator =$form->getData();

            $this->getDoctrine()->getManager()->persist($creator);
            $this->getDoctrine()->getManager()->flush();

            return $this->redirect($this->generateUrl('creator_new'));
        }

        return $this->render('VadimTaskBundle:Creator:new.html.twig', ['form' => $form->createView()]);
    }

    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();
        $creators = $em->getRepository('VadimTaskBundle:Creator')->findAll();

        return $this->render('VadimTaskBundle:Creator:index.html.twig', array(
            'creators' => $creators,
        ));
    }

    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();
        $creator = $em->getRepository('VadimTaskBundle:Creator')->find($id);

        if (!$creator) {
            throw $this->createNotFoundException('Unable to find Category entity.');
        }

        return $this->render('VadimTaskBundle:Creator:show.html.twig', array(
            'creator'      => $creator,
        ));
    }

    public function filtrationAction(Request $request)
    {
        $form = $this->createForm(new FiltrationType());
        $form->handleRequest($request);

        if ($form->isValid()) {

            $creatorRepository = $this->get('vadim_task.creator_entity_repository');
            $query = $this->getQuery($form->getData()['filtrationType']);
            $creators = $creatorRepository->$query($form->getData()['filtrationData']);

            return $this->render('VadimTaskBundle:Creator:index.html.twig', array(
                'creators' => $creators,
            ));
        }

        return $this->render('VadimTaskBundle:Creator:filtration.html.twig', ['form' => $form->createView()]);
    }

    protected function getQuery($type)
    {

        return 'findBy'.$type.'DateStartCareerQuery';
    }


}
