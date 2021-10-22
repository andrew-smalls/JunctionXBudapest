<?php

class Controller extends Model{
    protected function add_user($first_name,$email){
        return $this->addUser($first_name,$email);
    }
}