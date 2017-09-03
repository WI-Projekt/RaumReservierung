<?php

namespace HZ\raumReservierungBundle\Controller;

use HZ\raumReservierungBundle\Entity\Gebaeude;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

/**
 * Gebaeude controller.
 *
 */
class GebaeudeController extends Controller
{
    /**
     * Lists all gebaeude entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $gebaeudes = $em->getRepository('HZraumReservierungBundle:Gebaeude')->findAll();

        return $this->render('gebaeude/index.html.twig', array(
            'gebaeudes' => $gebaeudes,
        ));
    }

    /**
     * Creates a new gebaeude entity.
     *
     */
    public function newAction(Request $request)
    {
        $gebaeude = new Gebaeude();
        $form = $this->createForm('HZ\raumReservierungBundle\Form\GebaeudeType', $gebaeude);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($gebaeude);
            $em->flush();

            return $this->redirectToRoute('adminGebaeude_show', array('id' => $gebaeude->getId()));
        }

        return $this->render('gebaeude/new.html.twig', array(
            'gebaeude' => $gebaeude,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a gebaeude entity.
     *
     */
    public function showAction(Gebaeude $gebaeude)
    {
        $deleteForm = $this->createDeleteForm($gebaeude);

        return $this->render('gebaeude/show.html.twig', array(
            'gebaeude' => $gebaeude,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing gebaeude entity.
     *
     */
    public function editAction(Request $request, Gebaeude $gebaeude)
    {
        $deleteForm = $this->createDeleteForm($gebaeude);
        $editForm = $this->createForm('HZ\raumReservierungBundle\Form\GebaeudeType', $gebaeude);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('adminGebaeude_edit', array('id' => $gebaeude->getId()));
        }

        return $this->render('gebaeude/edit.html.twig', array(
            'gebaeude' => $gebaeude,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a gebaeude entity.
     *
     */
    public function deleteAction(Request $request, Gebaeude $gebaeude)
    {
        $form = $this->createDeleteForm($gebaeude);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($gebaeude);
            $em->flush();
        }

        return $this->redirectToRoute('adminGebaeude_index');
    }

    /**
     * Creates a form to delete a gebaeude entity.
     *
     * @param Gebaeude $gebaeude The gebaeude entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(Gebaeude $gebaeude)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('adminGebaeude_delete', array('id' => $gebaeude->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
