<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Comentario;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Security\Core\Exception\AccessDeniedException;

/**
 * Comentario controller.
 *
 * @Route("comentario")
 */
class ComentarioController extends Controller
{
    /**
     * Lists all comentario entities.
     *
     * @Route("/", name="comentario_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $comentarios = $em->getRepository('AppBundle:Comentario')->findAll();

        return $this->render('comentario/index.html.twig', array(
            'comentarios' => $comentarios,
        ));
    }

    /**
     * Creates a new comentario entity.
     *
     * @Route("/new", name="comentario_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        //Recoger el id que se envio desde los buses metodo GET
        $idPost = $request->query->get("id");
        //recupero la informacion (Post) del idPost
        $post = $this->getDoctrine()
            ->getRepository('AppBundle:Post')
            ->find($idPost);
        //recupero todos los comentarios de ese psot
        $postComentario= $post->getComentario();

        //recupero el usuario logeado (el id)
        $idUser = $this->get('security.token_storage')->getToken()->getUser()->getId();

        //recupero la entidad usuario
        $user = $this->getDoctrine()
            ->getRepository('AppBundle:User')
            ->find($idUser);


        $comentario = new Comentario();
        $form = $this->createForm('AppBundle\Form\ComentarioType', $comentario);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            //guardar los datos con el metodo set
            $comentario->setUser($user);
            $comentario->setPost($post);
            $comentario->setFechaComentario(new\DateTime("now"));

            $em = $this->getDoctrine()->getManager();
            $em->persist($comentario);
            $em->flush();

            return $this->redirectToRoute('post_index');
        }

        return $this->render('comentario/new.html.twig', array(
            'comentario' => $comentario,
            'form' => $form->createView(),
            //Envio de datos para presentar en la vista
            'post1'=>$post,
            'usuario'=>$user,
            'comentarios'=>$postComentario,
        ));
    }

    /**
     * Finds and displays a comentario entity.
     *
     * @Route("/{id}", name="comentario_show")
     * @Method("GET")
     */
    public function showAction(Comentario $comentario)
    {
        /**
        Aqui restringimos solo a esta accion
         */
        //$this->denyAccessUnlessGranted('ROLE_ADMIN');

        $deleteForm = $this->createDeleteForm($comentario);

        return $this->render('comentario/show.html.twig', array(
            'comentario' => $comentario,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing comentario entity.
     *
     * @Route("/{id}/edit", name="comentario_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, Comentario $comentario)
    {
        $deleteForm = $this->createDeleteForm($comentario);
        $editForm = $this->createForm('AppBundle\Form\ComentarioType', $comentario);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('comentario_edit', array('id' => $comentario->getId()));
        }

        return $this->render('comentario/edit.html.twig', array(
            'comentario' => $comentario,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a comentario entity.
     *
     * @Route("/{id}", name="comentario_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, Comentario $comentario)
    {
        $form = $this->createDeleteForm($comentario);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($comentario);
            $em->flush();
        }

        return $this->redirectToRoute('comentario_index');
    }

    /**
     * Creates a form to delete a comentario entity.
     *
     * @param Comentario $comentario The comentario entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(Comentario $comentario)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('comentario_delete', array('id' => $comentario->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
