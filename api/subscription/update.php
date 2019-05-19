<?php
    
    session_start();
 
    // include database and object files
    include_once '../config/database.php';
    include_once '../objects/subscription.php';
 
    // instantiate database and subscription files
    $database = new Database();
    $db = $database->getConnection();
 
    // initialize subscription
    $subscription = new subscription($db);
    
    // get posted data
	$data = json_decode(file_get_contents("php://input"));
    
    // check for no empties parameters
    if(!empty($data->id) && !empty(isset($data->title)) && !empty($data->description)) {
 
        // set activities property values
		$subscription->id = $data->id;
        $subscription->title = $data->title;
        $subscription->description = $data->description;
    
        if($subscription->update($subscription)){
 
            // set response code - 201 created
            http_response_code(201);
 
            // tell the user
            echo json_encode(array("message" => "Subscription was updated."));
        }
 
        // if unable to update the subscription, tell the user
        else{
 
            // set response code - 503 service unavailable
            http_response_code(503);
 
            // tell the user
            echo json_encode(array("message" => "Unable to update subscription."));
        }
    }
    else {
 
        // set response code - 400 bad request
        http_response_code(400);
 
        // tell the user
        echo json_encode(array("message" => "Unable to update subscription. Data is incomplete."));
    }
?>