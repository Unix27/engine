<?php

namespace App\Helpers;


class RemoveFromString
{
	/**
	 * Remove Direct Contact Info from string
	 *
	 * @param $string
	 * @param bool $beforeFormSubmit
	 * @param bool $altText
	 * @return string
	 */
	public static function contactInfo($string, $beforeFormSubmit = false, $altText = false)
	{
		if ($beforeFormSubmit) {
			if (config('settings.single.remove_url_before')) {
				$string = self::links($string, $altText);
			}
			if (config('settings.single.remove_email_before')) {
				$string = self::emails($string, $altText);
			}
			if (config('settings.single.remove_phone_before')) {
				$string = self::phoneNumbers($string, $altText);
			}
		} else {
			if (config('settings.single.remove_url_after')) {
				$string = self::links($string, $altText);
			}
			if (config('settings.single.remove_email_after')) {
				$string = self::emails($string, $altText);
			}
			if (config('settings.single.remove_phone_after')) {
				$string = self::phoneNumbers($string, $altText);
			}
		}
		
		return $string;
	}
	
	/**
	 * Remove Links & URL from string
	 *
	 * @param $string
	 * @param bool $altText
	 * @param bool $removeLinksText
	 * @return string
	 */
	public static function links($string, $altText = false, $removeLinksText = false)
	{
		if (!is_string($string)) return '';
		
		$replace = ($altText) ? ' [***] ' : ' ';
		
		if (!$removeLinksText) {
			$string = preg_replace('/<a.*?>(.*?)<\/a>/ui', '\1', $string);
		} else {
			$string = preg_replace('/<a.*?>.*?<\/a>/ui', $replace, $string);
		}
		$string = preg_replace('/\b((https?|ftp|file):\/\/|www\.)[-A-Z0-9+&@#\/%?=~_|$!:,.;]*[A-Z0-9+&@#\/%=~_|$]/ui', $replace, $string);
		$string = preg_replace('/ +/', ' ', $string);
		
		return $string;
	}
	
	/**
	 * Remove Email Addresses from string
	 *
	 * @param $string
	 * @param bool $altText
	 * @return string
	 */
	public static function emails($string, $altText = false)
	{
		if (!is_string($string)) return '';
		
		$replace = ($altText) ? ' [***] ' : ' ';
		$patterns = [
			'/[a-z0-9\-\._%\+]+@[a-z0-9\-\.]+\.[a-z]{2,4}\b/i',
			'/[a-z0-9\-_]+(\.[a-z0-9\-_]+)*@[a-z0-9\-]+(\.[a-z0-9\-]+)*(\.[a-z]{2,3})/i',
			'/([a-z0-9\-\._]+)@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.)|(([a-z0-9\-]+\.)+))([a-z]{2,4}|[0-9]{1,3})(\]?)/i',
		];
		foreach ($patterns as $key => $pattern) {
			$string = preg_replace($pattern, $replace, $string);
		}
		$string = preg_replace('/ +/', ' ', $string);
		
		return $string;
	}
	
	/**
	 * Remove Phone Numbers from string
	 *
	 * @param $string
	 * @param bool $altText
	 * @return string
	 */
	public static function phoneNumbers($string, $altText = false)
	{
		if (!is_string($string) && !is_numeric($string) && !ctype_alnum($string)) return '';
		
		$replace = ($altText) ? ' [***] ' : ' ';
		$pattern = '/([\(\)\\s]?[\+\\s]?[0-9]+[\-\.\(\)\\s]?[0-9]+[\-\.\(\)\\s]?){4,}/ui';
		
		$string = preg_replace($pattern, $replace, $string);
		$string = preg_replace('/ +/', ' ', $string);
		
		return $string;
	}


    /**
     * @param $string
     * @param bool $strip_tags
     * @return string|string[]|null
     */
    public static function  escape_xml($string, $strip_tags = false)
    {
        if ($strip_tags) {
            $string = preg_replace('#<br.*?>#i', "\n", $string);
            $string = preg_replace('#</p>#i', "\n", $string);
            $string = strip_tags($string);
            //$string = strip_tags(' /&gt;'$string);
        }
        $string = htmlspecialchars_decode($string);

        $string = str_replace(
            array('&mdash;', '&amp;mdash;', '&quot;', '&quotе;', '&nbsp;', '&amp;oacute;'),
            array('-', '-', '"', '"', ' ',),
            $string);

//        $string = str_replace(
//            array(chr(31),),
//            ' ',
//            $string);

        $string = htmlspecialchars($string);

        $string = str_replace(array('&amp;', '&quot;'), array('&', ''), $string);


        //reject overly long 2 byte sequences, as well as characters above U+10000 and replace with ?
        $string = preg_replace('/[\x00-\x08\x10\x0B\x0C\x0E-\x19\x7F]' .
            '|[\x00-\x7F][\x80-\xBF]+' .
            '|([\xC0\xC1]|[\xF0-\xFF])[\x80-\xBF]*' .
            '|[\xC2-\xDF]((?![\x80-\xBF])|[\x80-\xBF]{2,})' .
            '|[\xE0-\xEF](([\x80-\xBF](?![\x80-\xBF]))|(?![\x80-\xBF]{2})|[\x80-\xBF]{3,})/S',
            '?', $string);

        //reject overly long 3 byte sequences and UTF-16 surrogates and replace with ?
        $string = preg_replace('/\xE0[\x80-\x9F][\x80-\xBF]' .
            '|\xED[\xA0-\xBF][\x80-\xBF]/S', '?', $string);

        return $string;
    }

    /**
     * @param $string
     * @param array $words
     * @return string|string[]
     */
    public static function minus_words($string, $words = [])
    {
        if (!is_string($string)) return '';
        return str_replace($words, '', $string);
    }

    /**
     * @param string $string
     * @return String
     */
    public static function kir2lat(string $string) : String
    {
        $s = html_entity_decode($string, ENT_QUOTES);
        $from = array('/Е/', '/О/', '/Р/', '/А/', '/Н/', '/К/', '/Х/', '/С/', '/В/');
        $to = array('E', 'O', 'P', 'A', 'H', 'K', 'X', 'C', 'B');
        $s = preg_replace($from, $to, $s);
        $from = array('/е/', '/о/', '/р/', '/а/', '/к/', '/х/', '/с/', '/в/');
        $to = array('e', 'o', 'p', 'a', 'k', 'x', 'c', 'b');
        $s = preg_replace($from, $to, $s);
        return $s;
    }

    /**
     * @param string $string
     * @return String
     */
    public static function lat2kir(string $string) : String
    {
        $s = html_entity_decode($string, ENT_QUOTES);
        $from = array('E', 'O', 'P', 'A', 'H', 'K', 'X', 'C', 'B');
        $to = array('Е', 'О', 'Р', 'А', 'Н', 'К', 'Х', 'С', 'В');
        $s = str_replace($from, $to, $s);
        $from = array('e', 'o', 'p', 'a', 'k', 'x', 'c', 'b');
        $to = array('е', 'о', 'р', 'а', 'к', 'х', 'с', 'в');
        $s = str_replace($from, $to, $s);
        return $s;
    }
}
