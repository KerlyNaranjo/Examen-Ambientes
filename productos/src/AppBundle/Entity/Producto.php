<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Producto
 *
 * @ORM\Table(name="producto")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\ProductoRepository")
 */
class Producto
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
     * @ORM\Column(name="nombre_producto", type="string", length=255, unique=true)
     */
    private $nombreProducto;

    /**
     * @var string
     *
     * @ORM\Column(name="precio_producto", type="decimal", precision=10, scale=2)
     */
    private $precioProducto;

    /**
     * @ORM\ManyToOne(targetEntity="User", inversedBy="producto")
     * @ORM\JoinColumn(name="user_id", referencedColumnName="id")
     */
    private $user;

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
     * Set nombreProducto
     *
     * @param string $nombreProducto
     *
     * @return Producto
     */
    public function setNombreProducto($nombreProducto)
    {
        $this->nombreProducto = $nombreProducto;

        return $this;
    }

    /**
     * Get nombreProducto
     *
     * @return string
     */
    public function getNombreProducto()
    {
        return $this->nombreProducto;
    }

    /**
     * Set precioProducto
     *
     * @param string $precioProducto
     *
     * @return Producto
     */
    public function setPrecioProducto($precioProducto)
    {
        $this->precioProducto = $precioProducto;

        return $this;
    }

    /**
     * Get precioProducto
     *
     * @return string
     */
    public function getPrecioProducto()
    {
        return $this->precioProducto;
    }

    /**
     * Set user
     *
     * @param \AppBundle\Entity\User $user
     *
     * @return Producto
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
}
