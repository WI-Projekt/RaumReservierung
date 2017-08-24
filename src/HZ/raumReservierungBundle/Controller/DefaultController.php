<?php

namespace HZ\raumReservierungBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction()
    {
        return $this->render('HZraumReservierungBundle:Default:index.html.twig');
    }
}
