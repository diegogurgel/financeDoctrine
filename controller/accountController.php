<?php 
	
	require_once("../bootstrap.php");
	$op = $_POST["op"];
	$conta = new accounts();

	$conta->setId(66);
	$conta->setName("Conta500");
	$conta->setCreated(new DateTime("now"));
	$conta->setModified(new DateTime("now"));

	switch ($op) {
		case 'list':
			selectAll($entityManager);
			break;
		case 'insert':
			$nomeConta = $_POST["nomeConta"];
			$conta->setName($nomeConta);
			$conta->setCreated(new DateTime("now"));
			$conta->setModified(new DateTime("now"));
			insert($conta, $entityManager);
			header("location: ../view/listAccounts.html");
			break;
		case 'update':
			update($conta, $entityManager);
			break;
		case 'remove':
			remove(11,$entityManager);
			break ;
		default:
			# code...
			break;
	}

	function insert($conta, $entityManager){
		$entityManager->persist($conta);
		$entityManager->flush();
	}
	function selectAll($entityManager){
		header("Content-Type: application/json; charset=utf-8");
		$repo = $entityManager->getRepository("accounts");

		$contas =  $repo->findAll();
		$jsonContas;
		foreach ($contas as $conta) {
			$jsonConta;
			$jsonConta["name"]= $conta->getName();
			$jsonConta["id"]= $conta->getId();
			$jsonConta["created"]= date_format($conta->getCreated(),'d/m/Y');
			$jsonConta["modified"]= date_format($conta->getModified(),'d/m/y');
			$jsonContas[] = $jsonConta;
		}
		echo json_encode($jsonContas);

	}
	function update($conta, $entityManager){
		$result = $entityManager->find("accounts", $conta->getId());
		if($result == null){
			return "Conta nao localizada";
		}
		else{
			$result->setName($conta->getName());
			//$result->setCreated($conta->getCreated()); Não é necessário 
			$result->setModified($conta->getModified());

			$entityManager->flush();
			return 'Alteracao realizada!';
		}
	}
	function remove ($id, $entityManager){
		$alvo = $entityManager->find("accounts", $id);
		$entityManager->remove($alvo);
		$entityManager->flush();

	}


	

 ?>