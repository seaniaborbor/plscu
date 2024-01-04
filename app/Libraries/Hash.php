<?php 
namespace App\Libraries;

class Hash
{
    public static function make($password)
    {
        return password_hash($password, PASSWORD_DEFAULT);
    }

    public static function check($enteredpwd, $hasedpwd)
    {
        if(password_verify($enteredpwd, $hasedpwd))
        {
            return true;
        }
        else 
        {
            return false;
        }
    }
}