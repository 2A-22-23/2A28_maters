<?php
class user
{
    private ?int $identity_card = null;
    private ?string $Name = null;
    private ?string $Email = null;
    private ?string $Sexe = null;
    private ?string $Password = null;
    private ?string $Role= null ;

    public function __construct($identity_card, $n, $p, $a, $d,$t)
    {
        $this->identity_card =(int) $identity_card;
        $this->Name = $n;
        $this->Email = $p;
        $this->Sexe = $a;
        $this->Password = $d;
        $this->Role = $t;
    }

    /**
     * Get the value of iduser
     */
    public function getIdentity_card()
    {
        return $this->identity_card;
    }

    /**
     * Get the value of lastName
     */
    public function getName()
    {
        return $this->Name;
    }
    public function getRole()
    {
        return $this->Role;
    }

    /**
     * Set the value of lastName
     *
     * @return  self
     */
    public function setName($Name)
    {
        $this->Name = $Name;

        return $this;
    }
    public function setRole($Role)
    {
        $this->Role = $Role;

        return $this;
    }

    /**
     * Get the value of firstName
     */
    public function getEmail()
    {
        return $this->Email;
    }

    /**
     * Set the value of firstName
     *
     * @return  self
     */
    public function setEmail($Email)
    {
        $this->Email = $Email;

        return $this;
    }

    /**
     * Get the value of address
     */
    public function getSexe()
    {
        return $this->Sexe;
    }

    /**
     * Set the value of address
     *
     * @return  self
     */
    public function setSexe($Sexe)
    {
        $this->Sexe = $Sexe;

        return $this;
    }

    /**
     * Get the value of dob
     */
    public function getPassword()
    {
        return $this->Password;
    }

    /**
     * Set the value of dob
     *
     * @return  self
     */
    public function setPassowrd($Password)
    {
        $this->Password = $Password;

        return $this;
    }
}
