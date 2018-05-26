<?php
    function processMessage($request) {         
            $dbString = "pgsql:"
                        . "host=ec2-54-235-66-24.compute-1.amazonaws.com;"
                        . "dbname=d5tfc77ecvjh96;"
                        . "user=ytchabybvuaeog;"
                        . "port=5432;"
                        . "sslmode=require;"
                        . "password=f457e5a75151626f6a23493485673b3ea75595a7dcbcfd3b7994fc9d7f1e53d5";
                $db = new PDO($dbString); 
                
                if ($request["queryResult"]["action"] == "DBLink" ) {
                    $papercode = $request["queryResult"]["parameters"]["paper1"];
                    
                    $query = "SELECT * FROM papers WHERE papercode LIKE '%$papercode'";
                    $dbres = $db->query($query);

                    $pLevel = $pCode = $pName = $pPoints = $pCos = $pPres = "default";
                    while ($row = $dbres->fetch(PDO::FETCH_ASSOC)) {
                        $pLevel = $row["paperlevel"];
                        $pCode = $row["papercode"];
                        $pName = $row["papername"];
                        $pPoints = $row["paperpoints"];
                        $pCos = $row["papercos"];
                        $pPres = $row["paperpros"];
                    }

                    $dbres->closeCursor();

                    $speech = $pName . ", worth " . $pPoints . " points";
                    $text = $pName . ", worth " . $pPoints . " points";

                    $response = new \stdClass();
                    $response->fulfillmentText = $text;
                    $response->source = $update["queryResult"]["source"];
                    sendMessage($response);
                    // sendMessage( array (
                    //     "source" => $update["queryResult"]["source"],
                    //     "speech" => $pName . ", worth " . $pPoints . " points",
                    //     "displayText" => $pName . ", worth " . $pPoints . " points",
                    //     "contextOut" => array()
                    // ) );
                }
            }
        
        function sendMessage($parameters) {
            echo json_encode($parameters);
        }
        
        $request_response = file_get_contents("php://input");
        $request = json_decode($request_response, true);
        if (isset($request["queryResult"]["action"])) {
            processMessage($request);
        }
    
?>