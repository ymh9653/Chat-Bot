<?php
    function processMessage($update) { 
            $dbString = "pgsql:"
            . "ec2-54-235-66-24.compute-1.amazonaws.com;"
            . "dbname=d5tfc77ecvjh96;"
            . "user=ytchabybvuaeog;"
            . "port=5432;"
            . "sslmode=require;"
            . "password=f457e5a75151626f6a23493485673b3ea75595a7dcbcfd3b7994fc9d7f1e53d5";
        
                $db = new PDO($dbString); 
                if($update["result"]["action"] == "DBtest" ){
                $paper = $update["result"]["parameters"]["paper1"];
                if(empty($paper)){
                    $paper = $update["result"]["parameters"]["paper2"];
                    if(empty($paper)){
                        $paper = $update["result"]["parameters"]["paper3"];
                    }
                }
                
                $query = "SELECT * FROM papers WHERE prereq LIKE '%$paper%'";
                $result = $db->query($query);
                /*if($row["prereq"] == "NONE" || $row["prereq"] == " NONE"){
                    sendMessage(array(
                        "source" => $update["result"]["source"],
                        "speech" => $paper . " is not a requirement for any papers.",
                        "displayText" => $paper . " is not a requirement for any papers.",
                        "contextOut" => array()
                    ));
                }*/
                else{
                    while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
                        $pLevel = $row["paperlevel"];
                        $pCode = $row["papercode"];
                        $pName = $row["papername"];
                        $pPoints = $row["paperpoints"];
                        $pPre = $row["paperpre"];
                        $pCor = $row["papercos"];                        
                    }
                        $result->closeCursor();
                        
                        sendMessage(array(
                            "source" => $update["result"]["source"],
                            "speech" => $paper. ". Name: " .$pName. ". Points: ". $pPoints,
                            "displayText" => $paper. ". Name: " .$pName. ". Points: ". $pPoints,
                            "contextOut" => array()
                        ));
                    
                        sendMessage(array(
                            "source" => $update["result"]["source"],
                            "speech" => $paper . " is a Requirement for: " . $pName,
                            "displayText" => $paper . " is a Requirement for: " . $pName,
                            "contextOut" => array()
                        ));
                    
                }  
            }
        }
        
        function sendMessage($parameters) {
            echo json_encode($parameters);
        }
        
        $update_response = file_get_contents("php://input");
        $update = json_decode($update_response, true);
        if (isset($update["result"]["action"])) {
            processMessage($update);
        }
?>