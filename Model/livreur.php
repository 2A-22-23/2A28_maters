<?php
class livreur
{
    private ?string $id = null;
    private ?string $first_name = null;
    private ?string $disponibilite = null;
    private ?string $postal_code = null;


    public function __construct($id,$fn, $a, $d)
    {
        $this->id=$id;
        $this->first_name = $fn;
        $this->disponibilite = $a;
        $this->postal_code = $d;

    }

    /**
     * Get the value of idlivraison
     */
    public function getid()
    {
        return $this->id;
    }

    public function setid($id)
    {
        $this->id= $id;

        return $this;
    }
    /**
     * Get the value of lastName
     */
    public function getfirst_name()
    {
        return $this->first_name;
    }

    /**
     * Set the value of lastName
     *
     * @return  self
     */
    public function setfirst_name($first_name)
    {
        $this->first_name = $first_name;

        return $this;
    }

 




    public function getdispo()
    {
        return $this->disponibilite;
    }

    /**
     * Set the value of address
     *
     * @return  self
     */
    public function setdispo($disponibilite)
    {
        $this->disponibilite = $disponibilite;

        return $this;
    }

    /**
     * Get the value of dob
     */
    public function getpostal_code()
    {
        return $this->postal_code;
    }

    /**
     * Set the value of dob
     *
     * @return  self
     */
    public function setpostal_code($postal_code)
    {
        $this->postal_code = $postal_code;

        return $this;
    }
    
}




