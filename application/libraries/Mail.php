<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Mail{
	private $_CI;
	private $_transport, $_mailer;
	function __construct(){
		$this->_CI =& get_instance();
		$this->_CI->load->config('mail');

		$this->_transport = (new Swift_SmtpTransport($this->getConfigItem('server'), $this->getConfigItem('port')))
							->setUsername($this->getConfigItem('username'))
							->setPassword($this->getConfigItem('password'))
							->setTimeout(-1);
		$this->_mailer = new Swift_Mailer($this->_transport);
	}

	function send($subject, $to, $message){
		$message = (new Swift_Message($subject))
					->setFrom([$this->getConfigItem('from_email') => $this->getConfigItem('from_name')])
					->setTo([$to->email => $to->name])
					->setBody($message);

		$result = $this->_mailer->send($message);

		return $result;		
	}

	private function getConfigItem($key){
		return $this->_CI->config->item($key);
	}
}