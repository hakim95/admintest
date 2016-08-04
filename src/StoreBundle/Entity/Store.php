<?php

namespace StoreBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;
use JMS\Serializer\Annotation\Expose;

/**
 * Store
 *
 * @ORM\Table(name="store")
 * @ORM\Entity(repositoryClass="StoreBundle\Repository\StoreRepository")
 */
class Store
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     * @Expose
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="store_name", type="string", length=255)
     * @Expose
     */
    private $storeName;

    /**
     * @var string
     *
     * @ORM\Column(name="store_address", type="string", length=255)
     * @Expose
     */
    private $storeAddress;

    /**
     * @var int
     *
     * @ORM\Column(name="store_cp", type="integer")
     * @Expose
     */
    private $storeCp;

    /**
     * @var string
     *
     * @ORM\Column(name="store_city", type="string", length=255)
     * @Expose
     */
    private $storeCity;

    /**
     * @var string
     *
     * @ORM\Column(name="store_country", type="string", length=255)
     * @Expose
     */
    private $storeCountry;
    
    /**
     * @ORM\OneToMany(targetEntity="Product", mappedBy="store")
     * @Expose
     */
    private $products;
    
    public function __construct() {
        $this->products = new ArrayCollection();
    }

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
     * Set storeName
     *
     * @param string $storeName
     *
     * @return Store
     */
    public function setStoreName($storeName)
    {
        $this->storeName = $storeName;

        return $this;
    }

    /**
     * Get storeName
     *
     * @return string
     */
    public function getStoreName()
    {
        return $this->storeName;
    }

    /**
     * Set storeAddress
     *
     * @param string $storeAddress
     *
     * @return Store
     */
    public function setStoreAddress($storeAddress)
    {
        $this->storeAddress = $storeAddress;

        return $this;
    }

    /**
     * Get storeAddress
     *
     * @return string
     */
    public function getStoreAddress()
    {
        return $this->storeAddress;
    }

    /**
     * Set storeCp
     *
     * @param integer $storeCp
     *
     * @return Store
     */
    public function setStoreCp($storeCp)
    {
        $this->storeCp = $storeCp;

        return $this;
    }

    /**
     * Get storeCp
     *
     * @return int
     */
    public function getStoreCp()
    {
        return $this->storeCp;
    }

    /**
     * Set storeCity
     *
     * @param string $storeCity
     *
     * @return Store
     */
    public function setStoreCity($storeCity)
    {
        $this->storeCity = $storeCity;

        return $this;
    }

    /**
     * Get storeCity
     *
     * @return string
     */
    public function getStoreCity()
    {
        return $this->storeCity;
    }

    /**
     * Set storeCountry
     *
     * @param string $storeCountry
     *
     * @return Store
     */
    public function setStoreCountry($storeCountry)
    {
        $this->storeCountry = $storeCountry;

        return $this;
    }

    /**
     * Get storeCountry
     *
     * @return string
     */
    public function getStoreCountry()
    {
        return $this->storeCountry;
    }

    /**
     * Add product
     *
     * @param \StoreBundle\Entity\Product $product
     *
     * @return Store
     */
    public function addProduct(\StoreBundle\Entity\Product $product)
    {
        $this->products[] = $product;

        return $this;
    }

    /**
     * Remove product
     *
     * @param \StoreBundle\Entity\Product $product
     */
    public function removeProduct(\StoreBundle\Entity\Product $product)
    {
        $this->products->removeElement($product);
    }

    /**
     * Get products
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getProducts()
    {
        return $this->products;
    }
}
