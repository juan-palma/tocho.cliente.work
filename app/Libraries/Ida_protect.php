<?php

namespace App\Libraries;

use Aws\Kms\KmsClient;
use Aws\Exception\AwsException;

class Ida_protect {
    
	protected $aliasKey;

	public function __construct(){
		$this->aliasKey = env('encryption.key');
	}
    
    public function encrypt($message = '')
    {
        if( $message === '' ){ return false; }
        
        $KmsClient = new KmsClient([
            'profile' => 'default',
            'version' => 'latest',
            'region' => 'us-east-1'
        ]);
        
        $keyId = $this->aliasKey;
        
        try {
            $result = $KmsClient->encrypt([
                'KeyId' => $keyId,
                'Plaintext' => $message
            ]);
            return base64_encode($result['CiphertextBlob']);
            
        } catch (AwsException $e) {
            // output error message if fails
            echo $e->getMessage();
        }
    }
    
    public function decrypt($message = '')
    {
        if( $message === '' ){ return false; }
                
        $KmsClient = new KmsClient([
            'profile' => 'default',
            'version' => 'latest',
            'region' => 'us-east-1'
        ]);
        

        try {
            $result = $KmsClient->decrypt([
                'CiphertextBlob' => base64_decode($message)
            ]);
            
            return $result['Plaintext'];
                        
        } catch (AwsException $e) {
            echo $e->getMessage();
        }

    }
}