<?php

namespace Librinfo\VarietiesBundle\Entity;

use Librinfo\DoctrineBundle\Entity\Traits\BaseEntity;
use Librinfo\DoctrineBundle\Entity\Traits\Nameable;
use Librinfo\UserBundle\Entity\Traits\Traceable;
use Librinfo\DoctrineBundle\Entity\Traits\Descriptible;

/**
 * Species
 */
class Species
{
    use BaseEntity,
        Nameable,
        Traceable,
        Descriptible
    ;

    /**
     * @var string
     */
    private $latin_name;

    /**
     * @var string
     */
    private $alias;

    /**
     * @var \Doctrine\Common\Collections\Collection
     */
    private $varieties;

    /**
     * @var \Librinfo\VarietiesBundle\Entity\Genus
     */
    private $genus;

    /**
     * @var \Librinfo\VarietiesBundle\Entity\PlantCategory
     */
    private $plant_category;

    /**
     * @var \Librinfo\VarietiesBundle\Entity\Species
     */
    private $parent_species;

    /**
     * @var \Doctrine\Common\Collections\Collection
     */
    private $subspecieses;



    /**
     * Constructor
     */
    public function __construct()
    {
        $this->varieties = new \Doctrine\Common\Collections\ArrayCollection();
        $this->subspecieses = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Set latinName
     *
     * @param string $latinName
     *
     * @return Species
     */
    public function setLatinName($latinName)
    {
        $this->latin_name = $latinName;

        return $this;
    }

    /**
     * Get latinName
     *
     * @return string
     */
    public function getLatinName()
    {
        return $this->latin_name;
    }

    /**
     * Set alias
     *
     * @param string $alias
     *
     * @return Species
     */
    public function setAlias($alias)
    {
        $this->alias = $alias;

        return $this;
    }

    /**
     * Get alias
     *
     * @return string
     */
    public function getAlias()
    {
        return $this->alias;
    }

    /**
     * Set genus
     *
     * @param \Librinfo\VarietiesBundle\Entity\Genus $genus
     *
     * @return Species
     */
    public function setGenus(\Librinfo\VarietiesBundle\Entity\Genus $genus = null)
    {
        $this->genus = $genus;

        return $this;
    }

    /**
     * Get genus
     *
     * @return \Librinfo\VarietiesBundle\Entity\Genus
     */
    public function getGenus()
    {
        return $this->genus;
    }

    /**
     * Add variety
     *
     * @param \Librinfo\VarietiesBundle\Entity\Variety $variety
     *
     * @return Species
     */
    public function addVariety(\Librinfo\VarietiesBundle\Entity\Variety $variety)
    {
        $variety->setSpecies($this);
        $this->varieties->add($variety);
        return $this;
    }

    /**
     * Remove variety
     *
     * @param \Librinfo\VarietiesBundle\Entity\Variety $variety
     *
     * @return boolean TRUE if this collection contained the specified element, FALSE otherwise.
     */
    public function removeVariety(\Librinfo\VarietiesBundle\Entity\Variety $variety)
    {
        return $this->varieties->removeElement($variety);
    }

    /**
     * Get varieties
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getVarieties()
    {
        return $this->varieties;
    }

    /**
     * Set plantCategory
     *
     * @param \Librinfo\VarietiesBundle\Entity\PlantCategory $plantCategory
     *
     * @return Species
     */
    public function setPlantCategory(\Librinfo\VarietiesBundle\Entity\PlantCategory $plantCategory = null)
    {
        $this->plant_category = $plantCategory;

        return $this;
    }

    /**
     * Get plantCategory
     *
     * @return \Librinfo\VarietiesBundle\Entity\PlantCategory
     */
    public function getPlantCategory()
    {
        return $this->plant_category;
    }


    /**
     * Add subspecies
     *
     * @param \Librinfo\VarietiesBundle\Entity\Species $subspecies
     *
     * @return Species
     */
    public function addSubspecies(\Librinfo\VarietiesBundle\Entity\Species $subspecies)
    {
        $subspecies->setParentSpecies($this);
        $this->subspecieses[] = $subspecies;
        return $this;
    }

    /**
     * Remove subspecies
     *
     * @param \Librinfo\VarietiesBundle\Entity\Species $subspecies
     *
     * @return boolean TRUE if this collection contained the specified element, FALSE otherwise.
     */
    public function removeSubspeciese(\Librinfo\VarietiesBundle\Entity\Species $subspecies)
    {
        return $this->subspecieses->removeElement($subspecies);
    }

    /**
     * Get subspecieses
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getSubspecieses()
    {
        return $this->subspecieses;
    }


    /**
     * Set parentSpecies
     *
     * @param \Librinfo\VarietiesBundle\Entity\Species $parentSpecies
     *
     * @return Species
     */
    public function setParentSpecies(\Librinfo\VarietiesBundle\Entity\Species $parentSpecies = null)
    {
        $this->parent_species = $parentSpecies;

        return $this;
    }

    /**
     * Get parentSpecies
     *
     * @return \Librinfo\VarietiesBundle\Entity\Species
     */
    public function getParentSpecies()
    {
        return $this->parent_species;
    }
}
