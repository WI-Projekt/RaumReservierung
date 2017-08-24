<?php

namespace HZ\raumReservierungBundle\Controller;

use HZ\raumReservierungBundle\Entity\Reservierung;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

/**
 * Reservierung controller.
 *
 */
class ReservierungController extends Controller
{
    /**
     * Lists all reservierung entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $reservierungs = $em->getRepository('HZraumReservierungBundle:Reservierung')->findAll();

        return $this->render('reservierung/index.html.twig', array(
            'reservierungs' => $reservierungs,
        ));
    }

    /**
     * Creates a new reservierung entity.
     *
     */
    public function newAction(Request $request)
    {
        $reservierung = new Reservierung();
        $form = $this->createForm('HZ\raumReservierungBundle\Form\ReservierungType', $reservierung);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($reservierung);
            $em->flush();

            return $this->redirectToRoute('admin_show', array('id' => $reservierung->getId()));
        }

        return $this->render('reservierung/new.html.twig', array(
            'reservierung' => $reservierung,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a reservierung entity.
     *
     */
    public function showAction(Reservierung $reservierung)
    {
        $deleteForm = $this->createDeleteForm($reservierung);

        return $this->render('reservierung/show.html.twig', array(
            'reservierung' => $reservierung,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing reservierung entity.
     *
     */
    public function editAction(Request $request, Reservierung $reservierung)
    {
        $deleteForm = $this->createDeleteForm($reservierung);
        $editForm = $this->createForm('HZ\raumReservierungBundle\Form\ReservierungType', $reservierung);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('admin_edit', array('id' => $reservierung->getId()));
        }

        return $this->render('reservierung/edit.html.twig', array(
            'reservierung' => $reservierung,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a reservierung entity.
     *
     */
    public function deleteAction(Request $request, Reservierung $reservierung)
    {
        $form = $this->createDeleteForm($reservierung);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($reservierung);
            $em->flush();
        }

        return $this->redirectToRoute('admin_index');
    }

    /**
     * Creates a form to delete a reservierung entity.
     *
     * @param Reservierung $reservierung The reservierung entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(Reservierung $reservierung)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('admin_delete', array('id' => $reservierung->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
