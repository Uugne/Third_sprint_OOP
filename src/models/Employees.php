<?php

namespace Models;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="employees")
 */

class Employees
{
    /** 
     * @ORM\Id
     * @ORM\Column(type="integer", nullable=true)
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

     /** 
     * @ORM\Column(type="string", nullable=true) 
     */
    protected $firstname;

    /**
     * @ORM\ManyToOne(targetEntity="Project", inversedBy="employees")
     * @ORM\JoinColumn(name="project_id", referencedColumnName="id", onDelete="RESTRICT", nullable=true)
     */
    private $project;


    public function getId() {
        return $this->id;
    }

    public function getFirstname() {
        return $this->firstname;
    }

    public function setFirstname($firstname) {
        $this->firstname = $firstname;
    }

    public function getProject() {
        return $this->project;
    }

    public function setProject($project) {
        $this->project = $project;
    }

}