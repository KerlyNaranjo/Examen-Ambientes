<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Comentario
 *
 * @ORM\Table(name="comentario")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\ComentarioRepository")
 */
class Comentario
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="texto_comentario", type="string", length=255)
     */
    private $textoComentario;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="fecha_comentario", type="datetime")
     */
    private $fechaComentario;

    /**
     * @ORM\ManyToOne(targetEntity="User", inversedBy="comentario")
     * @ORM\JoinColumn(name="user_id", referencedColumnName="id")
     */

    private $user;

    /**
     * @ORM\ManyToOne(targetEntity="Post", inversedBy="comentario")
     * @ORM\JoinColumn(name="post_id", referencedColumnName="id")
     */

    private $post;

    /**
     * Get id
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set textoComentario
     *
     * @param string $textoComentario
     *
     * @return Comentario
     */
    public function setTextoComentario($textoComentario)
    {
        $this->textoComentario = $textoComentario;

        return $this;
    }

    /**
     * Get textoComentario
     *
     * @return string
     */
    public function getTextoComentario()
    {
        return $this->textoComentario;
    }

    /**
     * Set fechaComentario
     *
     * @param \DateTime $fechaComentario
     *
     * @return Comentario
     */
    public function setFechaComentario($fechaComentario)
    {
        $this->fechaComentario = $fechaComentario;

        return $this;
    }

    /**
     * Get fechaComentario
     *
     * @return \DateTime
     */
    public function getFechaComentario()
    {
        return $this->fechaComentario;
    }

    /**
     * Set user
     *
     * @param \AppBundle\Entity\User $user
     *
     * @return Comentario
     */
    public function setUser(\AppBundle\Entity\User $user = null)
    {
        $this->user = $user;

        return $this;
    }

    /**
     * Get user
     *
     * @return \AppBundle\Entity\User
     */
    public function getUser()
    {
        return $this->user;
    }

    /**
     * Set post
     *
     * @param \AppBundle\Entity\Post $post
     *
     * @return Comentario
     */
    public function setPost(\AppBundle\Entity\Post $post = null)
    {
        $this->post = $post;

        return $this;
    }

    /**
     * Get post
     *
     * @return \AppBundle\Entity\Post
     */
    public function getPost()
    {
        return $this->post;
    }
}
