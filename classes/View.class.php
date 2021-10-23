<?php

class View extends Model{
    protected function get_users(){
        return $this->getUsers();
    }

    protected function get_symptoms($patientName){
        return $this->getSymptoms($patientName);
    }
}