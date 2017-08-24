<?php

namespace HZ\raumReservierungBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class RaumReservierungController extends Controller
{
    public function indexAction()
    {
        return $this->render('HZraumReservierungBundle:RaumHtml:index.html.twig');
    }
}
