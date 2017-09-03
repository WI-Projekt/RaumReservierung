<?php

namespace HZ\raumReservierungBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class RaumReservierungController extends Controller
{
    public function indexAction(Request $request)
    {
        $em = $this->getDoctrine()->getManager();
        $gebaeude = $em->getRepository('HZraumReservierungBundle:Gebaeude')->findAll();
        return $this->render('HZraumReservierungBundle:RaumHtml:index.html.twig', array('gebaeude' => $gebaeude));
    }

    public function gebauedeRaumAction($gebaeude , Request $request){

      $em = $this->getDoctrine()->getManager();
      $raeume = $em->getRepository('HZraumReservierungBundle:Raum')->byGebaeude($gebaeude);
      return $this->render('HZraumReservierungBundle:RaumHtml:gebauedeRaum.html.twig', array('raeume' => $raeume));
    }

    public function raumInfosAction($raum , Request $request){
      $em = $this->getDoctrine()->getManager();
      $infos = $em->getRepository('HZraumReservierungBundle:Raum')->find($raum);
      return $this->render('HZraumReservierungBundle:RaumHtml:raumInfos.html.twig', array('infos' => $infos));
    }

    public function reservierungAction(){
      return $this->render('HZraumReservierungBundle:RaumHtml:reservierung.html.twig');
    }
}
