<?php

namespace Vadim\TaskBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class TreeController extends Controller
{
    public function generateAction()
    {
        $rep = $this->get('vadim_task.generate_tree');
        $categories = $rep->getTree();
        $em = $this->getDoctrine()->getManager();

//        $categories = $em->getRepository('VadimTaskBundle:Category')->findAll();

        return $this->render('VadimTaskBundle:Tree:generate.html.twig', array(
            'categories' => $categories,
        ));
    }
}