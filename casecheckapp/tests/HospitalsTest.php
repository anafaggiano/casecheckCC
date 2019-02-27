<?php

use PHPUnit\Framework\TestCase;
use GuzzleHttp\Client;

 require_once(realpath($_SERVER["DOCUMENT_ROOT"]) .'/vendor/autoload.php');
 require_once(realpath($_SERVER["DOCUMENT_ROOT"]) .'/src/routes/hospitals.php');

/** @test */
class HospitalsTest extends TestCase{

	protected $http;

	public function testGetAllHospitals(){
		
		//Setting up the connexion with Guzzle
		$this->http = new Client(['base_uri' => 'http://localhost/casecheckapp/public/index.php/']);
	
		//Test HTTP status ok
		$response= $this->http->request('GET','api/v1/hospitals');
		$this->assertEquals(200,$response->getStatusCode());
	
		//Test JSON content
		$contentType = $response->getHeaders()["Content-Type"][0];
		$this->assertEquals("application/json", $contentType);
	
		//Stopping the connexion with Guzzle
		$this->http = null;
	
	}

	public function testGetSingleHospital(){
		//Setting up the connexion with Guzzle
		$this->http = new Client(['base_uri' => 'http://localhost/casecheckapp/public/index.php/']);
	
		//Test HTTP status ok for id=3
		$response= $this->http->request('GET','api/v1/hospital/3');//Change ID here
		$this->assertEquals(200,$response->getStatusCode());

		//Test JSON content
		$contentType = $response->getHeaders()["Content-Type"][0];
		$this->assertEquals("application/json", $contentType);

		//Test single element
		$jsonPHP=json_decode($response->getBody());
		$this->assertCount(1, $jsonPHP);

		//Stopping the connexion with Guzzle
		$this->http = null;
		
	}

	public function testGetHospitalbyCity(){
		//Setting up the connexion with Guzzle
		$this->http = new Client(['base_uri' => 'http://localhost/casecheckapp/public/index.php/']);
	
		//Test HTTP status ok for city=Chicago
		$response= $this->http->request('GET','api/v1/hospitals/"Chicago"');//Change city here
		$this->assertEquals(200,$response->getStatusCode());

		//Test JSON content
		$contentType = $response->getHeaders()["Content-Type"][0];
		$this->assertEquals("application/json", $contentType);

		//Stopping the connexion with Guzzle
		$this->http = null;
		
	}

	public function testPostHospital(){
		//Setting up the connexion with Guzzle
		$this->http = new Client(['base_uri' => 'http://localhost/casecheckapp/public/index.php/']);
		
		//Test array
		$inputdata =  ['json' => [
        'name' => 'Hospital added',
        'city' => 'Chicago',
        'state' => 'IL',
		'address' =>'22 Random St']
		];

		//Test HTTP status ok
		$response= $this->http->post('api/v1/hospital',$inputdata);
		$this->assertEquals(200,$response->getStatusCode());

		//Stopping the connexion with Guzzle
		$this->http = null;
		
	}

	public function testPutHospital(){
		//Setting up the connexion with Guzzle
		$this->http = new Client(['base_uri' => 'http://localhost/casecheckapp/public/index.php/']);
	
		$inputdata=  ['json' =>
		 ['name' => 'Updated hospital',
        'city' => 'Chicago',
        'state' => 'IL',
		'address' =>'22 Even More Random St']
		];

		//Test HTTP status ok for id=2
		$response= $this->http->request('PUT','api/v1/hospital/3',$inputdata);
		$this->assertEquals(200,$response->getStatusCode());

		//Test HTML content
		$contentType = $response->getHeaders()["Content-Type"][0];
		$this->assertEquals("text/html; charset=UTF-8", $contentType);

		//Stopping the connexion with Guzzle
		$this->http = null;
		
	}

	public function testDeleteHospital(){
		//Setting up the connexion with Guzzle
		$this->http = new Client(['base_uri' => 'http://localhost/casecheckapp/public/index.php/']);

		//Test HTTP status ok for id=1
		$response= $this->http->request('DELETE','api/v1/hospital/2');//Change ID here
		$this->assertEquals(200,$response->getStatusCode());

		//Stopping the connexion with Guzzle
		$this->http = null;
	}
  
  public function testDelete_Error()
	{
		//Setting up the connexion with Guzzle
		$this->http = new Client(['base_uri' => 'http://localhost/casecheckapp/public/index.php/']);
		
		$response = $this->http->delete('/api/v1/hospital/5', [ //Change ID here to a Hospital that isn't in the datastore'
			'http_errors' => false
		]);
	
		//Test invalid requests
		$this->assertEquals(405, $response->getStatusCode());

		//Stopping the connexion with Guzzle
		$this->http = null;
		
	}
	

}