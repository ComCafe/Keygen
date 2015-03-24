<?php
/**
 *
 *	Cette classe a été créé par Salvatore Livolsi
 *	Website : www.comcafe.be
 *	E-mail : lab@comcafe.be
 *
 */

class Keygen {
	private $length = 10;
	private $string = "";
	private $soft = "azertyuipqsdfghjklmwxcvbnAZERTYUIPQSDFGHJKLMWXCVBN1234567890";
	private $hard = "&|@#(!{})[]$=+?";
	private $strtolower = false;
	private $strtoupper = false;

	/**
	 * Cette fonction est le constructeur de la classe
	 * Elle prend en paramètre la longueur "par defaut"
	 * de la fonction random().
	 * @param <int> $length 
	 */
	public function __construct($length = false)
	{
		$this->length($length);
		$this->soft();
		return $this;
	}

	/**
	 * Cette fonction permet de retourner une chaine de caractère
	 * de longueur $length:
	 *		Soit vous lui passez la longueur en paramètre
	 *		Soit vous passez la longueur dans le constructeur
	 *  
	 * @param <int> $length
	 * @return <string> 
	 */
	public function random($length=false)
	{
		if($length) $this->length($length);

		$return = "";
		for($i=0;$i<$this->length;$i++):
			$return .= $this->string[rand(0,strlen($this->string)-1)];
		endfor;

		return $this->output($return);
	}

	/**
	 * Cette fonction permet de generer un serial
	 * Il faut passer :
	 *		le nombre de rangée,
	 *		le nombre de chiffre par rangé,
	 *		et le separateur
	 * @param <int> $range
	 * @param <int> $nbByRange
	 * @param <string> $separator
	 * @return <string>
	 */
	public function serial($range = 4, $nbByRange = 4, $separator="-")
	{
		$return = "";
		$j=0;
		for($i=0;$i<($range*$nbByRange);$i++):
			if($j == $nbByRange) :
				$return .= $separator;
				$j=0;
			endif;
			$return .= $this->string[rand(0,strlen($this->string)-1)];
			$j++;
		endfor;
		
		return $this->output($return);
	}

	/**
	 * Cette fonction permet de generer un serial personnalisé.
	 * Il suffit de lui passer une chaine contenant des # (par defaut) qui seront remplacés
	 * par des lettres aléatoires.
	 *
	 * Si vous voulez changer le symbole à remplacer, il suffit de le mentionner
	 * comme deuxième argument.
	 *
	 * ex : ITEM-####-####-##BE
	 *
	 * @param <string> $serial
	 * @param <string> $remplace
	 * @return <string>
	 */
	public function customSerial($serial, $remplace="#")
	{
		$return = "";

		for($i=0; $i<strlen($serial);$i++):
			if($serial[$i] == $remplace) $return .= $this->string[rand(0,strlen($this->string)-1)];
			else $return .= $serial[$i];
		endfor;

		return $this->output($return);
	}

	/**
	 * Cette fonction permet de retourner la chaine en majuscule
	 * @return <object>
	 */
	public function upper()
	{
		$this->strtoupper = true;
		return $this;
	}

	/**
	 * Cette fonction permet de retourner la chaine en miniscule
	 * @return <object>
	 */
	public function lower()
	{
		$this->strtolower = true;
		return $this;
	}

	

	/**
	 * Cette fonction permet de compliquer la liste des lettres aleatoires.
	 * @return <object>
	 */
	public function hard()
	{
		$this->string = $this->soft . $this->hard;
		return $this;
	}

	/**
	 * Cette fonction permet de simplifier la liste des lettres aleatoires.
	 * @return <object>
	 */
	public function soft()
	{
		$this->string = $this->soft;
		return $this;
	}

	/**
	 * Cette fonction permet d'appeler la classe de manière statique
	 * @return <object>
	 */
	public static function factory($length = false)
	{
		return new Keygen($length);
	}

	/**
	 * Cette fonction permet de changer la longueur de la chaine random()
	 * @param <int> $length
	 * @return <object>
	 */
	protected function length($length=false)
	{
		if($length)
			$this->length = $length;

		return $this;
	}

	/**
	 * Cette fonction retourne la chaine en effectuant des opérations
	 * @param <string> $str
	 * @return <string>
	 */
	private function output($str)
	{
		$return = $str;
		if($this->strtolower)
			return strtolower($str);

		if($this->strtoupper)
			return strtoupper($str);

		return $return;
	}
}
