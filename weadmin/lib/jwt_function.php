<?php  
include("jwt/src/JWT.php");
require 'vendor/autoload.php';
use \Firebase\JWT\JWT;

//######### สร้าง function สำหรับ สร้าง Json Web Token โดยรับ String user ########
function encode_jwt($user){   //กำหนด key สำหรับ encode jwt
	global $key,$coreStatusCode;
	//สร้าง object ข้อมูลสำหรับทำ jwt
	$payload = array(
		"user" => $user,
		"date_time" => strtotime(date("Y-m-d H:i:s")),
		"expire_time" => strtotime("+1 day",strtotime(date("Y-m-d H:i:s")))//กำหนดวันเวลาที่สร้าง
	);
	//สร้าง JWT สำหรับ object ข้อมูล
	$jwt = JWT::encode($payload, $key);
	
	//เพื่อความปลาดภัยยิ่งขึ้นเมื่อได้ JWT แล้วควรเข้ารหัสอีกชั้นหนึ่ง
	$jwt=encrypt_decrypt($jwt,"encrypt");
	
	$valStatusCode = "1001";
	$arrayReturn = array(
		"status" => 	$coreStatusCode[$valStatusCode]['code'],
		"msg" => 	$coreStatusCode[$valStatusCode]['msg'],
		"token" => $jwt
	);
	
	// return token ที่สร้าง
	return $arrayReturn;
}

//######### สร้าง function สำหรับอ่านข้อมูล User จาก JWT ( Token ) ########
function decode_jwt($jwt){
	global $key,$coreStatusCode;
	//กำหนด key สำหรับ decode jwt โดย
	try{
		//ถอดรหัส token
		$jwt= encrypt_decrypt($jwt,"decrypt");
		//decode token ให้เป็นข้อมูล user
		$payload = JWT::decode($jwt, $key, array('HS256'));

	}catch(Exception $e)
	{   //กรณี Token ไม่ถูกต้องจะ return false
		return false;
	}
	
	$valStatusCode = "1001";
	$resCode =  array(
			"status" => 	$coreStatusCode[$valStatusCode]['code'],
			"msg" => 	$coreStatusCode[$valStatusCode]['msg']
		);

	$resArray =(array)$payload;
	
	$resReturn = array_merge($resCode,$resArray);
	
	return  $resReturn;
}
	
//######### function  สำหรับเข้ารหัส และถอดรหัส token เพื่อความปลอดภัย ########
function encrypt_decrypt($str,$action){
	global $keyencrypt, $ivencrypt;
	$key = $keyencrypt;
	$iv_key = $ivencrypt;
	$method="AES-256-CBC";
	$iv=substr(md5($iv_key),0,16);
	$output="";

	if($action=="encrypt")
	{
		$output=openssl_encrypt($str, $method,$key,0,$iv);
	}
	else if($action=="decrypt")
	{
		$output=openssl_decrypt($str, $method,$key,0,$iv);
	}

	return $output;
}
	
//######### function  สำหรับ token พร้อมใช้งาน ########
function getTokenAlready($token){
	global $coreStatusCode, $keyApiJWT;
		 if(!$token){
		 	$valStatusCode = "1007";
		 }else{
			$jwt=decode_jwt($token);//decode ข้อมูล user จาก toekn ที่ client ส่งมา
			if(!$jwt){//แสดงว่า token ไม่ถูกต้อง
				$valStatusCode = "1007";
			}else {   //ส่งข้อมูล user จาก token ที่ client ส่งมากลับไปในรูปแบบ json
				if($jwt['user']!=$keyApiJWT){  // User Not found
					$valStatusCode = "1000";
				}else{
					$valDateReal = strtotime(date("Y-m-d H:i:s"));
					if($valDateReal<=$jwt['expire_time']){ // Tokenid expire
						$valStatusCode = "1001";
					}else{
						$valStatusCode = "1002";
					}
				}
			}
		}
	if($valStatusCode=="1001"){
		$resReturn =$jwt;
	}else{
	$resReturn =  array(
			"status" => 	$coreStatusCode[$valStatusCode]['code'],
			"msg" => 	$coreStatusCode[$valStatusCode]['msg']
		);
	}
	return $resReturn;
}

//######### function  Authorization Header   ########
function getAuthorizationHeader()
{
    $headers = null;
    if (isset($_SERVER['Authorization'])) {
        $headers = trim($_SERVER["Authorization"]);
    } else if (isset($_SERVER['HTTP_AUTHORIZATION'])) { //Nginx or fast CGI
        $headers = trim($_SERVER["HTTP_AUTHORIZATION"]);
    } elseif (function_exists('apache_request_headers')) {
        $requestHeaders = apache_request_headers();
        // Server-side fix for bug in old Android versions (a nice side-effect of this fix means we don't care about capitalization for Authorization)
        $requestHeaders = array_combine(array_map('ucwords', array_keys($requestHeaders)), array_values($requestHeaders));
        //print_r($requestHeaders);
        if (isset($requestHeaders['Authorization'])) {
            $headers = trim($requestHeaders['Authorization']);
        }
    }
    return $headers;
}

//######### function  get access token from header  ########
function getBearerToken()
{
    $headers = getAuthorizationHeader();
    // HEADER: Get the access token from the header
    if (!empty($headers)) {
        if (preg_match('/Bearer\s(\S+)/', $headers, $matches)) {
            return $matches[1];
        }
    }
    return null;
}


?>