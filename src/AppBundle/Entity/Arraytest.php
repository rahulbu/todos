<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Arraytest
 *
 * @ORM\Table(name="arraytest")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\ArraytestRepository")
 */
class Arraytest
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
     * @var array
     *
     * @ORM\Column(name="array_field", type="array", nullable=true)
     */
    private $arrayField;

    /**
     * @var string
     *
     * @ORM\Column(name="experiment_cohort", type="string", nullable=true)
     */
    private $experiment;

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
     * Set arrayField
     *
     * @param array $arrayField
     *
     * @return Arraytest
     */
    public function setArrayField($arrayField)
    {
        $this->arrayField = $arrayField;

        return $this;
    }

    /**
     * Get arrayField
     *
     * @return array
     */
    public function getArrayField()
    {
        return $this->arrayField;
    }
}

