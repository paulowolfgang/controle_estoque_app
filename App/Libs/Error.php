<?php

	namespace App\Libs;

	use Exception;

	class Error
	{
		private $message;
		private $code;

		public function __construct($objetoException = Exception::class)
		{
			$this->message = $objetoException->getMessage();
			$this->code    = $objetoException->getCode();
		}

		public function render()
		{
			$varMessage = $this->message;

			if(file_exists(PATH . "/App/Views/error/" . $this->code . ".php"))
			{
				require_once PATH . "/App/Views/error/" .$this->code . ".php";
			} else {
				require_once PATH . "/App/Views/error/500.php";
			}
			exit;
		}

	}
