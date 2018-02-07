<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Todo
 *
 * @ORM\Table(name="todo")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\TodoRepository")
 */
class Todo
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
     * @ORM\Column(name="nazwa", type="string", length=255)
     */
    private $nazwa;

    /**
     * @var string
     *
     * @ORM\Column(name="kategoria", type="string", length=255)
     */
    private $kategoria;

    /**
     * @var string
     *
     * @ORM\Column(name="opis", type="string", length=255)
     */
    private $opis;

    /**
     * @var string
     *
     * @ORM\Column(name="priorytet", type="string", length=255)
     */
    private $priorytet;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="termin", type="datetime")
     */
    private $termin;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="data_utworzenia", type="datetime")
     */
    private $dataUtworzenia;


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
     * Set nazwa
     *
     * @param string $nazwa
     *
     * @return Todo
     */
    public function setNazwa($nazwa)
    {
        $this->nazwa = $nazwa;

        return $this;
    }

    /**
     * Get nazwa
     *
     * @return string
     */
    public function getNazwa()
    {
        return $this->nazwa;
    }

    /**
     * Set kategoria
     *
     * @param string $kategoria
     *
     * @return Todo
     */
    public function setKategoria($kategoria)
    {
        $this->kategoria = $kategoria;

        return $this;
    }

    /**
     * Get kategoria
     *
     * @return string
     */
    public function getKategoria()
    {
        return $this->kategoria;
    }

    /**
     * Set opis
     *
     * @param string $opis
     *
     * @return Todo
     */
    public function setOpis($opis)
    {
        $this->opis = $opis;

        return $this;
    }

    /**
     * Get opis
     *
     * @return string
     */
    public function getOpis()
    {
        return $this->opis;
    }

    /**
     * Set priorytet
     *
     * @param string $priorytet
     *
     * @return Todo
     */
    public function setPriorytet($priorytet)
    {
        $this->priorytet = $priorytet;

        return $this;
    }

    /**
     * Get priorytet
     *
     * @return string
     */
    public function getPriorytet()
    {
        return $this->priorytet;
    }

    /**
     * Set termin
     *
     * @param \DateTime $termin
     *
     * @return Todo
     */
    public function setTermin($termin)
    {
        $this->termin = $termin;

        return $this;
    }

    /**
     * Get termin
     *
     * @return \DateTime
     */
    public function getTermin()
    {
        return $this->termin;
    }

    /**
     * Set dataUtworzenia
     *
     * @param \DateTime $dataUtworzenia
     *
     * @return Todo
     */
    public function setDataUtworzenia($dataUtworzenia)
    {
        $this->dataUtworzenia = $dataUtworzenia;

        return $this;
    }

    /**
     * Get dataUtworzenia
     *
     * @return \DateTime
     */
    public function getDataUtworzenia()
    {
        return $this->dataUtworzenia;
    }
}

