<?php
/**
 *  xWAF 2.1 - Free Web Application Firewall, Open-Source.
 *
 *  @author Alemalakra
 *  @version 3.0
 */

class xWAF {
	function __construct() {
		$this->IPHeader = "REMOTE_ADDR";
		$this->CookieCheck = true;
		$this->CookieCheckParam = 'username';
		return true;
	}
	function shorten_string($string, $wordsreturned) {
		$retval = $string;
		$array = explode(" ", $string);
		if (count($array)<=$wordsreturned){
			$retval = $string;
		} else {
			array_splice($array, $wordsreturned);
			$retval = implode(" ", $array)." ...";
		}
		return $retval;
	}
	function vulnDetectedHTML($Method, $BadWord, $DisplayName, $TypeVuln) {
		header('HTTP/1.0 403 Forbidden');
		echo '<!DOCTYPE html><html lang="en" xmlns="//www.w3.org/1999/xhtml"><head><style>.app-header,body{text-align:center }.btn,button.btn,input.btn{border:0;outline:0;display:inline-block;vertical-align:middle;border-radius:5em;background-color:#609f43;color:#fff;padding:5px 12px;background-repeat:no-repeat;font-size:14px }.btn:hover{background-color:#58913d }.clearfix:after,.clearfix:before,footer,header,section{display:block }.clearfix:after,.clearfix:before,.row:after{clear:both;content:"" }.clearfix:after,.clearfix:before,.logo-neartext:before,.row:after{content:"" }*{margin:0;padding:0 }html{box-sizing:border-box;font-family:"Open Sans",sans-serif }body,html{height:100% }*,:after,:before{box-sizing:inherit }body{background-color:#e8e8e8;font-size:14px;color:#222;line-height:1.6;padding-bottom:60px }h1{font-size:36px;margin-top:0;line-height:1;margin-bottom:30px }h2{font-size:25px;margin-bottom:10px }a{color:#1e7d9d;text-decoration:none }a:hover{text-decoration:underline }.access-denied .btn:hover,.site-link,footer a{text-decoration:none }.color-green{color:#609f43 }.color-gray{color:grey }hr{border:0;margin:20px auto;border-top:1px #e2e2e2 solid }[class*=icon-circle-]{display:inline-block;width:14px;height:14px;border-radius:50%;margin:-5px 8px 0 0;vertical-align:middle }.icon-circle-red{background-color:#db1802 }#main-container{min-height:100%;position:relative }.app-header{background-color:#333;min-height:50px;padding:0 25px }.app-header .logo{display:block;width:100px;height:24px;float:left;background:url(data:image/png;base64,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) center center no-repeat;background-size:100px 24px;position:absolute;left:0;top:12px }.logo-neartext{display:inline-block;margin-top:3px;color:#fff;font-size:25px;font-weight:600 }.site-link{color:#8a8a8a;font-size:11px;position:absolute;top:15px;right:0 }#recaptcha_image,.box,.captcha,.wrap{position:relative }.wrap{max-width:1090px;margin:auto }.app-content{max-width:580px;margin:40px auto 0;text-align:left;text-align:center }.box{border-radius:10px;background-color:#fff;padding:35px;box-shadow:0 1px 0 0 #d4d4d4;margin:0 4% 35px }#block-details{margin-bottom:35px;margin-top:25px }.row:first-child{border-top:0!important }.row:last-child{border-bottom:0!important }.row:nth-child(even){border:1px solid #e2e2e2;border-left:0;border-right:0;background:#fafafa }.row:after{display:block }.row>div{float:left;padding:12px;word-wrap:break-word }.row>div:first-child{width:15%;font-weight:700 }.row>div:last-child{width:85% }.code-snippet{border:1px solid grey;background-color:#f7f7f7;box-shadow:0 1px 4px 0 rgba(0,0,0,.2);border-radius:8px;padding:18px;margin:30px 0 45px }.medium-text{font-size:16px;clear:both }footer{margin-top:50px;margin-bottom:50px;font-size:13px;color:grey }#privacy-policy{padding-left:25px }@media (max-width:979px){h1{font-size:30px }h2{font-size:20px }.row>div{float:none;width:100%!important }}.captcha{background-color:#fff;width:370px;margin:auto;padding:25px 35px 35px;border-radius:10px;box-shadow:0 1px 0 0 #d4d4d4;border:1px solid #bfbfbf }.captcha-title{text-align:left;margin-bottom:15px;font-size:13px;line-height:1 }table.recaptchatable{margin-left:-14px!important }table#recaptcha_table input[type=text]{height:37px;display:block;width:300px!important;padding:10px!important;border-color:#b8b8b8;font-size:14px;margin-top:20px!important }table#recaptcha_table input[type=text]:focus{background-color:#f9f9f9;border-color:#222;outline:0 }table#recaptcha_table td{display:block;background:0!important;padding:0!important;height:auto!important;position:static!important }#recaptcha_image{border:1px solid #b8b8b8!important;padding:5px;height:60px!important;margin-bottom:25px!important;left:-2px;overflow:hidden;-moz-box-sizing:border-box!important;-webkit-box-sizing:border-box!important;box-sizing:border-box!important }#recaptcha_image img{position:absolute;left:0;top:0 }#recaptcha_reload_btn,#recaptcha_switch_audio_btn,#recaptcha_whatsthis_btn{position:absolute;top:25px }#recaptcha_reload_btn{right:78px }#recaptcha_switch_audio_btn{right:52px }#recaptcha_whatsthis_btn{right:28px }.recaptcha_input_area{margin-left:-7px!important }button.ajax-form{width:300px;cursor:pointer;height:37px;padding:0!important }#recaptcha_privacy{position:absolute!important;top:105px!important;display:block;margin:auto;width:300px;text-align:center }#recaptcha_privacy a{color:#1e7d9d!important }.what-is-firewall{width:100%;padding:35px;background-color:#f7f7f7;-moz-box-sizing:content-box;-webkit-box-sizing:content-box;box-sizing:content-box;margin-left:-35px;margin-bottom:-35px;border-radius:0 0 15px 15px }.access-denied .center{display:table;margin-left:auto;margin-right:auto }.width-max-940{max-width:940px }.access-denied{max-width:none;text-align:left }.access-denied h1{font-size:25px }.access-denied .font-size-xtra{font-size:36px }.access-denied table{margin:25px 0 35px;border-spacing:0;box-shadow:0 1px 0 0 #dfdfdf;border:1px solid #b8b8b8;border-radius:8px;width:100%;background-color:#fff }.access-denied table:first-child{margin-top:0 }.access-denied table:last-child{margin-bottom:0 }.access-denied th{background-color:#ededed;text-align:left;white-space:nowrap }.access-denied th:first-child{border-radius:8px 0 0 }.access-denied th:last-child{border-radius:0 8px 0 0 }.access-denied td{border-top:1px #e2e2e2 solid;vertical-align:top;word-break:break-word }.access-denied td,.access-denied th{padding:12px }.access-denied td:first-child{padding-right:0 }.access-denied tbody tr:first-child td{border-color:#c9c9c9;border-top:0 }.access-denied tbody tr:last-child td:first-child{border-bottom-left-radius:8px }.access-denied tbody tr:last-child td:last-child{border-bottom-right-radius:8px }.access-denied tbody tr:nth-child(2n){background-color:#fafafa }table.property-list td:first-child,table.property-table td:first-child{font-weight:700;width:1%;white-space:nowrap }.overflow-break-all{-ms-word-break:break-all;word-break:break-all }</style><section class="center clearfix"><meta name="viewport" content="width=device-width, initial-scale=1.0" /><title>xWAF - Access Denied</title><link href="//fonts.googleapis.com/css?family=Open+Sans:400,300,600,700" rel="stylesheet" type="text/css"></head><body><div id="main-container"><header class="app-header clearfix"><div class="wrap"><span class="logo-neartext">Web Application Firewall</span><a target="_blnak" href="https://github.com/Alemalakra/xWAF/" class="site-link">Github</a></div></header><section class="app-content access-denied clearfix"><div class="box center width-max-940"><h1 class="brand-font font-size-xtra no-margin"><i class="icon-circle-red"></i>Access Denied - xWAF</h1><p class="medium-text code-snippet">If you think this block is an error please <a href="mailto:alem@riseup.net">contact firewall developer</a> and make sure to include the block details (displayed in the box below), so we can assist you in troubleshooting the issue. </p><h2>Block details:</h1><table class="property-table overflow-break-all line-height-16"><tr><td>Your IP:</td><td><span>'. $_SERVER[$this->IPHeader] .'</span></td></tr><tr><td>URL:</td><td><span>'. htmlspecialchars($_SERVER['SERVER_NAME'].$_SERVER['REQUEST_URI'], ENT_QUOTES, 'UTF-8') .'</tr><tr><td>Your Browser: </td><td><span>'.htmlspecialchars($_SERVER['HTTP_USER_AGENT'], ENT_QUOTES, 'UTF-8') . '<tr><td>Block ID:</td><td><span>'.$this->shorten_string(md5($TypeVuln.$Method.$DisplayName.$_SERVER[$this->IPHeader].date('DmY')), 7).'</span></td></tr><tr><td>Block reason:</td><td><span>An attempted ' . htmlentities($TypeVuln) . ' was detected and blocked.</span></td></tr><tr><td>Time:</td><td><span>' . date('Y-m-d H:i:s').'</tr></table></div></section><footer><span>&copy; 2018 xWAF - Free Open-Source Web Application Firewall.</span><span id="privacy-policy"><a href="https://github.com/Alemalakra/xWAF/" target="_blank" rel="nofollow noopener">Github</a></span>';
		die(); // Block request.
	}
	function getArray($Type) {
		switch ($Type) {
			case 'SQL':
				return array(
							"'",
							'´',
							'SELECT FROM',
							'SELECT * FROM',
							'ONION',
							'union',
							'UNION',
							'UDPATE users SET',
							'WHERE username',
							'DROP TABLE',
							'0x50',
							'mid((select',
							'union(((((((',
							'concat(0x',
							'concat(',
							'OR boolean',
							'or HAVING',
							"OR '1", # Famous skid Poc. 
							'0x3c62723e3c62723e3c62723e',
							'0x3c696d67207372633d22',
							'+#1q%0AuNiOn all#qa%0A#%0AsEleCt',
							'unhex(hex(Concat(',
							'Table_schema,0x3e,',
							'0x00', // \0  [This is a zero, not the letter O]
							'0x08', // \b
							'0x09', // \t
							'0x0a', // \n
							'0x0d', // \r
							'0x1a', // \Z
							'0x22', // \"
							'0x25', // \%
							'0x27', // \'
							'0x5c', // \\
							'0x5f'  // \_
							);
				break;
			case 'XSS':
				return array('<img',
						'img>',
						'<image',
						'document.cookie',
						'onerror()',
						'script>',
						'<script',
						'alert(',
						'window.',
						'String.fromCharCode(',
						'javascript:',
						'onmouseover="',
						'<BODY onload',
						'<style',
						'svg onload');
				break;
			
			default:
				return false;
				break;
		}
	}
	function arrayFlatten(array $array) {
	    $flatten = array();
	    array_walk_recursive($array, function($value) use(&$flatten) {
	        $flatten[] = $value;
	    });
	    return $flatten;
	}
	function sqlCheck($Value, $Method, $DisplayName) {
		// For false alerts.
		$Replace = array("can't" => "cant",
						"don't" => "dont");
		foreach ($Replace as $key => $value_rep) {
			$Value = str_replace($key, $value_rep, $Value);
		}
		$BadWords = $this->getArray('SQL');
		foreach ($BadWords as $BadWord) {
			if (strpos(strtolower($Value), strtolower($BadWord)) !== false) {
				// String contains some Vuln.
				$this->vulnDetectedHTML($Method, $BadWord, $Value, 'SQL Injection');
			}
		}
	}
	function xssCheck($Value, $Method, $DisplayName) {
		// For false alerts.
		$Replace = array("<3" => ":heart:");
		foreach ($Replace as $key => $value_rep) {
			$Value = str_replace($key, $value_rep, $Value);
		}
		$BadWords = $this->getArray('XSS');

		foreach ($BadWords as $BadWord) {
			if (strpos(strtolower($Value), strtolower($BadWord)) !== false) {
			    // String contains some Vuln.

				$this->vulnDetectedHTML($Method, $BadWord, $DisplayName, 'XSS (Cross-Site-Crossing)');
			}
		}
	}
	function is_html($string) {
		return $string != strip_tags($string) ? true:false;

	}
	function santizeString($String) {
		$String = escapeshellarg($String);
		$String = htmlentities($String);
		$XSS = $this->getArray('XSS');
		foreach ($XSS as $replace) {
			$String = str_replace($replace, '', $String);
		}
		$SQL = $this->getArray('SQL');
		foreach ($SQL as $replace) {
			$String = str_replace($replace, '', $String);
		}
		return $String;
	}
	function htmlCheck($value, $Method, $DisplayName) {
		if ($this->is_html(strtolower($value)) !== false) {
			// HTML Detected!
			$this->vulnDetectedHTML($Method, "HTML CHARS", $DisplayName, 'XSS (HTML)');
		}
	}
	function arrayValues($Array) {
		return array_values($Array);
	}
	function checkGET() {
		foreach ($_GET as $key => $value) {
			if (is_array($value)) {
				$flattened = $this->arrayFlatten($value);
				foreach ($flattened as $sub_key => $sub_value) {
					$this->sqlCheck($sub_value, "_GET", $sub_key);
					$this->xssCheck($sub_value, "_GET", $sub_key);
					$this->htmlCheck($sub_value, "_GET", $sub_key);
				}
			} else {
				$this->sqlCheck($value, "_GET", $key);
				$this->xssCheck($value, "_GET", $key);
				$this->htmlCheck($value, "_GET", $key);
			}
		}
	}
	function checkPOST() {
		foreach ($_POST as $key => $value) {
			if (is_array($value)) {
				$flattened = $this->arrayFlatten($value);
				foreach ($flattened as $sub_key => $sub_value) {
					$this->sqlCheck($sub_value, "_POST", $sub_key);
					$this->xssCheck($sub_value, "_POST", $sub_key);
					$this->htmlCheck($sub_value, "_POST", $sub_key);
				}
			} else {
				$this->sqlCheck($value, "_POST", $key);
				$this->xssCheck($value, "_POST", $key);
				$this->htmlCheck($value, "_POST", $key);
			}
		}
	}
	function checkCOOKIE() {
		foreach ($_COOKIE as $key => $value) {
			if (is_array($value)) {
				$flattened = $this->arrayFlatten($value);
				foreach ($flattened as $sub_key => $sub_value) {
					$this->sqlCheck($sub_value, "_COOKIE", $sub_key);
					$this->xssCheck($sub_value, "_COOKIE", $sub_key);
					$this->htmlCheck($sub_value, "_COOKIE", $sub_key);
				}
			} else {
				$this->sqlCheck($value, "_COOKIE", $key);
				$this->xssCheck($value, "_COOKIE", $key);
				$this->htmlCheck($value, "_COOKIE", $key);
			}
		}
	}
	function gua() {
		if (isset($_SERVER['HTTP_USER_AGENT'])) {
			return $_SERVER['HTTP_USER_AGENT'];
		}
		return md5(rand());
	}
	function cutGua($string) {
		$five = substr($string, 0, 4);
		$last = substr($string, -3);
		return md5($five.$last);
	}
	function getCSRF() {
		if (isset($_SESSION['token'])) {
			$token_age = time() - $_SESSION['token_time'];
			if ($token_age <= 300){    /* Less than five minutes has passed. */
				return $_SESSION['token'];
			} else {
				$token = md5(uniqid(rand(), TRUE));
				$_SESSION['token'] = $token . "asd648" . $this->cutGua($this->gua());
				$_SESSION['token_time'] = time();
				return $_SESSION['token'];
			}
		} else {
			$token = md5(uniqid(rand(), TRUE));
			$_SESSION['token'] = $token . "asd648" . $this->cutGua($this->gua());
			$_SESSION['token_time'] = time();
			return $_SESSION['token'];
		}
	}
	function verifyCSRF($Value) {
		if (isset($_SESSION['token'])) {
			$token_age = time() - $_SESSION['token_time'];
			if ($token_age <= 300){    /* Less than five minutes has passed. */
				if ($Value == $_SESSION['token']) {
					$Explode = explode('asd648', $_SESSION['token']);
					$gua = $Explode[1];
					if ($this->cutGua($this->gua()) == $gua) {
						// Validated, Done!
						unset($_SESSION['token']);
						unset($_SESSION['token_time']);
						return true;
					}
					unset($_SESSION['token']);
					unset($_SESSION['token_time']);
					return false;
				}
			} else {
				return false;
			}
		} else {
			return false;
		}
	}
	function useCloudflare() {
		$this->IPHeader = "HTTP_CF_CONNECTING_IP";
	}
	function useBlazingfast() {
		$this->IPHeader = "X-Real-IP";
	}
	function customIPHeader($String = 'REMOTE_ADDR') {
		$this->IPHeader = $String;
	}
	function antiCookieSteal($listparams = 'username') {
		$this->CookieCheck = true;
		$this->CookieCheckParam = $listparams;
	}
	function cookieCheck() {
		// Check Anti-Cookie steal trick.
		if ($this->CookieCheck == true) {
			// Check then.
			if (isset($_SESSION)) { // Session set.
				if (isset($_SESSION[$this->CookieCheckParam])) { // Logged.
					if (!(isset($_SESSION['xWAF-IP']))) {
						$_SESSION['xWAF-IP'] = $_SERVER[$this->IPHeader];
						return true;
					} else {
						if (!($_SESSION['xWAF-IP'] == $_SERVER[$this->IPHeader])) {
							// Changed IP.
							unset($_SESSION['xWAF-IP']);
							unset($_SESSION);
							@session_destroy();
							@session_start();
							return true;
						}
					}
				}
			}
		}
	}
	function start() {
		@session_start();
		@$this->checkGET();
		@$this->checkPOST();
		@$this->checkCOOKIE();
		if ($this->CookieCheck == true) {
			$this->cookieCheck();
		}
	}

}
?>
