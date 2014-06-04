<?php

namespace Vadim\TaskBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class HomePageController extends Controller
{
    public function homePageAction()
    {
        return $this->render('VadimTaskBundle:HomePage:homePage.html.twig');
    }
}