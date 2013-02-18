<?php
function addUser($name, $lastname, $email, $storage, array $OptionalParams) {

          $method = ORGANIZATION . "/users";
	
	        $verbmethod = "POST";
	
	        $DefaultParams = array("name" => $name,
                        "lastname" => $lastname,
                        "email" => $email,
                        "storage" => $storage,
                        "canPublishCorporateFeed" => "false",
                        "canCreateGroups" => "false",
                        "canCreateDepartments" => "false",
                        "isAdministrator" => "false",
                        "password" => null,
                        "lang" => null,
                        "attributes" => null);

	        // overwrite all the defaults with the arguments
		$params = array_merge($DefaultParams, $OptionalParams);

        	//skip null parameters
		$params = array_filter($params, function($item) { return !is_null($item); });

       		$response = $this->zyncroApi->callApi($method, $params, $verbmethod);

	        return $response;
	}
?>
