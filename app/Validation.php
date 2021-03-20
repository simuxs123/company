<?php
namespace CompanyApp;
class Validation {
    private static $errors=[];
    public static function validate($data){
        self::validateName($data['name']);
        self::validateCode($data['code']);
        self::validateVatCode($data['vatCode']);
        self::validateAddress($data['address']);
        self::validatePhone($data['phone']);
        self::validateEmail($data['email']);
        self::validateActivity($data['activities']);
        self::validateManager($data['manager']);
        return self::$errors;
    }
    public static function validateName($name){
        $validName=preg_match('/^[\w\d ,.]{1,100}$/',$name);
        if(empty($name)){
            Validation::$errors['name']="Input required";
        } else if(!$validName){
            Validation::$errors['name']="Max name length 150";
        } else {
            Validation::$errors['name']="";
        }
    }
    public static function validateCode($code){
        $validCode=preg_match('/^[0-9]{7,9}$/',$code);
        if(empty($code)){
            Validation::$errors['code']="Input required";
        } else if(!$validCode){
            Validation::$errors['code']="Company code must contain 7-9 digits";
        } else {
            Validation::$errors['code']="";
        }
    }
    public static function validateVatCode($vatCode){
        $validVatCode=preg_match('/^[0-9]{9}$/',$vatCode);
        if(empty($vatCode)){
            Validation::$errors['vatCode']="Input required";
        } else if(!$validVatCode){
            Validation::$errors['vatCode']="Vat code must contain 9 digits";
        } else {
            Validation::$errors['vatCode']="";
        }
    }
    public static function validateAddress($address){
        if(empty($address)){
            Validation::$errors['address']="Input required";
        } else {
            Validation::$errors['address']="";
        }
    }
    public static function validatePhone($phone){
        $validPhone=preg_match('/^[+][0-9]{11}$/',$phone);
        if(empty($phone)){
            Validation::$errors['phone']="Input required";
        } else if(!$validPhone){
            Validation::$errors['phone']="Phone number is incorrect";
        } else {
            Validation::$errors['phone']="";
        }
    }
    public static function validateEmail($email){
        if(empty($email)){
            Validation::$errors['email']="Input required";
        } else if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
            Validation::$errors['email']="Email format is incorrect";
        } else {
            Validation::$errors['email']="";
        }
    }
    public static function validateActivity($activity){
        $validActivity=preg_match('/^[A-Za-z\\- \']+$/',$activity);
        if(empty($activity)){
            Validation::$errors['activities']="Input required";
        } else if(!$validActivity){
            Validation::$errors['activities']="Input is incorrect";
        } else {
            Validation::$errors['activities']="";
        }
    }
    public static function validateManager($manager){
        $validManager=preg_match('/^[A-Za-z\\- \']+$/',$manager);
        if(empty($manager)){
            Validation::$errors['manager']="Input required";
        } else if(!$validManager){
            Validation::$errors['manager']="Input is incorrect";
        } else {
            Validation::$errors['manager']="";
        }
    }
}