<?php

class ToolsCore {

    protected static $file_exists_cache = array();
    protected static $_forceCompile;
    protected static $_caching;

    /**
     * Random password generator
     *
     * @param integer $length Desired length (optional)
     * @return string Password
     */
    public static function passwdGen($length = 8) {
        $str = 'abcdefghijkmnopqrstuvwxyz0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ';
        for ($i = 0, $passwd = ''; $i < $length; $i++)
            $passwd .= self::substr($str, mt_rand(0, self::strlen($str) - 1), 1);
        return $passwd;
    }

    /**
     * Redirect user to another page
     *
     * @param string $url Desired URL
     * @param string $baseUri Base URI (optional)
     */
    public static function redirect($url, $baseUri = __PS_BASE_URI__) {
        if (strpos($url, 'http://') === FALSE && strpos($url, 'https://') === FALSE) {
            global $link;
            if (strpos($url, $baseUri) !== FALSE && strpos($url, $baseUri) == 0)
                $url = substr($url, strlen($baseUri));
            $explode = explode('?', $url, 2);
            $url = $link->getPageLink($explode[0], true);
            if (isset($explode[1]))
                $url .= '?' . $explode[1];
            $baseUri = '';
        }

        if (isset($_SERVER['HTTP_REFERER']) AND ($url == $_SERVER['HTTP_REFERER']))
            header('Location: ' . $_SERVER['HTTP_REFERER']);
        else
            header('Location: ' . $baseUri . $url);
        exit;
    }

    /**
     * Redirect url wich allready PS_BASE_URI
     *
     * @param string $url Desired URL
     */
    public static function redirectLink($url) {
        if (!preg_match('@^https?://@i', $url)) {
            global $link;
            if (strpos($url, __PS_BASE_URI__) !== FALSE && strpos($url, __PS_BASE_URI__) == 0)
                $url = substr($url, strlen(__PS_BASE_URI__));
            $explode = explode('?', $url, 2);
            $url = $link->getPageLink($explode[0]);
            if (isset($explode[1]))
                $url .= '?' . $explode[1];
        }

        header('Location: ' . $url);
        exit;
    }

    /**
     * Redirect user to another admin page
     *
     * @param string $url Desired URL
     */
    public static function redirectAdmin($url) {
        header('Location: ' . $url);
        exit;
    }

    /**
     * getProtocol return the set protocol according to configuration (http[s])
     * @param Boolean true if require ssl
     * @return String (http|https)
     */
    public static function getProtocol($use_ssl = null) {
        return (!is_null($use_ssl) && $use_ssl ? 'https://' : 'http://');
    }

    /**
     * getHttpHost return the <b>current</b> host used, with the protocol (http or https) if $http is true
     * This function should not be used to choose http or https domain name.
     * Use Tools::getShopDomain() or Tools::getShopDomainSsl instead
     *
     * @param boolean $http
     * @param boolean $entities
     * @return void
     */
    public static function getHttpHost($http = false, $entities = false) {
        if (isset($_SERVER['HTTP_X_FORWARDED_HOST']) || isset($_SERVER['HTTP_HOST']))
            $host = (isset($_SERVER['HTTP_X_FORWARDED_HOST']) ? $_SERVER['HTTP_X_FORWARDED_HOST'] : $_SERVER['HTTP_HOST']);
        else
            $host = DEFAULT_HTTP_HOST;

        if ($entities)
            $host = htmlspecialchars($host, ENT_COMPAT, 'UTF-8');
        if ($http)
            $host = (Configuration::get('PS_SSL_ENABLED') ? 'https://' : 'http://') . $host;
        return $host;
    }

    /**
     * getShopDomain return domain name according to configuration
     *
     * @param boolean $http if true, return domain name with protocol
     * @param boolean $entities if true,
     * @return void
     */
    public static function getShopDomain($http = false, $entities = false) {
        if (!($domain = Configuration::get('PS_SHOP_DOMAIN')))
            $domain = self::getHttpHost();
        if ($entities)
            $domain = htmlspecialchars($domain, ENT_COMPAT, 'UTF-8');
        if ($http)
            $domain = 'http://' . $domain;
        return $domain;
    }

    public static function getShopDomainSsl($http = false, $entities = false) {
        if (!($domain = Configuration::get('PS_SHOP_DOMAIN_SSL')))
            $domain = self::getHttpHost();
        if ($entities)
            $domain = htmlspecialchars($domain, ENT_COMPAT, 'UTF-8');
        if ($http)
            $domain = (Configuration::get('PS_SSL_ENABLED') ? 'https://' : 'http://') . $domain;
        return $domain;
    }

    /**
     * Get the server variable SERVER_NAME
     *
     * @param string $referrer URL referrer
     */
    static function getServerName() {
        if (isset($_SERVER['HTTP_X_FORWARDED_SERVER']) AND $_SERVER['HTTP_X_FORWARDED_SERVER'])
            return $_SERVER['HTTP_X_FORWARDED_SERVER'];
        return $_SERVER['SERVER_NAME'];
    }

    /**
     * Get the server variable REMOTE_ADDR, or the first ip of HTTP_X_FORWARDED_FOR (when using proxy)
     *
     * @return string $remote_addr ip of client
     */
    static function getRemoteAddr() {
        // This condition is necessary when using CDN, don't remove it.
        if (isset($_SERVER['HTTP_X_FORWARDED_FOR']) AND $_SERVER['HTTP_X_FORWARDED_FOR'] AND (!isset($_SERVER['REMOTE_ADDR']) OR preg_match('/^127\..*/i', trim($_SERVER['REMOTE_ADDR'])) OR preg_match('/^172\.16.*/i', trim($_SERVER['REMOTE_ADDR'])) OR preg_match('/^192\.168\.*/i', trim($_SERVER['REMOTE_ADDR'])) OR preg_match('/^10\..*/i', trim($_SERVER['REMOTE_ADDR'])))) {
            if (strpos($_SERVER['HTTP_X_FORWARDED_FOR'], ',')) {
                $ips = explode(',', $_SERVER['HTTP_X_FORWARDED_FOR']);
                return $ips[0];
            }
            else
                return $_SERVER['HTTP_X_FORWARDED_FOR'];
        }
        return $_SERVER['REMOTE_ADDR'];
    }

    /**
     * Check if the current page use SSL connection on not
     */
    public static function usingSecureMode() {
        return !(empty($_SERVER['HTTPS']) OR strtolower($_SERVER['HTTPS']) == 'off');
    }

    /**
     * Get the current url prefix protocole (https/http)
     */
    public static function getCurrentUrlProtocolPrefix() {
        if (Tools::usingSecureMode())
            return 'https://';
        else
            return 'http://';
    }

    /**
     * Secure an URL referrer
     *
     * @param string $referrer URL referrer
     */
    public static function secureReferrer($referrer) {
        if (preg_match('/^http[s]?:\/\/' . self::getServerName() . '(:' . _PS_SSL_PORT_ . ')?\/.*$/Ui', $referrer))
            return $referrer;
        return __PS_BASE_URI__;
    }

    /**
     * Get a value from $_POST / $_GET
     * if unavailable, take a default value
     *
     * @param string $key Value key
     * @param mixed $defaultValue (optional)
     * @return mixed Value
     */
    public static function getValue($key, $defaultValue = false) {
        if (!isset($key) OR empty($key) OR !is_string($key))
            return false;
        $ret = (isset($_POST[$key]) ? $_POST[$key] : (isset($_GET[$key]) ? $_GET[$key] : $defaultValue));

        if (is_string($ret) === true)
            $ret = urldecode(preg_replace('/((\%5C0+)|(\%00+))/i', '', urlencode($ret)));
        return !is_string($ret) ? $ret : stripslashes($ret);
    }

    public static function getIsset($key) {
        if (!isset($key) OR empty($key) OR !is_string($key))
            return false;
        return isset($_POST[$key]) ? true : (isset($_GET[$key]) ? true : false);
    }

    /**
     * Change language in cookie while clicking on a flag
     */
    public static function setCookieLanguage() {
        global $cookie;

        /* If language does not exist or is disabled, erase it */
        if ($cookie->id_lang) {
            $lang = new Language((int) $cookie->id_lang);
            if (!Validate::isLoadedObject($lang) OR !$lang->active)
                $cookie->id_lang = NULL;
        }

        /* Automatically detect language if not already defined */
        if (!$cookie->id_lang AND isset($_SERVER['HTTP_ACCEPT_LANGUAGE'])) {
            $array = explode(',', self::strtolower($_SERVER['HTTP_ACCEPT_LANGUAGE']));
            if (self::strlen($array[0]) > 2) {
                $tab = explode('-', $array[0]);
                $string = $tab[0];
            }
            else
                $string = $array[0];
            if (Validate::isLanguageIsoCode($string)) {
                $lang = new Language((int) (Language::getIdByIso($string)));
                if (Validate::isLoadedObject($lang) AND $lang->active)
                    $cookie->id_lang = (int) ($lang->id);
            }
        }

        /* If language file not present, you must use default language file */
        if (!$cookie->id_lang OR !Validate::isUnsignedId($cookie->id_lang))
            $cookie->id_lang = (int) (Configuration::get('PS_LANG_DEFAULT'));

        $iso = Language::getIsoById((int) $cookie->id_lang);
        @include_once(_PS_THEME_DIR_ . 'lang/' . $iso . '.php');

        return $iso;
    }

    public static function switchLanguage() {
        global $cookie;

        if ($id_lang = (int) (self::getValue('id_lang')) AND Validate::isUnsignedId($id_lang))
            $cookie->id_lang = $id_lang;
    }

    public static function setCurrency() {
	global $cookie;
	if (self::isSubmit('SubmitCurrency'))
		if (isset($_POST['id_currency']) AND is_numeric($_POST['id_currency'])) {
			$currency = Currency::getCurrencyInstance((int)($_POST['id_currency']));
			if (is_object($currency) AND $currency->id AND !$currency->deleted) 
				$cookie->id_currency = (int)($currency->id);
		}
	if ((int)$cookie->id_currency) {
		$currency = Currency::getCurrencyInstance((int)$cookie->id_currency);
		if (is_object($currency) AND (int)$currency->id AND (int)$currency->deleted != 1 AND $currency->active)
			return $currency;
	} else if ((int)$cookie->id_country && $cookie->id_country == 110) {
		$currency = Currency::getCurrencyInstance(4);
		if (is_object($currency) AND (int)$currency->id AND (int)$currency->deleted != 1 AND $currency->active) {
			$cookie->id_currency = (int)($currency->id);
			return $currency;
		}
	}
         
        $currency = Currency::getCurrencyInstance((int) (Configuration::get('PS_CURRENCY_DEFAULT')));
        if (is_object($currency) AND $currency->id)
            $cookie->id_currency = (int) ($currency->id);
        return $currency;
    }

    /**
     * Return price with currency sign for a given product
     *
     * @param float $price Product price
     * @param object $currency Current currency (object, id_currency, NULL => getCurrent())
     * @return string Price correctly formated (sign, decimal separator...)
     */
    public static function displayPrice($price, $currency = NULL, $no_utf8 = false) {
        if ($currency === NULL)
            $currency = Currency::getCurrent();
        /* if you modified this function, don't forget to modify the Javascript function formatCurrency (in tools.js) */
        if (is_int($currency))
            $currency = Currency::getCurrencyInstance((int) ($currency));
        $c_char = (is_array($currency) ? $currency['sign'] : $currency->sign);
        $c_format = (is_array($currency) ? $currency['format'] : $currency->format);
        $c_decimals = (is_array($currency) ? (int) ($currency['decimals']) : (int) ($currency->decimals)) * _PS_PRICE_DISPLAY_PRECISION_;
        $c_blank = (is_array($currency) ? $currency['blank'] : $currency->blank);
        $blank = ($c_blank ? ' ' : '');
        $ret = 0;
        if (($isNegative = ($price < 0)))
            $price *= -1;
        $price = self::ps_round($price, $c_decimals);
        switch ($c_format) {
            /* X 0,000.00 */
            case 1:
                $ret = $c_char . $blank . number_format($price, $c_decimals, '.', ',');
                break;
            /* 0 000,00 X */
            case 2:
                $ret = number_format($price, $c_decimals, ',', ' ') . $blank . $c_char;
                break;
            /* X 0.000,00 */
            case 3:
                $ret = $c_char . $blank . number_format($price, $c_decimals, ',', '.');
                break;
            /* 0,000.00 X */
            case 4:
                $ret = number_format($price, $c_decimals, '.', ',') . $blank . $c_char;
                break;
        }
        if ($isNegative)
            $ret = '-' . $ret;
        if ($no_utf8)
            return str_replace('€', chr(128), $ret);
        return $ret;
    }

    public static function displayPriceSmarty($params, &$smarty) {
        if (array_key_exists('currency', $params)) {
            $currency = Currency::getCurrencyInstance((int) ($params['currency']));
            if (Validate::isLoadedObject($currency))
                return self::displayPrice($params['price'], $currency, false);
        }
        return self::displayPrice($params['price']);
    }

    /**
     * Return price converted
     *
     * @param float $price Product price
     * @param object $currency Current currency object
     * @param boolean $to_currency convert to currency or from currency to default currency
     */
    public static function convertPrice($price, $currency = NULL, $to_currency = true) {
        if ($currency === NULL)
            $currency = Currency::getCurrent();
        elseif (is_numeric($currency))
            $currency = Currency::getCurrencyInstance($currency);

        $c_id = (is_array($currency) ? $currency['id_currency'] : $currency->id);
        $c_rate = (is_array($currency) ? $currency['conversion_rate'] : $currency->conversion_rate);

        if ($c_id != (int) (Configuration::get('PS_CURRENCY_DEFAULT'))) {
            if ($to_currency)
                $price *= $c_rate;
            else
                $price /= $c_rate;
        }

        return $price;
    }

    /**
     * Display date regarding to language preferences
     *
     * @param array $params Date, format...
     * @param object $smarty Smarty object for language preferences
     * @return string Date
     */
    public static function dateFormat($params, &$smarty) {
        return self::displayDate($params['date'], $smarty->ps_language->id, (isset($params['full']) ? $params['full'] : false));
    }

    /**
     * Display date regarding to language preferences
     *
     * @param string $date Date to display format UNIX
     * @param integer $id_lang Language id
     * @param boolean $full With time or not (optional)
     * @return string Date
     */
    public static function displayDate($date, $id_lang, $full = false, $separator = '-') {
        if (!$date OR !strtotime($date))
            return $date;
        if (!Validate::isDate($date) OR !Validate::isBool($full))
            die(self::displayError('Invalid date'));
        $tmpTab = explode($separator, substr($date, 0, 10));
        $hour = ' ' . substr($date, -8);

        /* $language = Language::getLanguage((int)($id_lang));
          if ($language AND strtolower($language['iso_code']) == 'fr')
          return ($tmpTab[2].'-'.$tmpTab[1].'-'.$tmpTab[0].($full ? $hour : ''));
          else
          return ($tmpTab[0].'-'.$tmpTab[1].'-'.$tmpTab[2].($full ? $hour : ''));
         */
        //dafault to DD-MM-YYYY
        return ($tmpTab[2] . '-' . $tmpTab[1] . '-' . $tmpTab[0] . ($full ? $hour : ''));
    }

    /**
     * Sanitize a string
     *
     * @param string $string String to sanitize
     * @param boolean $full String contains HTML or not (optional)
     * @return string Sanitized string
     */
    public static function safeOutput($string, $html = false) {
        if (!$html)
            $string = @htmlentities(strip_tags($string), ENT_QUOTES, 'utf-8');
        return $string;
    }

    public static function htmlentitiesUTF8($string, $type = ENT_QUOTES) {
        if (is_array($string))
            return array_map(array('Tools', 'htmlentitiesUTF8'), $string);
        return htmlentities($string, $type, 'utf-8');
    }

    public static function htmlentitiesDecodeUTF8($string) {
        if (is_array($string))
            return array_map(array('Tools', 'htmlentitiesDecodeUTF8'), $string);
        return html_entity_decode($string, ENT_QUOTES, 'utf-8');
    }

    public static function safePostVars() {
        $_POST = array_map(array('Tools', 'htmlentitiesUTF8'), $_POST);
    }

    /**
     * Delete directory and subdirectories
     *
     * @param string $dirname Directory name
     */
    public static function deleteDirectory($dirname, $delete_self = true) {
        $dirname = rtrim($dirname, '/') . '/';
        $files = scandir($dirname);
        foreach ($files as $file)
            if ($file != '.' AND $file != '..') {
                if (is_dir($dirname . $file))
                    self::deleteDirectory($dirname . $file, true);
                elseif (file_exists($dirname . $file))
                    unlink($dirname . $file);
                else
                    p('Unable to delete ' . $dirname . $file);
            }
        if ($delete_self)
            rmdir($dirname);
    }

    /**
     * Display an error according to an error code
     *
     * @param integer $code Error code
     */
    public static function displayError($string = 'Fatal error', $htmlentities = true) {
        global $_ERRORS, $cookie;

        $iso = strtolower(Language::getIsoById((is_object($cookie) AND $cookie->id_lang) ? (int) $cookie->id_lang : (int) Configuration::get('PS_LANG_DEFAULT')));
        @include_once(_PS_TRANSLATIONS_DIR_ . $iso . '/errors.php');

        if (defined('_PS_MODE_DEV_') AND _PS_MODE_DEV_ AND $string == 'Fatal error')
            return ('<pre>' . print_r(debug_backtrace(), true) . '</pre>');
        if (!is_array($_ERRORS))
            return str_replace('"', '&quot;', $string);
        $key = md5(str_replace('\'', '\\\'', $string));
        $str = (isset($_ERRORS) AND is_array($_ERRORS) AND key_exists($key, $_ERRORS)) ? ($htmlentities ? htmlentities($_ERRORS[$key], ENT_COMPAT, 'UTF-8') : $_ERRORS[$key]) : $string;
        return str_replace('"', '&quot;', stripslashes($str));
    }

    /**
     * Display an error with detailed object
     *
     * @param mixed $object
     * @param boolean $kill
     * @return $object if $kill = false;
     */
    public static function dieObject($object, $kill = true) {
        echo '<pre style="text-align: left;">';
        print_r($object);
        echo '</pre><br />';
        if ($kill)
            die('END');
        return $object;
    }

    /**
     * ALIAS OF dieObject() - Display an error with detailed object
     *
     * @param object $object Object to display
     */
    public static function d($object, $kill = true) {
        return (self::dieObject($object, $kill = true));
    }

    /**
     * ALIAS OF dieObject() - Display an error with detailed object but don't stop the execution
     *
     * @param object $object Object to display
     */
    public static function p($object) {
        return (self::dieObject($object, false));
    }

    /**
     * Check if submit has been posted
     *
     * @param string $submit submit name
     */
    public static function isSubmit($submit) {
        return (
                isset($_POST[$submit]) OR isset($_POST[$submit . '_x']) OR isset($_POST[$submit . '_y']) OR isset($_GET[$submit]) OR isset($_GET[$submit . '_x']) OR isset($_GET[$submit . '_y'])
                );
    }

    /**
     * Get meta tages for a given page
     *
     * @param integer $id_lang Language id
     * @return array Meta tags
     */
    public static function getMetaTags($id_lang, $page_name) {
        global $maintenance;

        if (!(isset($maintenance) AND (!in_array(Tools::getRemoteAddr(), explode(',', Configuration::get('PS_MAINTENANCE_IP')))))) {
            /* Products specifics meta tags */
            if ($id_product = self::getValue('id_product')) {
                $row = Db::getInstance(_PS_USE_SQL_SLAVE_)->getRow('
				SELECT `name`, `meta_title`, `meta_description`, `meta_keywords`, `description_short`
				FROM `' . _DB_PREFIX_ . 'product` p
				LEFT JOIN `' . _DB_PREFIX_ . 'product_lang` pl ON (pl.`id_product` = p.`id_product`)
				WHERE pl.id_lang = ' . (int) ($id_lang) . ' AND pl.id_product = ' . (int) ($id_product) . ' AND p.active = 1');
                if ($row) {
                    if (empty($row['meta_description']))
                        $row['meta_description'] = strip_tags($row['description_short']);
                    return self::completeMetaTags($row, $row['name']);
                }
            }

            /* Categories specifics meta tags */
            elseif ($id_category = self::getValue('id_category')) {
                $row = Db::getInstance(_PS_USE_SQL_SLAVE_)->getRow('
				SELECT `name`, `meta_title`, `meta_description`, `meta_keywords`, `description`
				FROM `' . _DB_PREFIX_ . 'category_lang`
				WHERE id_lang = ' . (int) ($id_lang) . ' AND id_category = ' . (int) ($id_category));
                if ($row) {
                    if (empty($row['meta_description']))
                        $row['meta_description'] = strip_tags($row['description']);
                    return self::completeMetaTags($row, $row['name']);
                }
            }

            /* Manufacturers specifics meta tags */
            elseif ($id_manufacturer = self::getValue('id_manufacturer')) {
                $row = Db::getInstance(_PS_USE_SQL_SLAVE_)->getRow('
				SELECT `name`, `meta_title`, `meta_description`, `meta_keywords`
				FROM `' . _DB_PREFIX_ . 'manufacturer_lang` ml
				LEFT JOIN `' . _DB_PREFIX_ . 'manufacturer` m ON (ml.`id_manufacturer` = m.`id_manufacturer`)
				WHERE ml.id_lang = ' . (int) ($id_lang) . ' AND ml.id_manufacturer = ' . (int) ($id_manufacturer));
                if ($row) {
                    if (empty($row['meta_description']))
                        $row['meta_description'] = strip_tags($row['meta_description']);
                    if (!empty($row['meta_title']))
                        $row['meta_title'] = $row['meta_title'] . ' - ' . Configuration::get('PS_SHOP_NAME');
                    return self::completeMetaTags($row, $row['name']);
                }
            }

            /* Suppliers specifics meta tags */
            elseif ($id_supplier = self::getValue('id_supplier')) {
                $row = Db::getInstance(_PS_USE_SQL_SLAVE_)->getRow('
				SELECT `name`, `meta_title`, `meta_description`, `meta_keywords`
				FROM `' . _DB_PREFIX_ . 'supplier_lang` sl
				LEFT JOIN `' . _DB_PREFIX_ . 'supplier` s ON (sl.`id_supplier` = s.`id_supplier`)
				WHERE sl.id_lang = ' . (int) ($id_lang) . ' AND sl.id_supplier = ' . (int) ($id_supplier));

                if ($row) {
                    if (empty($row['meta_description']))
                        $row['meta_description'] = strip_tags($row['meta_description']);
                    if (!empty($row['meta_title']))
                        $row['meta_title'] = $row['meta_title'] . ' - ' . Configuration::get('PS_SHOP_NAME');
                    return self::completeMetaTags($row, $row['name']);
                }
            }

            /* CMS specifics meta tags */
            elseif ($id_cms = self::getValue('id_cms')) {
                $row = Db::getInstance(_PS_USE_SQL_SLAVE_)->getRow('
				SELECT `meta_title`, `meta_description`, `meta_keywords`
				FROM `' . _DB_PREFIX_ . 'cms_lang`
				WHERE id_lang = ' . (int) ($id_lang) . ' AND id_cms = ' . (int) ($id_cms));
                if ($row) {
                    $row['meta_title'] = $row['meta_title'] . ' - ' . Configuration::get('PS_SHOP_NAME');
                    return self::completeMetaTags($row, $row['meta_title']);
                }
            }

            /* CMS category specifics meta tags */ elseif ($id_cms = self::getValue('id_cms_category')) {
                $row = Db::getInstance(_PS_USE_SQL_SLAVE_)->getRow('
				SELECT `meta_title`, `meta_description`, `meta_keywords`
				FROM `' . _DB_PREFIX_ . 'cms_category_lang`
				WHERE id_lang = ' . (int) ($id_lang) . ' AND id_cms_category = ' . (int) ($id_cms));
                if ($row) {
                    $row['meta_title'] = $row['meta_title'] . ' - ' . Configuration::get('PS_SHOP_NAME');
                    return self::completeMetaTags($row, $row['meta_title']);
                }
            }
        }

        /* Default meta tags */
        return self::getHomeMetaTags($id_lang, $page_name);
    }

    /**
     * Get meta tags for a given page
     *
     * @param integer $id_lang Language id
     * @return array Meta tags
     */
    public static function getHomeMetaTags($id_lang, $page_name) {
        global $cookie;

        /* Metas-tags */
        $metas = Meta::getMetaByPage($page_name, $id_lang);
        $ret['meta_title'] = (isset($metas['title']) AND $metas['title']) ? $metas['title'] . ' - ' . Configuration::get('PS_SHOP_NAME') : Configuration::get('PS_SHOP_NAME');
        $ret['meta_description'] = (isset($metas['description']) AND $metas['description']) ? $metas['description'] : '';
        $ret['meta_keywords'] = (isset($metas['keywords']) AND $metas['keywords']) ? $metas['keywords'] : '';
        return $ret;
    }

    public static function completeMetaTags($metaTags, $defaultValue) {
        global $cookie;

        if ($metaTags['meta_title'] == NULL)
            $metaTags['meta_title'] = $defaultValue . ' - ' . Configuration::get('PS_SHOP_NAME');
        if ($metaTags['meta_description'] == NULL)
            $metaTags['meta_description'] = Configuration::get('PS_META_DESCRIPTION', (int) ($cookie->id_lang)) ? Configuration::get('PS_META_DESCRIPTION', (int) ($cookie->id_lang)) : '';
        if ($metaTags['meta_keywords'] == NULL)
            $metaTags['meta_keywords'] = Configuration::get('PS_META_KEYWORDS', (int) ($cookie->id_lang)) ? Configuration::get('PS_META_KEYWORDS', (int) ($cookie->id_lang)) : '';
        return $metaTags;
    }

    /**
     * Encrypt password
     *
     * @param object $object Object to display
     */
    public static function encrypt($passwd) {
        return md5(pSQL(_COOKIE_KEY_ . $passwd));
    }

    /**
     * Get token to prevent CSRF
     *
     * @param string $token token to encrypt
     */
    public static function getToken($page = true) {
        global $cookie;
        if ($page === true)
            return (self::encrypt($cookie->id_customer . $cookie->passwd . $_SERVER['SCRIPT_NAME']));
        else
            return (self::encrypt($cookie->id_customer . $cookie->passwd . $page));
    }

    /**
     * Encrypt password
     *
     * @param object $object Object to display
     */
    public static function getAdminToken($string) {
        return !empty($string) ? self::encrypt($string) : false;
    }

    public static function getAdminTokenLite($tab) {
        global $cookie;
        return Tools::getAdminToken($tab . (int) Tab::getIdFromClassName($tab) . (int) $cookie->id_employee);
    }

    /**
     * Get the user's journey
     *
     * @param integer $id_category Category ID
     * @param string $path Path end
     * @param boolean $linkOntheLastItem Put or not a link on the current category
     * @param string [optionnal] $categoryType defined what type of categories is used (products or cms)
     */
    public static function getPath($id_category, $path = '', $linkOntheLastItem = false, $categoryType = 'products') {
        global $link, $cookie;

        if ($id_category == 1)
            return '<span class="navigation_end">' . $path . '</span>';

        $pipe = Configuration::get('PS_NAVIGATION_PIPE');
        if (empty($pipe))
            $pipe = '>';

        $fullPath = '';

        if ($categoryType === 'products') {
            $category = Db::getInstance()->getRow('
			SELECT id_category, level_depth, nleft, nright
			FROM ' . _DB_PREFIX_ . 'category
			WHERE id_category = ' . (int) $id_category);

            if (isset($category['id_category'])) {
                $categories = Db::getInstance()->ExecuteS('
				SELECT c.id_category, cl.name, cl.link_rewrite
				FROM ' . _DB_PREFIX_ . 'category c
				LEFT JOIN ' . _DB_PREFIX_ . 'category_lang cl ON (cl.id_category = c.id_category)
				WHERE c.nleft <= ' . (int) $category['nleft'] . ' AND c.nright >= ' . (int) $category['nright'] . ' AND cl.id_lang = ' . (int) ($cookie->id_lang) . ' AND c.id_category != 1
				ORDER BY c.level_depth ASC
				LIMIT ' . (int) $category['level_depth']);

                $n = 1;
                $nCategories = (int) sizeof($categories);
                foreach ($categories AS $category) {
                    $fullPath .=
                            (($n < $nCategories OR $linkOntheLastItem) ? '<a href="' . self::safeOutput($link->getCategoryLink((int) $category['id_category'], $category['link_rewrite'])) . '" title="' . htmlentities($category['name'], ENT_NOQUOTES, 'UTF-8') . '">' : '') .
                            htmlentities($category['name'], ENT_NOQUOTES, 'UTF-8') .
                            (($n < $nCategories OR $linkOntheLastItem) ? '</a>' : '') .
                            (($n++ != $nCategories OR !empty($path)) ? '<span class="navigation-pipe">' . $pipe . '</span>' : '');
                }

                return $fullPath . $path;
            }
        } elseif ($categoryType === 'CMS') {
            $category = new CMSCategory((int) ($id_category), (int) ($cookie->id_lang));
            if (!Validate::isLoadedObject($category))
                die(self::displayError());
            $categoryLink = $link->getCMSCategoryLink($category);

            if ($path != $category->name)
                $fullPath .= '<a href="' . self::safeOutput($categoryLink) . '">' . htmlentities($category->name, ENT_NOQUOTES, 'UTF-8') . '</a><span class="navigation-pipe">' . $pipe . '</span>' . $path;
            else
                $fullPath = ($linkOntheLastItem ? '<a href="' . self::safeOutput($categoryLink) . '">' : '') . htmlentities($path, ENT_NOQUOTES, 'UTF-8') . ($linkOntheLastItem ? '</a>' : '');

            return self::getPath((int) ($category->id_parent), $fullPath, $linkOntheLastItem, $categoryType);
        }
    }

    /**
     * @param string [optionnal] $type_cat defined what type of categories is used (products or cms)
     */
    public static function getFullPath($id_category, $end, $type_cat = 'products') {
        global $cookie;

        $pipe = (Configuration::get('PS_NAVIGATION_PIPE') ? Configuration::get('PS_NAVIGATION_PIPE') : '>');

        if ($type_cat === 'products')
            $category = new Category((int) ($id_category), (int) ($cookie->id_lang));
        else if ($type_cat === 'CMS')
            $category = new CMSCategory((int) ($id_category), (int) ($cookie->id_lang));

        if (!Validate::isLoadedObject($category))
            $id_category = 1;
        if ($id_category == 1)
            return htmlentities($end, ENT_NOQUOTES, 'UTF-8');

        return self::getPath($id_category, $category->name, true, $type_cat) . '<span class="navigation-pipe">' . $pipe . '</span> <span class="navigation_product">' . htmlentities($end, ENT_NOQUOTES, 'UTF-8') . '</span>';
    }

    /**
     * @deprecated
     */
    public static function getCategoriesTotal() {
        Tools::displayAsDeprecated();
        $row = Db::getInstance(_PS_USE_SQL_SLAVE_)->getRow('SELECT COUNT(`id_category`) AS total FROM `' . _DB_PREFIX_ . 'category`');
        return (int) ($row['total']);
    }

    /**
     * @deprecated
     */
    public static function getProductsTotal() {
        Tools::displayAsDeprecated();
        $row = Db::getInstance(_PS_USE_SQL_SLAVE_)->getRow('SELECT COUNT(`id_product`) AS total FROM `' . _DB_PREFIX_ . 'product`');
        return (int) ($row['total']);
    }

    /**
     * @deprecated
     */
    public static function getCustomersTotal() {
        Tools::displayAsDeprecated();
        $row = Db::getInstance(_PS_USE_SQL_SLAVE_)->getRow('SELECT COUNT(`id_customer`) AS total FROM `' . _DB_PREFIX_ . 'customer`');
        return (int) ($row['total']);
    }

    /**
     * @deprecated
     */
    public static function getOrdersTotal() {
        Tools::displayAsDeprecated();
        $row = Db::getInstance(_PS_USE_SQL_SLAVE_)->getRow('SELECT COUNT(`id_order`) AS total FROM `' . _DB_PREFIX_ . 'orders`');
        return (int) ($row['total']);
    }

    /*
     * * Historyc translation function kept for compatibility
     * * Removing soon
     */

    public static function historyc_l($key, $translations) {
        global $cookie;
        if (!$translations OR !is_array($translations))
            die(self::displayError());
        $iso = strtoupper(Language::getIsoById($cookie->id_lang));
        $lang = key_exists($iso, $translations) ? $translations[$iso] : false;
        return (($lang AND is_array($lang) AND key_exists($key, $lang)) ? stripslashes($lang[$key]) : $key);
    }

    /**
     * Return the friendly url from the provided string
     *
     * @param string $str
     * @param bool $utf8_decode => needs to be marked as deprecated
     * @return string
     */
    public static function link_rewrite($str, $utf8_decode = false) {
        return self::str2url($str);
    }

    /**
     * Return a friendly url made from the provided string
     * If the mbstring library is available, the output is the same as the js function of the same name
     *
     * @param string $str
     * @return string
     */
    public static function str2url($str) {
        if (function_exists('mb_strtolower'))
            $str = mb_strtolower($str, 'utf-8');

        $str = trim($str);
        $str = preg_replace('/[\x{0105}\x{0104}\x{00E0}\x{00E1}\x{00E2}\x{00E3}\x{00E4}\x{00E5}]/u', 'a', $str);
        $str = preg_replace('/[\x{00E7}\x{010D}\x{0107}\x{0106}]/u', 'c', $str);
        $str = preg_replace('/[\x{010F}]/u', 'd', $str);
        $str = preg_replace('/[\x{00E8}\x{00E9}\x{00EA}\x{00EB}\x{011B}\x{0119}\x{0118}]/u', 'e', $str);
        $str = preg_replace('/[\x{00EC}\x{00ED}\x{00EE}\x{00EF}]/u', 'i', $str);
        $str = preg_replace('/[\x{0142}\x{0141}\x{013E}\x{013A}]/u', 'l', $str);
        $str = preg_replace('/[\x{00F1}\x{0148}]/u', 'n', $str);
        $str = preg_replace('/[\x{00F2}\x{00F3}\x{00F4}\x{00F5}\x{00F6}\x{00F8}\x{00D3}]/u', 'o', $str);
        $str = preg_replace('/[\x{0159}\x{0155}]/u', 'r', $str);
        $str = preg_replace('/[\x{015B}\x{015A}\x{0161}]/u', 's', $str);
        $str = preg_replace('/[\x{00DF}]/u', 'ss', $str);
        $str = preg_replace('/[\x{0165}]/u', 't', $str);
        $str = preg_replace('/[\x{00F9}\x{00FA}\x{00FB}\x{00FC}\x{016F}]/u', 'u', $str);
        $str = preg_replace('/[\x{00FD}\x{00FF}]/u', 'y', $str);
        $str = preg_replace('/[\x{017C}\x{017A}\x{017B}\x{0179}\x{017E}]/u', 'z', $str);
        $str = preg_replace('/[\x{00E6}]/u', 'ae', $str);
        $str = preg_replace('/[\x{0153}]/u', 'oe', $str);

        // Remove all non-whitelist chars.
        $str = preg_replace('/[^a-zA-Z0-9\s\'\:\/\[\]-]/', '', $str);
        $str = preg_replace('/[\s\'\:\/\[\]-]+/', ' ', $str);
        $str = preg_replace('/[ ]/', '-', $str);
        $str = preg_replace('/[\/]/', '-', $str);

        // If it was not possible to lowercase the string with mb_strtolower, we do it after the transformations.
        // This way we lose fewer special chars.
        $str = strtolower($str);

        return $str;
    }

    /**
     * Truncate strings
     *
     * @param string $str
     * @param integer $maxLen Max length
     * @param string $suffix Suffix optional
     * @return string $str truncated
     */
    /* CAUTION : Use it only on module hookEvents.
     * * For other purposes use the smarty function instead */
    public static function truncate($str, $maxLen, $suffix = '...') {
        if (self::strlen($str) <= $maxLen)
            return $str;
        $str = utf8_decode($str);
        return (utf8_encode(substr($str, 0, $maxLen - self::strlen($suffix)) . $suffix));
    }

    /**
     * Generate date form
     *
     * @param integer $year Year to select
     * @param integer $month Month to select
     * @param integer $day Day to select
     * @return array $tab html data with 3 cells :['days'], ['months'], ['years']
     *
     */
    public static function dateYears() {
        for ($i = date('Y') - 10; $i >= 1900; $i--)
            $tab[] = $i;
        return $tab;
    }

    public static function dateDays() {
        for ($i = 1; $i != 32; $i++)
            $tab[] = $i;
        return $tab;
    }

    public static function dateMonths() {
        for ($i = 1; $i != 13; $i++)
            $tab[$i] = date('F', mktime(0, 0, 0, $i, date('m'), date('Y')));
        return $tab;
    }

    public static function hourGenerate($hours, $minutes, $seconds) {
        return implode(':', array($hours, $minutes, $seconds));
    }

    public static function dateFrom($date) {
        $tab = explode(' ', $date);
        if (!isset($tab[1]))
            $date .= ' ' . self::hourGenerate(0, 0, 0);
        return $date;
    }

    public static function dateTo($date) {
        $tab = explode(' ', $date);
        if (!isset($tab[1]))
            $date .= ' ' . self::hourGenerate(23, 59, 59);
        return $date;
    }

    /**
     * @deprecated
     */
    public static function getExactTime() {
        Tools::displayAsDeprecated();
        return time() + microtime();
    }

    static function strtolower($str) {
        if (is_array($str))
            return false;
        if (function_exists('mb_strtolower'))
            return mb_strtolower($str, 'utf-8');
        return strtolower($str);
    }

    static function strlen($str, $encoding = 'UTF-8') {
        if (is_array($str))
            return false;
        $str = html_entity_decode($str, ENT_COMPAT, 'UTF-8');
        if (function_exists('mb_strlen'))
            return mb_strlen($str, $encoding);
        return strlen($str);
    }

    static function stripslashes($string) {
        if (_PS_MAGIC_QUOTES_GPC_)
            $string = stripslashes($string);
        return $string;
    }

    static function strtoupper($str) {
        if (is_array($str))
            return false;
        if (function_exists('mb_strtoupper'))
            return mb_strtoupper($str, 'utf-8');
        return strtoupper($str);
    }

    static function substr($str, $start, $length = false, $encoding = 'utf-8') {
        if (is_array($str))
            return false;
        if (function_exists('mb_substr'))
            return mb_substr($str, (int) ($start), ($length === false ? self::strlen($str) : (int) ($length)), $encoding);
        return substr($str, $start, ($length === false ? self::strlen($str) : (int) ($length)));
    }

    static function ucfirst($str) {
        return self::strtoupper(self::substr($str, 0, 1)) . self::substr($str, 1);
    }

    public static function orderbyPrice(&$array, $orderWay) {
        foreach ($array as &$row)
            $row['price_tmp'] = Product::getPriceStatic($row['id_product'], true, ((isset($row['id_product_attribute']) AND !empty($row['id_product_attribute'])) ? (int) ($row['id_product_attribute']) : NULL), 2);
        if (strtolower($orderWay) == 'desc')
            uasort($array, 'cmpPriceDesc');
        else
            uasort($array, 'cmpPriceAsc');
        foreach ($array as &$row)
            unset($row['price_tmp']);
    }

    public static function iconv($from, $to, $string) {
        if (function_exists('iconv'))
            return iconv($from, $to . '//TRANSLIT', str_replace('¥', '&yen;', str_replace('£', '&pound;', str_replace('€', '&euro;', $string))));
        return html_entity_decode(htmlentities($string, ENT_NOQUOTES, $from), ENT_NOQUOTES, $to);
    }

    public static function isEmpty($field) {
        return ($field === '' OR $field === NULL);
    }

    /**
     * @deprecated
     * */
    public static function getTimezones($select = false) {
        Tools::displayAsDeprecated();

        static $_cache = 0;

        // One select
        if ($select) {
            // No cache
            if (!$_cache) {
                $tmz = Db::getInstance(_PS_USE_SQL_SLAVE_)->getRow('SELECT `name` FROM ' . _DB_PREFIX_ . 'timezone WHERE id_timezone = ' . (int) ($select));
                $_cache = $tmz['name'];
            }
            return $_cache;
        }

        // Multiple select
        $tmz = Db::getInstance(_PS_USE_SQL_SLAVE_)->s('SELECT * FROM ' . _DB_PREFIX_ . 'timezone');
        $tab = array();
        foreach ($tmz as $timezone)
            $tab[$timezone['id_timezone']] = str_replace('_', ' ', $timezone['name']);
        return $tab;
    }

    /**
     * @deprecated
     * */
    public static function ps_set_magic_quotes_runtime($var) {
        Tools::displayAsDeprecated();

        if (function_exists('set_magic_quotes_runtime'))
            set_magic_quotes_runtime($var);
    }

    public static function ps_round($value, $precision = 0) {
        $method = (int) (Configuration::get('PS_PRICE_ROUND_MODE'));
        if ($method == PS_ROUND_UP)
            return Tools::ceilf($value, $precision);
        elseif ($method == PS_ROUND_DOWN)
            return Tools::floorf($value, $precision);
        return round($value, $precision);
    }

    public static function ceilf($value, $precision = 0) {
        $precisionFactor = $precision == 0 ? 1 : pow(10, $precision);
        $tmp = $value * $precisionFactor;
        $tmp2 = (string) $tmp;
        // If the current value has already the desired precision
        if (strpos($tmp2, '.') === false)
            return ($value);
        if ($tmp2[strlen($tmp2) - 1] == 0)
            return $value;
        return ceil($tmp) / $precisionFactor;
    }

    public static function floorf($value, $precision = 0) {
        $precisionFactor = $precision == 0 ? 1 : pow(10, $precision);
        $tmp = $value * $precisionFactor;
        $tmp2 = (string) $tmp;
        // If the current value has already the desired precision
        if (strpos($tmp2, '.') === false)
            return ($value);
        if ($tmp2[strlen($tmp2) - 1] == 0)
            return $value;
        return floor($tmp) / $precisionFactor;
    }

    /**
     * file_exists() wrapper with cache to speedup performance
     *
     * @param string $filename File name
     * @return boolean Cached result of file_exists($filename)
     */
    public static function file_exists_cache($filename) {
        if (!isset(self::$file_exists_cache[$filename]))
            self::$file_exists_cache[$filename] = file_exists($filename);
        return self::$file_exists_cache[$filename];
    }

    public static function file_get_contents($url, $useIncludePath = false, $streamContext = NULL) {
        if (in_array(ini_get('allow_url_fopen'), array('On', 'on', '1')))
            return file_get_contents($url, $useIncludePath, $streamContext);
        else if (function_exists('curl_init')) {
            $curl = curl_init();
            curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
            curl_setopt($curl, CURLOPT_URL, $url);
            $content = curl_exec($curl);
            curl_close($curl);
            return $content;
        }
        else
            return false;
    }

    public static function minifyHTML($html_content) {
        if (strlen($html_content) > 0) {
            //set an alphabetical order for args
            $html_content = preg_replace_callback(
                    '/(<[a-zA-Z0-9]+)((\s?[a-zA-Z0-9]+=[\"\\\'][^\"\\\']*[\"\\\']\s?)*)>/'
                    , array('Tools', 'minifyHTMLpregCallback')
                    , $html_content);

            require_once(_PS_TOOL_DIR_ . 'minify_html/minify_html.class.php');
            $html_content = str_replace(chr(194) . chr(160), '&nbsp;', $html_content);
            $html_content = Minify_HTML::minify($html_content, array('xhtml', 'cssMinifier', 'jsMinifier'));

            if (Configuration::get('PS_HIGH_HTML_THEME_COMPRESSION')) {
                //$html_content = preg_replace('/"([^\>\s"]*)"/i', '$1', $html_content);//FIXME create a js bug
                $html_content = preg_replace('/<!DOCTYPE \w[^\>]*dtd\">/is', '', $html_content);
                $html_content = preg_replace('/\s\>/is', '>', $html_content);
                $html_content = str_replace('</li>', '', $html_content);
                $html_content = str_replace('</dt>', '', $html_content);
                $html_content = str_replace('</dd>', '', $html_content);
                $html_content = str_replace('</head>', '', $html_content);
                $html_content = str_replace('<head>', '', $html_content);
                $html_content = str_replace('</html>', '', $html_content);
                $html_content = str_replace('</body>', '', $html_content);
                //$html_content = str_replace('</p>', '', $html_content);//FIXME doesnt work...
                $html_content = str_replace("</option>\n", '', $html_content); //TODO with bellow
                $html_content = str_replace('</option>', '', $html_content);
                $html_content = str_replace('<script type=text/javascript>', '<script>', $html_content); //Do a better expreg
                $html_content = str_replace("<script>\n", '<script>', $html_content); //Do a better expreg
            }

            return $html_content;
        }
        return false;
    }

    /**
     * Translates a string with underscores into camel case (e.g. first_name -> firstName)
     * @prototype string public static function toCamelCase(string $str[, bool $capitaliseFirstChar = false])
     */
    public static function toCamelCase($str, $capitaliseFirstChar = false) {
        if ($capitaliseFirstChar)
            $str[0] = strtoupper($str[0]);
        return preg_replace_callback('/_([a-z])/', create_function('$c', 'return strtoupper($c[1]);'), $str);
    }

    public static function getBrightness($hex) {
        $hex = str_replace('#', '', $hex);
        $r = hexdec(substr($hex, 0, 2));
        $g = hexdec(substr($hex, 2, 2));
        $b = hexdec(substr($hex, 4, 2));
        return (($r * 299) + ($g * 587) + ($b * 114)) / 1000;
    }

    public static function minifyHTMLpregCallback($preg_matches) {
        $args = array();
        preg_match_all('/[a-zA-Z0-9]+=[\"\\\'][^\"\\\']*[\"\\\']/is', $preg_matches[2], $args);
        $args = $args[0];
        sort($args);
        $output = $preg_matches[1] . ' ' . implode(' ', $args) . '>';
        return $output;
    }

    public static function packJSinHTML($html_content) {
        if (strlen($html_content) > 0) {
            $html_content = preg_replace_callback(
                    '/\\s*(<script\\b[^>]*?>)([\\s\\S]*?)(<\\/script>)\\s*/i'
                    , array('Tools', 'packJSinHTMLpregCallback')
                    , $html_content);
            return $html_content;
        }
        return false;
    }

    public static function packJSinHTMLpregCallback($preg_matches) {
        $preg_matches[1] = $preg_matches[1] . '/* <![CDATA[ */';
        $preg_matches[2] = self::packJS($preg_matches[2]);
        $preg_matches[count($preg_matches) - 1] = '/* ]]> */' . $preg_matches[count($preg_matches) - 1];
        unset($preg_matches[0]);
        $output = implode('', $preg_matches);
        return $output;
    }

    public static function packJS($js_content) {
        if (strlen($js_content) > 0) {
            require_once(_PS_TOOL_DIR_ . 'js_minify/jsmin.php');
            return JSMin::minify($js_content);
        }
        return false;
    }

    public static function minifyCSS($css_content, $fileuri = false) {
        global $current_css_file;

        $current_css_file = $fileuri;
        if (strlen($css_content) > 0) {
            $css_content = preg_replace('#/\*.*?\*/#s', '', $css_content);
            $css_content = preg_replace_callback('#url\((?:\'|")?([^\)\'"]*)(?:\'|")?\)#s', array('Tools', 'replaceByAbsoluteURL'), $css_content);

            $css_content = preg_replace('#\s+#', ' ', $css_content);
            $css_content = str_replace("\t", '', $css_content);
            $css_content = str_replace("\n", '', $css_content);
            //$css_content = str_replace('}', "}\n", $css_content);

            $css_content = str_replace('; ', ';', $css_content);
            $css_content = str_replace(': ', ':', $css_content);
            $css_content = str_replace(' {', '{', $css_content);
            $css_content = str_replace('{ ', '{', $css_content);
            $css_content = str_replace(', ', ',', $css_content);
            $css_content = str_replace('} ', '}', $css_content);
            $css_content = str_replace(' }', '}', $css_content);
            $css_content = str_replace(';}', '}', $css_content);
            $css_content = str_replace(':0px', ':0', $css_content);
            $css_content = str_replace(' 0px', ' 0', $css_content);
            $css_content = str_replace(':0em', ':0', $css_content);
            $css_content = str_replace(' 0em', ' 0', $css_content);
            $css_content = str_replace(':0pt', ':0', $css_content);
            $css_content = str_replace(' 0pt', ' 0', $css_content);
            $css_content = str_replace(':0%', ':0', $css_content);
            $css_content = str_replace(' 0%', ' 0', $css_content);

            return trim($css_content);
        }
        return false;
    }

    public static function replaceByAbsoluteURL($matches) {
        global $current_css_file, $protocol_link;

        $protocolLink = Tools::getCurrentUrlProtocolPrefix();

        if (array_key_exists(1, $matches)) {
            $tmp = dirname($current_css_file) . '/' . $matches[1];
            return 'url(\'' . $protocolLink . Tools::getMediaServer($tmp) . $tmp . '\')';
        }
        return false;
    }

    /**
     * addJS load a javascript file in the header
     *
     * @param mixed $js_uri
     * @return void
     */
    public static function addJS($js_uri) {
        global $js_files;
        if (!isset($js_files))
            $js_files = array();
        // avoid useless operation...
        if (in_array($js_uri, $js_files))
            return true;

        // detect mass add
        if (!is_array($js_uri) && !in_array($js_uri, $js_files))
            $js_uri = array($js_uri);
        else
            foreach ($js_uri as $key => $js)
                if (in_array($js, $js_files))
                    unset($js_uri[$key]);

        //overriding of modules js files
        foreach ($js_uri AS $key => &$file) {
            if (!preg_match('/^http(s?):\/\//i', $file)) {
                $different = 0;
                $override_path = str_replace(__PS_BASE_URI__ . 'modules/', _PS_ROOT_DIR_ . '/themes/' . _THEME_NAME_ . '/js/modules/', $file, $different);
                if ($different && file_exists($override_path))
                    $file = str_replace(__PS_BASE_URI__ . 'modules/', __PS_BASE_URI__ . 'themes/' . _THEME_NAME_ . '/js/modules/', $file, $different);
                else {
                    // remove PS_BASE_URI on _PS_ROOT_DIR_ for the following
                    $url_data = parse_url($file);
                    $file_uri = _PS_ROOT_DIR_ . Tools::str_replace_once(__PS_BASE_URI__, DIRECTORY_SEPARATOR, $url_data['path']);
                    // check if js files exists
                    if (!file_exists($file_uri))
                        unset($js_uri[$key]);
                }
            }
        }

        // adding file to the big array...
        $js_files = array_merge($js_files, $js_uri);

        return true;
    }

    /**
     * addCSS allows you to add stylesheet at any time.
     *
     * @param mixed $css_uri
     * @param string $css_media_type
     * @return true
     */
    public static function addCSS($css_uri, $css_media_type = 'all') {
        global $css_files;

        if (is_array($css_uri)) {
            foreach ($css_uri as $file => $media_type)
                Tools::addCSS($file, $media_type);
            return true;
        }

        //overriding of modules css files
        $different = 0;
        $override_path = str_replace(__PS_BASE_URI__ . 'modules/', _PS_ROOT_DIR_ . '/themes/' . _THEME_NAME_ . '/css/modules/', $css_uri, $different);
        if ($different && file_exists($override_path))
            $css_uri = str_replace(__PS_BASE_URI__ . 'modules/', __PS_BASE_URI__ . 'themes/' . _THEME_NAME_ . '/css/modules/', $css_uri, $different);
        else {
            // remove PS_BASE_URI on _PS_ROOT_DIR_ for the following
            $url_data = parse_url($css_uri);
            $file_uri = _PS_ROOT_DIR_ . Tools::str_replace_once(__PS_BASE_URI__, DIRECTORY_SEPARATOR, $url_data['path']);
            // check if css files exists
            if (!file_exists($file_uri))
                return true;
        }

        // detect mass add
        $css_uri = array($css_uri => $css_media_type);

        // adding file to the big array...
        if (is_array($css_files))
            $css_files = array_merge($css_files, $css_uri);
        else
            $css_files = $css_uri;

        return true;
    }

    /**
     * Combine Compress and Cache CSS (ccc) calls
     *
     */
    public static function cccCss() {
        global $css_files;
        //inits
        $css_files_by_media = array();
        $compressed_css_files = array();
        $compressed_css_files_not_found = array();
        $compressed_css_files_infos = array();
        $protocolLink = Tools::getCurrentUrlProtocolPrefix();

        // group css files by media
        foreach ($css_files as $filename => $media) {
            if (!array_key_exists($media, $css_files_by_media))
                $css_files_by_media[$media] = array();

            $infos = array();
            $infos['uri'] = $filename;
            $url_data = parse_url($filename);
            $infos['path'] = _PS_ROOT_DIR_ . Tools::str_replace_once(__PS_BASE_URI__, '/', $url_data['path']);
            $css_files_by_media[$media]['files'][] = $infos;
            if (!array_key_exists('date', $css_files_by_media[$media]))
                $css_files_by_media[$media]['date'] = 0;
            $css_files_by_media[$media]['date'] = max(
                    file_exists($infos['path']) ? filemtime($infos['path']) : 0, $css_files_by_media[$media]['date']
            );

            if (!array_key_exists($media, $compressed_css_files_infos))
                $compressed_css_files_infos[$media] = array('key' => '');
            $compressed_css_files_infos[$media]['key'] .= $filename;
        }

        // get compressed css file infos
        foreach ($compressed_css_files_infos as $media => &$info) {
            $mediaVersion = $media == 'all' ? CSS_ALL_VERSION : CSS_SCREEN_VERSION;
            $key = md5($info['key'] . $protocolLink . $mediaVersion);
            $filename = _PS_THEME_DIR_ . 'cache/' . $key . '_' . $media . '.css';
            $info = array(
                'key' => $key,
                'date' => file_exists($filename) ? filemtime($filename) : 0
            );
        }

        //echo print_r($compressed_css_files_infos);exit;
        // aggregate and compress css files content, write new caches files
        foreach ($css_files_by_media as $media => $media_infos) {
            $cache_filename = _PS_THEME_DIR_ . 'cache/' . $compressed_css_files_infos[$media]['key'] . '_' . $media . '.css';
            if ($media_infos['date'] > $compressed_css_files_infos[$media]['date']) {
                $compressed_css_files[$media] = '';
                foreach ($media_infos['files'] as $file_infos) {
                    if (file_exists($file_infos['path']))
                        $compressed_css_files[$media] .= Tools::minifyCSS(file_get_contents($file_infos['path']), $file_infos['uri']);
                    else
                        $compressed_css_files_not_found[] = $file_infos['path'];
                }
                if (!empty($compressed_css_files_not_found))
                    $content = '/* WARNING ! file(s) not found : "' .
                            implode(',', $compressed_css_files_not_found) .
                            '" */' . "\n" . $compressed_css_files[$media];
                else
                    $content = $compressed_css_files[$media];
                file_put_contents($cache_filename, $content);
                chmod($cache_filename, 0777);
            }
            $compressed_css_files[$media] = $cache_filename;
        }

        // rebuild the original css_files array
        $css_files = array();
        foreach ($compressed_css_files as $media => $filename) {
            $url = str_replace(_PS_THEME_DIR_, _THEMES_DIR_ . _THEME_NAME_ . '/', $filename);
            //$css_files[$protocolLink.Tools::getHttpHost().$url] = $media;
            $css_files[$protocolLink . Tools::getMediaServer($url) . $url] = $media;
        }
    }

    /**
     * Combine Compress and Cache (ccc) JS calls
     */
    public static function cccJS() {
        global $js_files;
        //inits
        $compressed_js_files_not_found = array();
        $js_files_infos = array();
        $js_files_date = 0;
        $compressed_js_file_date = 0;
        $compressed_js_filename = '';
        $js_external_files = array();
        $protocolLink = Tools::getCurrentUrlProtocolPrefix();

        // get js files infos
        foreach ($js_files as $filename) {
            $expr = explode(':', $filename);

            if ($expr[0] == 'http')
                $js_external_files[] = $filename;
            else {
                $infos = array();
                $infos['uri'] = $filename;
                $url_data = parse_url($filename);
                $infos['path'] = _PS_ROOT_DIR_ . Tools::str_replace_once(__PS_BASE_URI__, '/', $url_data['path']);
                $js_files_infos[] = $infos;

                $js_files_date = max(
                        file_exists($infos['path']) ? filemtime($infos['path']) : 0, $js_files_date
                );
                $compressed_js_filename .= $filename;
            }
        }

        // get compressed js file infos
        $compressed_js_filename = md5($compressed_js_filename . JS_VERSION);

        $compressed_js_path = _PS_THEME_DIR_ . 'cache/' . $compressed_js_filename . '.js';
        $compressed_js_file_date = file_exists($compressed_js_path) ? filemtime($compressed_js_path) : 0;

        // aggregate and compress js files content, write new caches files
        if ($js_files_date > $compressed_js_file_date) {
            $content = '';
            foreach ($js_files_infos as $file_infos) {
                if (file_exists($file_infos['path']))
                    $content .= file_get_contents($file_infos['path']) . ';';
                else
                    $compressed_js_files_not_found[] = $file_infos['path'];
            }
            $content = Tools::packJS($content);

            if (!empty($compressed_js_files_not_found))
                $content = '/* WARNING ! file(s) not found : "' .
                        implode(',', $compressed_js_files_not_found) .
                        '" */' . "\n" . $content;

            file_put_contents($compressed_js_path, $content);
            chmod($compressed_js_path, 0777);
        }

        // rebuild the original js_files array
        $url = str_replace(_PS_ROOT_DIR_ . '/', __PS_BASE_URI__, $compressed_js_path);
        //$js_files = array_merge(array($protocolLink.Tools::getHttpHost().$url), $js_external_files);
        $js_files = array_merge(array($protocolLink . Tools::getMediaServer($url) . $url), $js_external_files);
    }

    private static $_cache_nb_media_servers = null;

    public static function getMediaServer($filename) {
        if (self::$_cache_nb_media_servers === null) {
            if (_MEDIA_SERVER_1_ == '')
                self::$_cache_nb_media_servers = 0;
            elseif (_MEDIA_SERVER_2_ == '')
                self::$_cache_nb_media_servers = 1;
            elseif (_MEDIA_SERVER_3_ == '')
                self::$_cache_nb_media_servers = 2;
            else
                self::$_cache_nb_media_servers = 3;
        }

        if (self::$_cache_nb_media_servers AND ($id_media_server = (abs(crc32($filename)) % self::$_cache_nb_media_servers + 1)))
            return constant('_MEDIA_SERVER_' . $id_media_server . '_');
        return Tools::getHttpHost();
    }

    public static function generateHtaccess($path, $rewrite_settings, $cache_control, $specific = '') {
        $tab = array('ErrorDocument' => array(), 'RewriteEngine' => array(), 'RewriteRule' => array());
        $multilang = (Language::countActiveLanguages() > 1);

        // ErrorDocument
        $tab['ErrorDocument']['comment'] = '# Catch 404 errors';
        $tab['ErrorDocument']['content'] = '404 ' . __PS_BASE_URI__ . '404.php';

        // RewriteEngine
        $tab['RewriteEngine']['comment'] = '# URL rewriting module activation';

        // RewriteRules
        $tab['RewriteRule']['comment'] = '# URL rewriting rules';

        // Compatibility with the old image filesystem
        if (Configuration::get('PS_LEGACY_IMAGES')) {
            $tab['RewriteRule']['content']['^([a-z0-9]+)\-([a-z0-9]+)(\-[_a-zA-Z0-9-]*)/[_a-zA-Z0-9-]*\.jpg$'] = _PS_PROD_IMG_ . '$1-$2$3.jpg [L]';
            $tab['RewriteRule']['content']['^([0-9]+)\-([0-9]+)/[_a-zA-Z0-9-]*\.jpg$'] = _PS_PROD_IMG_ . '$1-$2.jpg [L]';
        }

        // Rewriting for product image id < 100 millions
        $tab['RewriteRule']['content']['^([0-9])(\-[_a-zA-Z0-9-]*)?/[_a-zA-Z0-9-]*\.jpg$'] = _PS_PROD_IMG_ . '$1/$1$2.jpg [L]';
        $tab['RewriteRule']['content']['^([0-9])([0-9])(\-[_a-zA-Z0-9-]*)?/[_a-zA-Z0-9-]*\.jpg$'] = _PS_PROD_IMG_ . '$1/$2/$1$2$3.jpg [L]';
        $tab['RewriteRule']['content']['^([0-9])([0-9])([0-9])(\-[_a-zA-Z0-9-]*)?/[_a-zA-Z0-9-]*\.jpg$'] = _PS_PROD_IMG_ . '$1/$2/$3/$1$2$3$4.jpg [L]';
        $tab['RewriteRule']['content']['^([0-9])([0-9])([0-9])([0-9])(\-[_a-zA-Z0-9-]*)?/[_a-zA-Z0-9-]*\.jpg$'] = _PS_PROD_IMG_ . '$1/$2/$3/$4/$1$2$3$4$5.jpg [L]';
        $tab['RewriteRule']['content']['^([0-9])([0-9])([0-9])([0-9])([0-9])(\-[_a-zA-Z0-9-]*)?/[_a-zA-Z0-9-]*\.jpg$'] = _PS_PROD_IMG_ . '$1/$2/$3/$4/$5/$1$2$3$4$5$6.jpg [L]';
        $tab['RewriteRule']['content']['^([0-9])([0-9])([0-9])([0-9])([0-9])([0-9])(\-[_a-zA-Z0-9-]*)?/[_a-zA-Z0-9-]*\.jpg$'] = _PS_PROD_IMG_ . '$1/$2/$3/$4/$5/$6/$1$2$3$4$5$6$7.jpg [L]';
        $tab['RewriteRule']['content']['^([0-9])([0-9])([0-9])([0-9])([0-9])([0-9])([0-9])(\-[_a-zA-Z0-9-]*)?/[_a-zA-Z0-9-]*\.jpg$'] = _PS_PROD_IMG_ . '$1/$2/$3/$4/$5/$6/$7/$1$2$3$4$5$6$7$8.jpg [L]';
        $tab['RewriteRule']['content']['^([0-9])([0-9])([0-9])([0-9])([0-9])([0-9])([0-9])([0-9])(\-[_a-zA-Z0-9-]*)?/[_a-zA-Z0-9-]*\.jpg$'] = _PS_PROD_IMG_ . '$1/$2/$3/$4/$5/$6/$7/$8/$1$2$3$4$5$6$7$8$9.jpg [L]';

        $tab['RewriteRule']['content']['^c/([0-9]+)(\-[_a-zA-Z0-9-]*)/[_a-zA-Z0-9-]*\.jpg$'] = 'img/c/$1$2.jpg [L]';
        $tab['RewriteRule']['content']['^([0-9]+)\-[a-zA-Z0-9-]*\.html'] = 'product.php?id_product=$1 [QSA,L]';
        $tab['RewriteRule']['content']['^([0-9]+)\-[a-zA-Z0-9-]*'] = 'category.php?id_category=$1 [QSA,L]';
        $tab['RewriteRule']['content']['^[a-zA-Z0-9-]*/([0-9]+)\-[a-zA-Z0-9-]*\.html'] = 'product.php?id_product=$1 [QSA,L]';
        $tab['RewriteRule']['content']['^([0-9]+)__([a-zA-Z0-9-]*)'] = 'supplier.php?id_supplier=$1 [QSA,L]';
        $tab['RewriteRule']['content']['^([0-9]+)_([a-zA-Z0-9-]*)'] = 'manufacturer.php?id_manufacturer=$1 [QSA,L]';
        $tab['RewriteRule']['content']['^content/([0-9]+)\-([a-zA-Z0-9-]*)'] = 'cms.php?id_cms=$1 [QSA,L]';
        $tab['RewriteRule']['content']['^content/category/([0-9]+)\-([a-zA-Z0-9-]*)'] = 'cms.php?id_cms_category=$1 [QSA,L]';

        if ($multilang) {
            $tab['RewriteRule']['content']['^([a-z]{2})/[a-zA-Z0-9-]*/([0-9]+)\-[a-zA-Z0-9-]*\.html'] = 'product.php?id_product=$2&isolang=$1 [QSA,L]';
            $tab['RewriteRule']['content']['^([a-z]{2})/([0-9]+)\-[a-zA-Z0-9-]*\.html'] = 'product.php?id_product=$2&isolang=$1 [QSA,L]';
            $tab['RewriteRule']['content']['^([a-z]{2})/([0-9]+)\-[a-zA-Z0-9-]*'] = 'category.php?id_category=$2&isolang=$1 [QSA,L]';
            $tab['RewriteRule']['content']['^([a-z]{2})/content/([0-9]+)\-[a-zA-Z0-9-]*'] = 'cms.php?isolang=$1&id_cms=$2 [QSA,L]';
            $tab['RewriteRule']['content']['^([a-z]{2})/content/category/([0-9]+)\-[a-zA-Z0-9-]*'] = 'cms.php?isolang=$1&id_cms_category=$2 [QSA,L]';
            $tab['RewriteRule']['content']['^([a-z]{2})/([0-9]+)__[a-zA-Z0-9-]*'] = 'supplier.php?isolang=$1&id_supplier=$2 [QSA,L]';
            $tab['RewriteRule']['content']['^([a-z]{2})/([0-9]+)_[a-zA-Z0-9-]*'] = 'manufacturer.php?isolang=$1&id_manufacturer=$2 [QSA,L]';
        }

        // PS BASE URI automaticaly prepend the string, do not use PS defines for the image directories
        $tab['RewriteRule']['content']['^([a-z0-9]+)\-([a-z0-9]+)(\-[_a-zA-Z0-9-]*)/[_a-zA-Z0-9-]*\.jpg$'] = _PS_PROD_IMG_ . '$1-$2$3.jpg [L]';
        $tab['RewriteRule']['content']['^([0-9]+)\-([0-9]+)/[_a-zA-Z0-9-]*\.jpg$'] = _PS_PROD_IMG_ . '$1-$2.jpg [L]';
        $tab['RewriteRule']['content']['^([0-9]+)(\-[_a-zA-Z0-9-]*)/[_a-zA-Z0-9-]*\.jpg$'] = 'img/c/$1$2.jpg [L]';

        $tab['RewriteRule']['content']['^([0-9]+)\-[a-zA-Z0-9-]*\.html'] = 'product.php?id_product=$1 [QSA,L]';
        $tab['RewriteRule']['content']['^[a-zA-Z0-9-]*/([0-9]+)\-[a-zA-Z0-9-]*\.html'] = 'product.php?id_product=$1 [QSA,L]';
        $tab['RewriteRule']['content']['^([0-9]+)\-[a-zA-Z0-9-]*'] = 'category.php?id_category=$1 [QSA,L]';
        $tab['RewriteRule']['content']['^([0-9]+)__([a-zA-Z0-9-]*)'] = 'supplier.php?id_supplier=$1 [QSA,L]';
        $tab['RewriteRule']['content']['^([0-9]+)_([a-zA-Z0-9-]*)'] = 'manufacturer.php?id_manufacturer=$1 [QSA,L]';
        $tab['RewriteRule']['content']['^content/([0-9]+)\-([a-zA-Z0-9-]*)'] = 'cms.php?id_cms=$1 [QSA,L]';
        $tab['RewriteRule']['content']['^content/category/([0-9]+)\-([a-zA-Z0-9-]*)'] = 'cms.php?id_cms_category=$1 [QSA,L]';

        // Compatibility with the old URLs
        if (!Configuration::get('PS_INSTALL_VERSION') OR version_compare(Configuration::get('PS_INSTALL_VERSION'), '1.4.0.7') == -1) {
            // This is a nasty copy/paste of the previous links, but with "lang-en" instead of "en"
            // Do not update it when you add something in the one at the top, it's only for the old links
            $tab['RewriteRule']['content']['^lang-([a-z]{2})/([a-zA-Z0-9-]*)/([0-9]+)\-([a-zA-Z0-9-]*)\.html'] = 'product.php?id_product=$3&isolang=$1 [QSA,L]';
            $tab['RewriteRule']['content']['^lang-([a-z]{2})/([0-9]+)\-([a-zA-Z0-9-]*)\.html'] = 'product.php?id_product=$2&isolang=$1 [QSA,L]';
            $tab['RewriteRule']['content']['^lang-([a-z]{2})/([0-9]+)\-([a-zA-Z0-9-]*)'] = 'category.php?id_category=$2&isolang=$1 [QSA,L]';
            $tab['RewriteRule']['content']['^content/([0-9]+)\-([a-zA-Z0-9-]*)'] = 'cms.php?id_cms=$1 [QSA,L]';
            $tab['RewriteRule']['content']['^content/category/([0-9]+)\-([a-zA-Z0-9-]*)'] = 'cms.php?id_cms_category=$1 [QSA,L]';
        }

        Language::loadLanguages();
        $default_meta = Meta::getMetasByIdLang((int) Configuration::get('PS_LANG_DEFAULT'));

        if ($multilang)
            foreach (Language::getLanguages() as $language) {
                foreach (Meta::getMetasByIdLang($language['id_lang']) as $key => $meta)
                    if (!empty($meta['url_rewrite']) AND Validate::isLinkRewrite($meta['url_rewrite']))
                        $tab['RewriteRule']['content']['^' . $language['iso_code'] . '/' . $meta['url_rewrite'] . '$'] = $meta['page'] . '.php?isolang=' . $language['iso_code'] . ' [QSA,L]';
                    elseif (array_key_exists($key, $default_meta) && $default_meta[$key]['url_rewrite'] != '')
                        $tab['RewriteRule']['content']['^' . $language['iso_code'] . '/' . $default_meta[$key]['url_rewrite'] . '$'] = $default_meta[$key]['page'] . '.php?isolang=' . $language['iso_code'] . ' [QSA,L]';
                $tab['RewriteRule']['content']['^' . $language['iso_code'] . '$'] = $language['iso_code'] . '/ [QSA,L]';
                $tab['RewriteRule']['content']['^' . $language['iso_code'] . '/([^?&]*)$'] = '$1?isolang=' . $language['iso_code'] . ' [QSA,L]';
            }
        else
            foreach ($default_meta as $key => $meta)
                if (!empty($meta['url_rewrite']))
                    $tab['RewriteRule']['content']['^' . $meta['url_rewrite'] . '$'] = $meta['page'] . '.php [QSA,L]';
                else if (array_key_exists($key, $default_meta) && $default_meta[$key]['url_rewrite'] != '')
                    $tab['RewriteRule']['content']['^' . $default_meta[$key]['url_rewrite'] . '$'] = $default_meta[$key]['page'] . '.php [QSA,L]';

        if (!$writeFd = @fopen($path, 'w'))
            return false;

        // PS Comments
        fwrite($writeFd, "# .htaccess automaticaly generated by PrestaShop e-commerce open-source solution\n");
        fwrite($writeFd, "# WARNING: PLEASE DO NOT MODIFY THIS FILE MANUALLY. IF NECESSARY, ADD YOUR SPECIFIC CONFIGURATION WITH THE HTACCESS GENERATOR IN BACK OFFICE\n");
        fwrite($writeFd, "# http://www.prestashop.com - http://www.prestashop.com/forums\n\n");
        if (!empty($specific))
            fwrite($writeFd, $specific);

        // RewriteEngine
        fwrite($writeFd, "\n<IfModule mod_rewrite.c>\n");
        fwrite($writeFd, $tab['RewriteEngine']['comment'] . "\nRewriteEngine on\n\n");
        fwrite($writeFd, $tab['RewriteRule']['comment'] . "\n");
        // Webservice
        fwrite($writeFd, 'RewriteRule ^api/?(.*)$ ' . __PS_BASE_URI__ . "webservice/dispatcher.php?url=$1 [QSA,L]\n");

        // Classic URL rewriting
        if ($rewrite_settings)
            foreach ($tab['RewriteRule']['content'] as $rule => $url)
                fwrite($writeFd, 'RewriteRule ' . $rule . ' ' . __PS_BASE_URI__ . $url . "\n");

        fwrite($writeFd, "</IfModule>\n\n");

        // ErrorDocument
        fwrite($writeFd, $tab['ErrorDocument']['comment'] . "\nErrorDocument " . $tab['ErrorDocument']['content'] . "\n");

        // Cache control
        if ($cache_control) {
            $cacheControl = "
<IfModule mod_expires.c>
	ExpiresActive On
	ExpiresByType image/gif \"access plus 1 month\"
	ExpiresByType image/jpeg \"access plus 1 month\"
	ExpiresByType image/png \"access plus 1 month\"
	ExpiresByType text/css \"access plus 1 week\"
	ExpiresByType text/javascript \"access plus 1 week\"
	ExpiresByType application/javascript \"access plus 1 week\"
	ExpiresByType application/x-javascript \"access plus 1 week\"
	ExpiresByType image/x-icon \"access plus 1 year\"
</IfModule>

FileETag INode MTime Size
<IfModule mod_deflate.c>
	AddOutputFilterByType DEFLATE text/html
	AddOutputFilterByType DEFLATE text/css
	AddOutputFilterByType DEFLATE text/javascript
	AddOutputFilterByType DEFLATE application/javascript
	AddOutputFilterByType DEFLATE application/x-javascript
</IfModule>
				";
            fwrite($writeFd, $cacheControl);
        }
        fclose($writeFd);

        Module::hookExec('afterCreateHtaccess');

        return true;
    }

    /**
     * jsonDecode convert json string to php array / object
     *
     * @param string $json
     * @param boolean $assoc  (since 1.4.2.4) if true, convert to associativ array
     * @return array
     */
    public static function jsonDecode($json, $assoc = false) {
        if (function_exists('json_decode'))
            return json_decode($json, $assoc);
        else {
            include_once(_PS_TOOL_DIR_ . 'json/json.php');
            $pearJson = new Services_JSON(($assoc) ? SERVICES_JSON_LOOSE_TYPE : 0);
            return $pearJson->decode($json);
        }
    }

    /**
     * Convert an array to json string
     *
     * @param array $data
     * @return string json
     */
    public static function jsonEncode($data) {
        if (function_exists('json_encode'))
            return json_encode($data);
        else {
            include_once(_PS_TOOL_DIR_ . 'json/json.php');
            $pearJson = new Services_JSON();
            return $pearJson->encode($data);
        }
    }

    /**
     * Display a warning message indicating that the method is deprecated
     */
    public static function displayAsDeprecated() {
        if (_PS_DISPLAY_COMPATIBILITY_WARNING_) {
            $backtrace = debug_backtrace();
            $callee = next($backtrace);
            trigger_error('Function <strong>' . $callee['function'] . '()</strong> is deprecated in <strong>' . $callee['file'] . '</strong> on line <strong>' . $callee['line'] . '</strong><br />', E_USER_WARNING);

            $message = Tools::displayError('The function') . ' ' . $callee['function'] . ' (' . Tools::displayError('Line') . ' ' . $callee['line'] . ') ' . Tools::displayError('is deprecated and will be removed in the next major version.');

            Logger::addLog($message, 3, $callee['class']);
        }
    }

    /**
     * Display a warning message indicating that the parameter is deprecated
     */
    public static function displayParameterAsDeprecated($parameter) {
        if (_PS_DISPLAY_COMPATIBILITY_WARNING_) {
            $backtrace = debug_backtrace();
            $callee = next($backtrace);
            trigger_error('Parameter <strong>' . $parameter . '</strong> in function <strong>' . $callee['function'] . '()</strong> is deprecated in <strong>' . $callee['file'] . '</strong> on line <strong>' . $callee['Line'] . '</strong><br />', E_USER_WARNING);

            $message = Tools::displayError('The parameter') . ' ' . $parameter . ' ' . Tools::displayError(' in function ') . ' ' . $callee['function'] . ' (' . Tools::displayError('Line') . ' ' . $callee['Line'] . ') ' . Tools::displayError('is deprecated and will be removed in the next major version.');
            Logger::addLog($message, 3, $callee['class']);
        }
    }

    public static function enableCache($level = 1) {
        global $smarty;

        if (!Configuration::get('PS_SMARTY_CACHE'))
            return;
        if ($smarty->force_compile == 0 AND $smarty->caching == $level)
            return;
        self::$_forceCompile = (int) ($smarty->force_compile);
        self::$_caching = (int) ($smarty->caching);
        $smarty->force_compile = 0;
        $smarty->caching = (int) ($level);
    }

    public static function restoreCacheSettings() {
        global $smarty;

        if (isset(self::$_forceCompile))
            $smarty->force_compile = (int) (self::$_forceCompile);
        if (isset(self::$_caching))
            $smarty->caching = (int) (self::$_caching);
    }

    public static function isCallable($function) {
        $disabled = explode(',', ini_get('disable_functions'));
        return (!in_array($function, $disabled) AND is_callable($function));
    }

    public static function pRegexp($s, $delim) {
        $s = str_replace($delim, '\\' . $delim, $s);
        foreach (array('?', '[', ']', '(', ')', '{', '}', '-', '.', '+', '*', '^', '$') as $char)
            $s = str_replace($char, '\\' . $char, $s);
        return $s;
    }

    public static function str_replace_once($needle, $replace, $haystack) {
        $pos = strpos($haystack, $needle);
        if ($pos === false)
            return $haystack;
        return substr_replace($haystack, $replace, $pos, strlen($needle));
    }

    /**
     * Function property_exists does not exist in PHP < 5.1
     *
     * @param object or class $class
     * @param string $property
     * @return boolean
     */
    public static function property_exists($class, $property) {
        if (function_exists('property_exists'))
            return property_exists($class, $property);

        if (is_object($class))
            $vars = get_object_vars($class);
        else
            $vars = get_class_vars($class);

        return array_key_exists($property, $vars);
    }

    /**
     * @desc identify the version of php
     * @return string
     */
    public static function checkPhpVersion() {
        $version = null;
        $length = null;

        if (defined('PHP_VERSION'))
            $version = PHP_VERSION;
        else
            $version = phpversion('');

        //Case management system of ubuntu, php version return 5.2.4-2ubuntu5.2
        if (strpos($version, '-') !== false)
            $version = substr($version, 0, strpos($version, '-'));

        return $version;
    }

    /**
     * @desc selection of Smarty depending on the version of php
     *
     */
    public static function selectionVersionSmarty() {
        //Smarty 3 requirements PHP 5.2 +
        if (strnatcmp(self::checkPhpVersion(), '5.2.0') >= 0)
            Configuration::updateValue('PS_FORCE_SMARTY_2', 0);
        else
            Configuration::updateValue('PS_FORCE_SMARTY_2', 1);
    }

    /**
     * @desc try to open a zip file in order to check if it's valid
     * @return bool success
     */
    public static function ZipTest($fromFile) {
        if (class_exists('ZipArchive', false)) {
            $zip = new ZipArchive();
            return ($zip->open($fromFile, ZIPARCHIVE::CHECKCONS) === true);
        } else {
            require_once(dirname(__FILE__) . '/../tools/pclzip/pclzip.lib.php');
            $zip = new PclZip($fromFile);
            return ($zip->privCheckFormat() === true);
        }
    }

    /**
     * @desc extract a zip file to the given directory
     * @return bool success
     */
    public static function ZipExtract($fromFile, $toDir) {
        if (!file_exists($toDir))
            mkdir($toDir, 0777);
        if (class_exists('ZipArchive', false)) {
            $zip = new ZipArchive();
            if ($zip->open($fromFile) === true AND $zip->extractTo($toDir) AND $zip->close())
                return true;
            return false;
        }
        else {
            require_once(dirname(__FILE__) . '/../tools/pclzip/pclzip.lib.php');
            $zip = new PclZip($fromFile);
            $list = $zip->extract(PCLZIP_OPT_PATH, $toDir);
            foreach ($list as $extractedFile)
                if ($extractedFile['status'] != 'ok')
                    return false;
            return true;
        }
    }

    /**
     * Get products order field name for queries.
     *
     * @param string $type by|way
     * @param string $value If no index given, use default order from admin -> pref -> products
     */
    public static function getProductsOrder($type, $value = null) {
        switch ($type) {
            case 'by' :
                /*if ($query = Tools::getValue('search_query') && (is_null($value) || $value === false || $value === ''))
                    return ''; */
                $value = (is_null($value) || $value === false || $value === '') ? (int) Configuration::get('PS_PRODUCTS_ORDER_BY') : $value;
                $list = array(0 => 'discount', 1 => 'price', 2 => 'new', 3 => 'date_upd', 4 => 'hot');
                return ((isset($list[$value])) ? $list[$value] : ((in_array($value, $list)) ? $value : 'new'));
                break;

            case 'way' :
                $value = (is_null($value) || $value === false || $value === '') ? (int) Configuration::get('PS_PRODUCTS_ORDER_WAY') : $value;
                $list = array(0 => 'asc', 1 => 'desc');
                return ((isset($list[$value])) ? $list[$value] : ((in_array($value, $list)) ? $value : 'desc'));
                break;
        }
    }

    /**
     * Convert a shorthand byte value from a PHP configuration directive to an integer value
     * @param string $value value to convert
     * @return int
     */
    public static function convertBytes($value) {
        if (is_numeric($value)) {
            return $value;
        } else {
            $value_length = strlen($value);
            $qty = substr($value, 0, $value_length - 1);
            $unit = strtolower(substr($value, $value_length - 1));
            switch ($unit) {
                case 'k':
                    $qty *= 1024;
                    break;
                case 'm':
                    $qty *= 1048576;
                    break;
                case 'g':
                    $qty *= 1073741824;
                    break;
            }
            return $qty;
        }
    }

    public static function display404Error() {
        header('HTTP/1.1 404 Not Found');
        header('Status: 404 Not Found');
        include(dirname(__FILE__) . '/../404.php');
        die;
    }

    public static function sendSMS($to, $text) {
        $smsURL = 'http://8.6.95.141/smpp/sendsms?';
        $params = array('username' => 'violetbag',
            'password' => 'violet@12',
            'to' => $to,
            'from' => 'VIOLET',
            'text' => $text);
        $smsURL .= http_build_query($params, '', '&');
        $response = http_get($smsURL);

        //TODO: +DO something with the response
    }

    public static function sendSQSRuleMessage($eventID, $referenceID, $customerID, $datetime) {
        $message = array(
            'id_event' => $eventID,
            'date_event' => $datetime,
            'reference' => $referenceID,
            'id_customer' => $customerID
        );

        $sqs = new AmazonSQS();
        $sqs->set_region(AmazonSQS::REGION_APAC_SE1);

        $response = $sqs->send_message(RULES_QUEUE, self::jsonEncode($message));

        if (!$response->isOK()) {
            $templateVars = array('event' => 'SQS rule send message', 'description' => 'Failed to send message to the queue.');
            @Mail::Send(1, 'alert', Mail::l('SQS Alarm'), $templateVars, 'rohit.modi@violetbag.com', 'Rohit Modi', 'alert@violetbag.com', 'VioletBag Monitoring', NULL, NULL, _PS_MAIL_DIR_, false);
            return false;
        }

        return true;
    }

    public static function sendSQSInviteMessage($eventID, $customerID) {
        $message = array(
            'id_invite' => $eventID,
            'id_customer' => $customerID
        );

        $sqs = new AmazonSQS();
        $sqs->set_region(AmazonSQS::REGION_APAC_SE1);

        $response = $sqs->send_message(INVITE_QUEUE, self::jsonEncode($message));

        if (!$response->isOK()) {
            $templateVars = array('event' => 'SQS send invite message', 'description' => 'Failed to send message to the queue.');
            @Mail::Send(1, 'alert', Mail::l('SQS Alarm'), $templateVars, 'rohit.modi@violetbag.com', 'Rohit Modi', 'alert@violetbag.com', 'VioletBag Monitoring', NULL, NULL, _PS_MAIL_DIR_, false);
            return false;
        }

        return true;
    }

    public static function rand_string($length) {
        $chars = "ABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789";

        $size = strlen($chars);
        for ($i = 0; $i < $length; $i++) {
            $str .= $chars[rand(0, $size - 1)];
        }

        return $str;
    }

    public static function captureActivity($id_activity, $id_product) {
        $cookie = new Cookie('ps');
        $id_customer = $cookie->id_customer;
        Db::getInstance()->Execute('INSERT INTO ' . _DB_PREFIX_ . 'product_stats
                                (id_product, id_user_activity, id_customer)
                                values
                                (' . (int) $id_product . ',' . (int) $id_activity . ',' . (int) $id_customer . ')');
    }

    public static function uploadImage($id, $name, $dir, $ext) {
        if (isset($_FILES[$name]['tmp_name']) AND !empty($_FILES[$name]['tmp_name'])) {
            if (!$tmpName = tempnam(_PS_TMP_IMG_DIR_, 'PS') OR !move_uploaded_file($_FILES[$name]['tmp_name'], $tmpName))
                return false;
            else {
                $iname = $_FILES[$name]['name'];
                $_FILES[$name]['tmp_name'] = $tmpName;
                // Copy new image
                if (!imageResize($tmpName, _PS_IMG_DIR_ . $dir . $id . '-' . $iname, NULL, NULL, $ext))
                    return false;

                unlink($tmpName);
                return true;
            }
        }
        return false;
    }

    public static function addCoupons($idCustomer) {
	global $cookie;
	if( (int)$cookie->id_country === 110 ) {
        	$vouchers = array(
	            "6" => array('INR 300 off on order over INR 1500', Tools::ps_round(Tools::convertPrice(300, Currency::getCurrencyInstance(4),false)), Tools::ps_round(Tools::convertPrice(1500, Currency::getCurrencyInstance(4),false)), 3600 * 24 * 30 * 1),
	            "7" => array('INR 700 off on order over INR 3000', Tools::ps_round(Tools::convertPrice(700, Currency::getCurrencyInstance(4),false)), Tools::ps_round(Tools::convertPrice(3000, Currency::getCurrencyInstance(4),false)), 3600 * 24 * 30 * 1),
	            "8" => array('INR 1500 off on order over INR 5000', Tools::ps_round(Tools::convertPrice(1500, Currency::getCurrencyInstance(4),false)), Tools::ps_round(Tools::convertPrice(5000, Currency::getCurrencyInstance(4),false)), 3600 * 24 * 30 * 1)
        	);
	} else {
        	$vouchers = array(
	            "6" => array('USD 15 off on order over USD 100', 15, 100.0, 3600 * 24 * 30 * 1),
        	    "7" => array('USD 30 off on order over USD 200', 30, 200.0, 3600 * 24 * 30 * 2),
	            "8" => array('USD 55 off on order over USD 300', 55, 300.0, 3600 * 24 * 30 * 3),
        	);
	}

        foreach ($vouchers as $idCoupon => $coupon) {
            $couponCode = "" . $idCustomer . $idCoupon . Tools::rand_string(3);

            // create discount
            $languages = Language::getLanguages($order);
            $voucher = new Discount();
            $voucher->id_discount_type = 2;
            foreach ($languages as $language)
                $voucher->description[$language['id_lang']] = $coupon[0]; // coupon description
            $voucher->value = (float) $coupon[1]; // coupon value
            $voucher->name = $couponCode;
            $voucher->id_customer = $idCustomer;
            $voucher->id_currency = 2; //USD
            $voucher->quantity = 1;
            $voucher->quantity_per_user = 1;
            $voucher->cumulable = 0;
            $voucher->cumulable_reduction = 1;
            $voucher->minimal = (float) $coupon[2]; // min order value
            $voucher->active = 1;
            $voucher->cart_display = 1;
            $now = time();
            $voucher->date_from = date('Y-m-d H:i:s', $now);
            $voucher->date_to = date('Y-m-d H:i:s', $now + ($coupon[3])); //validity
            if (!$voucher->validateFieldsLang(false) OR !$voucher->add())
                return false;
        }
    }
    
    public static function getPointsToCash($id_currency) {
        $currency = CurrencyCore::getCurrency($id_currency);
        return (float)(POINTS_TO_CASH * $currency['conversion_rate']) ;
    }

    //ignore sundays and holidays and return the SLA specified by $interval
    public static function getNextWorkingDate($sla, $sd = null) {

        if( empty($sd) ) {
            $sd = new DateTime();
        }

        $sd->add(new DateInterval("P1D"));
        $ed = clone $sd;
        //add the given SLA
        if( is_int($sla) && $sla > 0 ) {
            $ed->add(new DateInterval("P".($sla-1)."D"));
        }
        $total_holidays = 0;
        $holidays = self::getHolidaysCount($sd, $ed);
        while( $holidays > 0 ) {
            $total_holidays += $holidays;
            $old_ed = clone $ed;
            $old_ed->add(new DateInterval("P1D"));
            $ed->add( new DateInterval("P". $holidays. "D")); 
            $holidays = self::getHolidaysCount($old_ed, $ed);
        }
        return $ed;
    }

    public static function getHolidaysCount($sd, $ed) {
        $holidays = 0;
        //check if there are public holidays or sundays in the range
        for($i= clone $sd; $i <= $ed; ) {
            $day_of_week = date('w', strtotime($i->format("Y-m-d H:i:s")) );
            if( (int)$day_of_week === 0 ) { //sunday
                $holidays++;
            } else {
                $t = $i->format("Y-m-d");
                $sql = "select date(holiday) from ps_diva_holidays where holiday = '$t'";
                $row = Db::getInstance()->getRow($sql);
                if( !empty($row) ) {
                    $holidays++;
                }
            }
            //check next day
            $i->add(new DateInterval("P1D"));
        }
        return $holidays;
    }
    public static function copyImg($id_entity, $id_image = NULL, $url, $entity = 'products') {
        $tmpfile = tempnam(_PS_TMP_IMG_DIR_, 'ps_import');

        $imageObj = new Image($id_image);
        $imageObj->createImgFolder();
        $path = _PS_PROD_IMG_DIR_ . $imageObj->getImgPath();

        if (copy(trim($url), $tmpfile)) {
            imageResize($tmpfile, $path . '.jpg');
            $imagesTypes = ImageType::getImagesTypes($entity);
            foreach ($imagesTypes AS $k => $imageType)
                imageResize($tmpfile, $path . '-' . stripslashes($imageType['name']) . '.jpg', $imageType['width'], $imageType['height']);
        } else {
            unlink($tmpfile);
            return false;
        }
        unlink($tmpfile);
        return true;
    }
    
    public static function createCbImage($value) {
        $image_dir = dirname(__FILE__)."/../img/";
        $image_name = "cashback_$value.png";
	if( file_exists($image_dir.$image_name) )
		return $image_name;	
        $template = $image_dir."cashback.png";
        $jpg_image = imagecreatefrompng($template);
        $black = imagecolorallocate($jpg_image, 255,255,255);
        $font_path = $image_dir."mails/verdanab.ttf";
	if( $value == 100 )
        	imagettftext($jpg_image, 16, 0, 15, 56, $black, $font_path, $value);
	else
	        imagettftext($jpg_image, 16, 0, 27, 56, $black, $font_path, $value);
        imagepng($jpg_image,$image_dir.$image_name);
        imagedestroy($jpg_image);
        return $image_name;
    }


    public static function createVoucherImage($code,$value) {
        $image_dir = dirname(__FILE__)."/../";
        $image_name = "img/mails/vouchers/$code.jpg";
        $template = dirname(__FILE__)."/../img/mails/giftvt.jpg";
        $jpg_image = imagecreatefromjpeg($template);
        $black = imagecolorallocate($jpg_image, 0,0,0);
        $font_path = dirname(__FILE__)."/../img/mails/verdanab.ttf";
        imagettftext($jpg_image, 10, 0, 235, 140, $black, $font_path, $value);
        imagettftext($jpg_image, 8, 0, 235, 162, $black, $font_path, $code);
        imagejpeg($jpg_image,$image_dir.$image_name);
        imagedestroy($jpg_image);
        return $image_name;
    }

}

/**
 * Compare 2 prices to sort products
 *
 * @param float $a
 * @param float $b
 * @return integer
 */
/* Externalized because of a bug in PHP 5.1.6 when inside an object */
function cmpPriceAsc($a, $b) {
    if ((float) ($a['price_tmp']) < (float) ($b['price_tmp']))
        return (-1);
    elseif ((float) ($a['price_tmp']) > (float) ($b['price_tmp']))
        return (1);
    return (0);
}

function cmpPriceDesc($a, $b) {
    if ((float) ($a['price_tmp']) < (float) ($b['price_tmp']))
        return (1);
    elseif ((float) ($a['price_tmp']) > (float) ($b['price_tmp']))
        return (-1);
    return (0);
}
