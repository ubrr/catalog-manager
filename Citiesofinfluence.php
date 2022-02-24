<?php

namespace App\Entity;

use App\Repository\CitiesofinfluenceRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=CitiesofinfluenceRepository::class)
 */
class Citiesofinfluence
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @var string|null
     *
     * @ORM\Column(type="string", length=255)
     */
    private $cityname;

    /**
     * @var string|null
     *
     * @ORM\Column(name="citycode", type="string", length=250, nullable=true)
     */
    private $citycode;

    /**
     * @var string|null
     *
     * @ORM\Column(name="citygeo", type="string", length=300, nullable=true)
     */
    private $citygeo;

    /**
     * @var string|null
     *
     * @ORM\Column(name="productsdeliver", type="string", length=200, nullable=true)
     */
    private $productsdeliver;

    /**
     * @var string|null
     *
     * @ORM\Column(name="productssell", type="string", length=200, nullable=true)
     */
    private $productssell;

    /**
     * @var string|null
     *
     * @ORM\Column(name="subjectrf", type="string", length=150, nullable=true)
     */
    private $subjectrf;

    /**
     * @var string|null
     *
     * @ORM\Column(name="subjectrfcode", type="string", length=150, nullable=true)
     */
    private $subjectrfcode;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getCityname(): ?string
    {
        return $this->cityname;
    }

    public function setCityname(string $cityname): self
    {
        $this->cityname = $cityname;

        return $this;
    }

    public function getCitycode(): ?string
    {
        return $this->citycode;
    }

    public function setCitycode(?string $citycode): self
    {
        $this->citycode = $citycode;

        return $this;
    }

    public function getCitygeo(): ?string
    {
        return $this->citygeo;
    }

    public function setCitygeo(?string $citygeo): self
    {
        $this->citygeo = $citygeo;

        return $this;
    }

    public function getProductsdeliver(): ?string
    {
        return $this->productsdeliver;
    }

    public function setProductsdeliver(?string $productsdeliver): self
    {
        $this->productsdeliver = $productsdeliver;

        return $this;
    }

    public function getProductssell(): ?string
    {
        return $this->productssell;
    }

    public function setProductssell(?string $productssell): self
    {
        $this->productssell = $productssell;

        return $this;
    }

    public function getSubjectrf(): ?string
    {
        return $this->subjectrf;
    }

    public function setSubjectrf(?string $subjectrf): self
    {
        $this->subjectrf = $subjectrf;

        return $this;
    }

    public function getSubjectrfcode(): ?string
    {
        return $this->subjectrfcode;
    }

    public function setSubjectrfcode(?string $subjectrfcode): self
    {
        $this->subjectrfcode = $subjectrfcode;

        return $this;
    }
}