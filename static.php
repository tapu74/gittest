<?php
class User
{
    public $name;
    public $age;
    public static $minimumPasswordLength = 6;
    
    public function Describe()
    {
        return $this->name . " is " . $this->age . " years old";
    }
    
    public static function ValidatePassword($password)
    {
        if(strlen($password) >= $minimumPasswordLength)
            return true;
        else
            return false;
    }
}


?>