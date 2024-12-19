<?php 
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\SMTP;

require_once "./PHPMailer.php";
require_once "./Exception.php";
require_once "./SMTP.php";

class MailService {

	private $service;
	private $config;


	public function __construct() {

		$this->service = new PHPMailer(true); 

//			"port" => "465",
//			"port" => "587",

/*		$this->config = array(
			"host" => "smtp.gmail.com",
			"port" => "465",
			"username" => "dafloresdev@gmail.com",
			"password" => "Tulipan#2021",
			"from" =>  "dafloresdev@gmail.com"
		);*/

		$this->config = array(
			"host" => "smtp.gmail.com",
			"port" => "465",
			"username" => "solucionaticos@gmail.com",
			"password" => "AmadoRD4v1D4791",
			"from" =>  "solucionaticos@gmail.com"
		);

		$this->init();

	}

	public function init() {
//		$this->service->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            
		$this->service->SMTPSecure = "ssl";            		
//		$this->service->SMTPSecure = "tls";            		
//		$this->service->SMTPDebug = SMTP::DEBUG_SERVER;                      //Enable verbose debug output
		$this->service->isSMTP();                                            //Send using SMTP
		$this->service->Host       = $this->config["host"];                     //Set the SMTP server to send through
		$this->service->SMTPAuth   = true;                                   //Enable SMTP authentication
		$this->service->Username   = $this->config["username"];                     //SMTP username
		$this->service->Password   = $this->config["password"];  
		$this->service->Port   = $this->config["port"];  
		$this->service->setFrom($this->config["from"]);  
	}

	public function setAddress($email) {

		$this->service->addAddress($email);

	}

	public function setBody($html = true, $subject, $body, $altBody) {

		$this->service->Subject = $subject;
		$this->service->Body = $body;
		$this->service->AltBody = $altBody;
		$this->service->isHTML($html);

	}

	public function send() {
		try {
			$this->service->send();
		} catch (Exception $e) {
			echo $e->getMessage();
		}
	}

}

