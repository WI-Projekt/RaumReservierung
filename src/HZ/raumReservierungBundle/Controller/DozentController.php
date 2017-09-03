<?php

namespace HZ\raumReservierungBundle\Controller;

use HZ\raumReservierungBundle\Entity\Dozent;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

/**
 * Dozent controller.
 *
 */
class DozentController extends Controller
{
    /**
     * Lists all dozent entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $dozents = $em->getRepository('HZraumReservierungBundle:Dozent')->findAll();

        return $this->render('dozent/index.html.twig', array(
            'dozents' => $dozents,
        ));
    }

    /**
     * Creates a new dozent entity.
     *
     */
    public function newAction(Request $request)
    {
        $dozent = new Dozent();
        $form = $this->createForm('HZ\raumReservierungBundle\Form\DozentType', $dozent);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($dozent);
            $em->flush();

            return $this->redirectToRoute('adminDozent_show', array('id' => $dozent->getId()));
        }

        return $this->render('dozent/new.html.twig', array(
            'dozent' => $dozent,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a dozent entity.
     *
     */
    public function showAction(Dozent $dozent)
    {
        $deleteForm = $this->createDeleteForm($dozent);

        return $this->render('dozent/show.html.twig', array(
            'dozent' => $dozent,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing dozent entity.
     *
     */
    public function editAction(Request $request, Dozent $dozent)
    {
        $deleteForm = $this->createDeleteForm($dozent);
        $editForm = $this->createForm('HZ\raumReservierungBundle\Form\DozentType', $dozent);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('adminDozent_edit', array('id' => $dozent->getId()));
        }

        return $this->render('dozent/edit.html.twig', array(
            'dozent' => $dozent,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a dozent entity.
     *
     */
    public function deleteAction(Request $request, Dozent $dozent)
    {
        $form = $this->createDeleteForm($dozent);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($dozent);
            $em->flush();
        }

        return $this->redirectToRoute('adminDozent_index');
    }

    /**
     * Creates a form to delete a dozent entity.
     *
     * @param Dozent $dozent The dozent entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(Dozent $dozent)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('adminDozent_delete', array('id' => $dozent->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
