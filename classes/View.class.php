<?php

class View extends Model{
    protected function get_users(){
        return $this->getUsers();
    }
    

    protected function get_user_by_id($user_id){
        return $this->getUserById($user_id);
    }

    protected function get_symptoms($patientName){
        return $this->getSymptoms($patientName);
    }

    protected function get_submissions(){
        return $this->getSubmissions();
    }

    protected function get_submission_by_id($id){
        return $this->getSubmissionById($id);
    }
}