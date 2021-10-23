<?php

class Model extends Dbh {

    public function addUser($first_name, $email){
        $sql = "INSERT INTO users(first_name,email) VALUES(?,?)";
        $stmt=$this->connect()->prepare($sql);
        return $stmt->execute([$first_name,$email]);
    }

    public function getUsers(){
        $sql="SELECT * FROM users";
        $stmt=$this->connect()->query($sql);
        $results=$stmt->fetchAll();
        return $results;
    }

    public function getSymptoms($patientName)
    {
        $sql = "SELECT * FROM patientInfo WHERE patientName='$patientName'";
        $stmt=$this->connect()->query($sql);
        $results=$stmt->fetchAll();
        
        return $results;
    }

    public function uploadTreatmentSummary($patientName, $doctorName, $fileName)
    {
        $sql = "INSERT INTO treatementSummaries (patientName, doctorName, filename) VALUES (?, ?, ?)";
        $stmt=$this->connect()->prepare($sql);
        
        return $stmt->execute([$patientName, $doctorName,$filename]);
    }

}