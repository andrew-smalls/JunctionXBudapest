<?php

class Controller extends Model{
    protected function add_user($first_name,$email,$password,$type,$cancer_type,$address){
        return $this->addUser($first_name,$email,$password,$type,$cancer_type,$address);
    }

    public function uploadTreatmentSummary($patientName, $doctorName, $fileName){
        return $this->uploadTreatmentSummary($patientName, $doctorName, $fileName);
    }

    protected function add_photos($image,$type,$user_id,$submission_id){
        return $this->addImage($image,$type,$user_id,$submission_id);
    }

    protected function add_submission($user_id,$description){
        return $this->addSubmission($user_id,$description);
    }

<<<<<<< HEAD
    protected function checkLogin($email,$password){
        return $this->confirmIdentity($email,$password);
    }

    protected function get_user_by_Id($user_id){
        return $this->getUserById($user_id);
=======
    public function parse_link($url, $keywords)
    {
        return $this->parseLink($url, $keywords);
>>>>>>> 018bf95cd0a46a3c209eed6640760fbdf79a6b9d
    }
}