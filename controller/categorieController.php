<?php 
	
	require_once("../bootstrap.php");
	$op = $_POST["op"];
	$categoria = new Categories();

	switch ($op) {
		case 'list':
			selectAll($entityManager);
			break;
		case 'insert':
			$nomecategoria = $_POST["nomeCategoria"];
			$categoria->setName($nomecategoria);
			$categoria->setCreated(new DateTime("now"));
			$categoria->setModified(new DateTime("now"));
			insert($categoria, $entityManager);
			header("location: ../view/listCategories.html");
			break;
		case 'update':
			update($categoria, $entityManager);
			break;
		case 'remove':
			remove(11,$entityManager);
			break ;
		default:
			# code...
			break;
	}

	function insert($categoria, $entityManager){
		$entityManager->persist($categoria);
		$entityManager->flush();
	}
	function selectAll($entityManager){
		header("Content-Type: application/json; charset=utf-8");
		$repo = $entityManager->getRepository("categories");

		$categorias =  $repo->findAll();
		$jsoncategorias;
		foreach ($categorias as $categoria) {
			$jsoncategoria;
			$jsoncategoria["name"]= $categoria->getName();
			$jsoncategoria["id"]= $categoria->getId();
			$jsoncategoria["created"]= date_format($categoria->getCreated(),'d/m/Y');
			$jsoncategoria["modified"]= date_format($categoria->getModified(),'d/m/y');
			$jsoncategorias[] = $jsoncategoria;
		}
		echo json_encode($jsoncategorias);

	}
	function update($categoria, $entityManager){
		$result = $entityManager->find("categories", $categoria->getId());
		if($result == null){
			return "categoria nao localizada";
		}
		else{
			$result->setName($categoria->getName());
			//$result->setCreated($categoria->getCreated()); Não é necessário 
			$result->setModified($categoria->getModified());

			$entityManager->flush();
			return 'Alteracao realizada!';
		}
	}
	function remove ($id, $entityManager){
		$alvo = $entityManager->find("categories", $id);
		$entityManager->remove($alvo);
		$entityManager->flush();

	}


	

 ?>