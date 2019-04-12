<?php
/**
 * Created by PhpStorm.
 * User: koryOzyurt
 * Date: 5/29/2018
 * Time: 12:10 PM
 */


/**
 * Class AES-256
 *  to encrypt or decrypt the given data by key
 *  the most important advantage of AES cipher, the AES cipher is
 *  familier with block cipher. Block cipher encrypt and decrypt sequence is same.
 *  It means, if you give a data to encrypt at AES class and give the result at the AES class,
 * you can get the decrypted data.
 */
class AES{

    private $key;
    private $data;
    private $method;

    private $options = 0;

    /**
     *
     * @param $data which is to encrypt or decrypt
     * @param $key would be a string or number
     */
    function __construct($data = null, $key = null) {
        $this->setData($data);
        $this->setKey($key);
        $this->setMethode();
    }
    /**
     *
     * @param $data to change the data
     */
    public function setData($data) {
        $this->data = $data;
    }
    /**
     *
     * @param $key it would be string or number
     */
    public function setKey($key) {
        $this->key = $key;
    }

    /**
     *  we use the AES-256 cipher
     */
    public function setMethode() {
        $this->method = 'AES-' . '256' . '-' . 'CBC';
    }
    /**
     *
     * @return boolean
     */
    public function validateParams() {
        if ($this->data != null &&
            $this->method != null ) {
            return true;
        } else {
            return FALSE;
        }
    }

    /**
     *  encryption or decryption will use the same method.
     * @return string
     */
    protected function getIV() {
        return '1234567890123456';
    }
    /**
     * @return encryptedText
     * @throws Exception
     */
    public function encrypt() {
        if ($this->validateParams()) {
            return trim(openssl_encrypt($this->data, $this->method, $this->key, $this->options,$this->getIV()));
        } else {
            throw new Exception('Invalid Parameters');
        }
    }
    /**
     *
     * @return decryptedText
     * @throws Exception
     */
    public function decrypt() {
        if ($this->validateParams()) {
            $ret=openssl_decrypt($this->data, $this->method, $this->key, $this->options,$this->getIV());

            return trim($ret);
        } else {
            throw new Exception('Invalid Parameters!');
        }
    }

}