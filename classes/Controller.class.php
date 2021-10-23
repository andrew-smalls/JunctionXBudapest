<?php

class Controller extends Model{
    protected function add_user($first_name,$email){
        return $this->addUser($first_name,$email);
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
}