<?php

class Model extends Dbh {

    public function addUser($first_name, $email,$password,$type,$cancer_type,$address){
        $hash=password_hash($password,PASSWORD_DEFAULT);
        $sql = "INSERT INTO users(first_name,email,password,type,cancer_type,address) VALUES(?,?,?,?,?,?)";
        $stmt=$this->connect()->prepare($sql);
        return $stmt->execute([$first_name,$email,$hash,$type,$cancer_type,$address]);
    }

    public function getUsers(){
        $sql="SELECT * FROM users";
        $stmt=$this->connect()->query($sql);
        $results=$stmt->fetchAll();
        return $results;
    }

    public function getUserById($user_id){
        $sql="SELECT * FROM users WHERE user_id=".$user_id."";
        $stmt=$this->connect()->query($sql);
        return $stmt->fetch();
    }

    public function getUsersByType($type){
        $sql="SELECT * FROM users WHERE type=".$type."";
        $stmt=$this->connect()->query($sql);
        return $stmt->fetchAll();
    }

    public function getSubmissions(){
        $sql="SELECT * FROM submissions";
        $stmt=$this->connect()->query($sql);
        return $stmt->fetchAll();
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

    public function confirmIdentity($email,$password){
        $sql="SELECT * FROM users WHERE email=?";
        $stmt=$this->connect()->prepare($sql);
        if($stmt->execute([$email])){
            if($row=$stmt->fetch()){
                $check_pass=password_verify($password,$row['password']);
                if($check_pass){
                    return $row['user_id'];
                }
            }
        }
        else{
            return false;
        }
    }

    public function parseLink($url, $keywords)
    {
        
        exec("python inner/install_imports.py $url $keywords", $output);
        
        //return var_dump($output);
        return $output;
    }

    public function getSubmissionById($id){
        $sql="SELECT * FROM submissions WHERE submission_id=".$id."";
        $stmt=$this->connect()->query($sql);
        return $stmt->fetch();
    }

    public function getImagesBySubmissionId($id){
        $sql="SELECT * FROM images WHERE submission_id=".$id."";
        $stmt=$this->connect()->query($sql);
        return $stmt->fetchAll();
    }
}