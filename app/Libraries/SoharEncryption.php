<?php namespace App\Libraries;

class SoharEncryption
{
    protected $workingKey;

    public function __construct(string $workingKey)
    {
        $this->workingKey = $workingKey;
    }

    public function encryptRequest(string $plainText): string
    {
        $key = substr(hash('sha256', $this->workingKey), 0, 32);
        $iv = openssl_random_pseudo_bytes(16);
        $tag = '';
        
        $cipherText = openssl_encrypt(
            $plainText,
            'aes-256-gcm',
            $key,
            OPENSSL_RAW_DATA,
            $iv,
            $tag,
            '',
            16
        );
        
        return bin2hex($iv) . bin2hex($cipherText . $tag);
    }

    public function decryptResponse(string $encResponse): string
    {
        $key = substr(hash('sha256', $this->workingKey), 0, 32);
        $iv = hex2bin(substr($encResponse, 0, 32));
        $encrypted = hex2bin(substr($encResponse, 32));
        $tag = substr($encrypted, -16);
        $cipherText = substr($encrypted, 0, -16);
        
        return openssl_decrypt(
            $cipherText,
            'aes-256-gcm',
            $key,
            OPENSSL_RAW_DATA,
            $iv,
            $tag
        );
    }
}