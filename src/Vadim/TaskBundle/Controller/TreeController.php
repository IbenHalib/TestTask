<?php

namespace Vadim\TaskBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class TreeController extends Controller
{
    public function generateAction()
    {
        $repository = $this->get('vadim_task.generate_tree');
        $categories = $repository->getTree();

        return $this->render('VadimTaskBundle:Tree:generate.html.twig', array(
            'categories' => $categories,
        ));
    }
}