<?php
use Psr\Http\Message\ServerRequestInterface as Request;
use Psr\Http\Message\ResponseInterface as Response;

$app = new \Slim\App;

//Get All Hospitals
$app->get('/api/v1/hospitals', function (Request $request, Response $response){
	$sql= "SELECT * FROM hospitals"; 
	try{
		//Get database Object
		$db = new db();
		// Connect
		$db = $db->connect();

		$stmt  = $db->query($sql);
		$hospitals = $stmt->fetchAll(PDO::FETCH_OBJ);
		$db = null;
		return $response->withStatus(200)->withHeader('Content-Type', 'application/json')->write(json_encode($hospitals));
		

	}catch(PDOException $e){
		echo '{"error": {"text": '.$e->getMessage().' }';
	}
});

//Get Single Hospital
$app->get('/api/v1/hospital/{id}', function (Request $request, Response $response){
	$id = $request->getAttribute('id');

	$sql= "SELECT * FROM hospitals WHERE id = $id"; 
	
	try{
		//Get database Object
		$db = new db();
		// Connect
		$db = $db->connect();

		$stmt  = $db->query($sql);
		$hospital = $stmt->fetchAll(PDO::FETCH_OBJ);
		$db = null;
		return $response->withStatus(200)->withHeader('Content-Type', 'application/json')->write(json_encode($hospital));

	}catch(PDOException $e){
		echo '{"error": {"text": '.$e->getMessage().' }';
	}

});

//Get Hospitals by city
$app->get('/api/v1/hospitals/{city}', function (Request $request, Response $response){
	$city = $request->getAttribute('city');

	$sql= "SELECT * FROM hospitals WHERE city = $city";
	
	try{
		//Get database Object
		$db = new db();
		// Connect
		$db = $db->connect();

		$stmt  = $db->query($sql);
		$hospital = $stmt->fetchAll(PDO::FETCH_OBJ);
		$db = null;
		return $response->withStatus(200)->withHeader('Content-Type', 'application/json')->write(json_encode($hospital));

	}catch(PDOException $e){
		echo '{"error": {"text": '.$e->getMessage().' }';
	}
	
});

//Add Hospital
$app->post('/api/v1/hospital', function (Request $request, Response $response){
	$name = $request->getParam('name');
	$city = $request->getParam('city');
	$state = $request->getParam('state');
	$address = $request->getParam('address');
	
	if(strlen($state)<3){
		$sql= "INSERT INTO hospitals (name, city, state, address) VALUES
		(:name, :city, :state, :address)"; 

		try{
			//Get database Object
			$db = new db();
			// Connect
			$db = $db->connect();

			$stmt = $db->prepare($sql);

			$stmt->bindParam(':name', $name);
			$stmt->bindParam(':city', $city);
			$stmt->bindParam(':state', $state);
			$stmt->bindParam(':address', $address);

			$stmt->execute();

			echo '{"notice": {"text": "Hospital Added"}';

		}catch(PDOException $e){
			echo '{"error": {"text": '.$e->getMessage().' }';
		}
	}
	else {echo '{"notice" : {"text" : "state should be less than 2 characters. Please enter a valid argument}';}
});

//Update Hospital
$app->put('/api/v1/hospital/{id}', function (Request $request, Response $response){
	$id = $request->getAttribute('id');
	$name = $request->getParam('name');
	$city = $request->getParam('city');
	$state = $request->getParam('state');
	$address = $request->getParam('address');

	if(strlen($state)<3){
		$sql= "UPDATE hospitals SET
				name = :name,
				city = :city,
				state = :state,
				address = :address
				WHERE id = $id";

		try{
			//Get database Object
			$db = new db();
			// Connect
			$db = $db->connect();

			$stmt = $db->prepare($sql);

			$stmt->execute([
			":name"=>$name,
			":city"=>$city,
			":state"=>$state,
			":address"=>$address
			]);

			echo '{"notice": {"text": "Hospital Updated"}';

		}catch(PDOException $e){
			echo '{"error": {"text": '.$e->getMessage().' }';
		}
	}
	else {echo '{"notice" : {"text" : "state should be less than 2 characters. Please enter a valid argument}';}
});

//Delete Hospital
$app->delete('/api/v1/hospital/{id}', function (Request $request, Response $response){
	$id = $request->getAttribute('id');

	$sql= "DELETE FROM hospitals WHERE id = $id"; 
	try{
		//Get database Object
		$db = new db();
		// Connect
		$db = $db->connect();

		$stmt  = $db->prepare($sql);
		$stmt->execute();
		$db = null;
		echo '{"notice": {"text": "Hospital Deleted"}';

	}catch(PDOException $e){
		echo '{"error": {"text": '.$e->getMessage().' }';
	}
});
