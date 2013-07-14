<?php 
 /**
  * @Entity
  * @Table(name="budgets")
  */
 class budget{
 	/**
 	 * @Id
 	 * @Column(type="integer")
 	 * @GeneratedValue
 	 */
 	private $id = null;

 	/**
 	 * @Column(type="datetime", name="created", nullable=false)
 	 */
 	private $created = null;

 	/**
 	 * @Column(type="datetime", name="modified", nullable=false)
 	 */
 	private $modified = null;

 	function getId()
 	{
 		return $this->id;
 	}
 	function setId($id){
 		$this->id = $id;
 	}
 	function getCreated()
 	{
 		return $this->created;
 	}
 	function setCreated($created){
 		$this->created = $created;
 	}
 	function getModified()
 	{
 		return $this->modified;
 	}
 	function setModified($modified){
 		$this->id = $modified;
 	}

 	
 }


 ?>