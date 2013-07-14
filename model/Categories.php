<?php

/** @Entity */
class categories {
    /** @Id @GeneratedValue @Column(type="integer") */
    protected $id=null;

    /**
     * @Column(type="string")
     */
    protected $name;

    /**
     * @Column(type="datetime")
     */
    private $created;

    /**
     * @Column(type="datetime")
     */
    protected $modified;
    
    function getId()
    {
        return $this->id;
    }
        function setId($id)
    {
        $this->id = $id;
    }

    function getName()
    {
        return $this->name;
    }

    function setName($name)
    {
        $this->name = $name;
    }

    function getCreated()
    {
        return $this->created;
    }

    function setCreated($created)
    {
        $this->created = $created;
    }

    function getModified()
    {
        return $this->modified;
    }

    function setModified($modified)
    {
        $this->modified = $modified;
    }
}
?>