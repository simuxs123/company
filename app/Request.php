<?php
namespace CompanyApp;
class Request {
    public static function uri(){
        return str_replace("/company","",trim($_SERVER['REQUEST_URI']));
    }
}