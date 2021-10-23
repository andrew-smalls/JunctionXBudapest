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
        $sql = "INSERT INTO treatementSummaries (patientName, doctorName, fileName) VALUES (?, ?, ?)";
        $stmt=$this->connect()->prepare($sql);
        
        return $stmt->execute([$patientName, $doctorName,$fileName]);
    }
    public function addImage($image,$type,$user_id,$submission_id){
        $sql = "INSERT INTO images(user_id,submission_id,image,image_type) VALUES(?,?,?,?)";
        $stmt=$this->connect()->prepare($sql);
        return $stmt->execute([$user_id,$submission_id,$image,$type]);
    }

    public function addSubmission($user_id,$description){
        $sql = "INSERT INTO submissions(user_id,description) VALUES(?,?)";
        $stmt=$this->connect()->prepare($sql);
        $stmt->execute([$user_id,$description]);
        $sql="SELECT max(submission_id) as max_id FROM submissions";
        $stmt=$this->connect()->query($sql);
        $results=$stmt->fetch(PDO::FETCH_ASSOC);
        $last_id=$results['max_id'];
        return $last_id;
    }

    public function parseLink($url, $keywords)
    {
        
        exec("python inner/install_imports.py $url $keywords", $output);
        
        return var_dump($output);
    }
}