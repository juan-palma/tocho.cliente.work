<?php
namespace App\Libraries;

class IdaProtect
{
    protected $key;
    protected $cipher = 'AES-256-CBC';

    public function __construct()
    {
        // Obtener la clave desde .env y asegurarse de que sea de 32 bytes (256 bits)
        $this->key = substr(hash('sha256', env('encryption.key', 'default_secret_key')), 0, 32);
    }

    public function encrypt($message = '')
    {
        if (empty($message)) {
            return false;
        }

        try {
            // Generar un vector de inicialización (IV) aleatorio
            $ivLength = openssl_cipher_iv_length($this->cipher);
            $iv = openssl_random_pseudo_bytes($ivLength);

            // Encriptar el mensaje
            $encrypted = openssl_encrypt(
                $message,
                $this->cipher,
                $this->key,
                0,
                $iv
            );

            if ($encrypted === false) {
                throw new \Exception('Fallo al encriptar el mensaje');
            }

            // Combinar IV y datos encriptados (IV al inicio para usar en decrypt)
            return base64_encode($iv . $encrypted);
        } catch (\Exception $e) {
            log_message('error', 'Fallo al encriptar: ' . $e->getMessage());
            return null;
        }
    }

    public function decrypt($message = '')
    {
        if (empty($message)) {
            return false;
        }

        try {
            // Decodificar el mensaje base64
            $decoded = base64_decode($message);
            if ($decoded === false) {
                throw new \Exception('Mensaje codificado inválido');
            }

            // Extraer el IV y los datos encriptados
            $ivLength = openssl_cipher_iv_length($this->cipher);
            $iv = substr($decoded, 0, $ivLength);
            $encryptedData = substr($decoded, $ivLength);

            if (strlen($iv) !== $ivLength || empty($encryptedData)) {
                throw new \Exception('IV o datos encriptados inválidos');
            }

            // Desencriptar
            $decrypted = openssl_decrypt(
                $encryptedData,
                $this->cipher,
                $this->key,
                0,
                $iv
            );

            if ($decrypted === false) {
                throw new \Exception('Fallo al desencriptar el mensaje');
            }

            return $decrypted;
        } catch (\Exception $e) {
            log_message('error', 'Fallo al desencriptar: ' . $e->getMessage());
            return null;
        }
    }
}






//Codigo con AWS Kms
//namespace App\Libraries;

//use Aws\Kms\KmsClient;
//use Aws\Exception\AwsException;

//class IdaProtect
//{
//    protected $aliasKey;

//    public function __construct()
//    {
//        $this->aliasKey = env('encryption.key');
//    }

//    public function encrypt($message = '')
//    {
//        if (empty($message)) {
//            return false;
//        }

//        $kmsClient = new KmsClient([
//            'profile' => 'default',
//            'version' => 'latest',
//            'region' => 'us-east-1'
//        ]);

//        try {
//            $result = $kmsClient->encrypt([
//                'KeyId' => $this->aliasKey,
//                'Plaintext' => $message
//            ]);
//            return base64_encode($result['CiphertextBlob']);
//        } catch (AwsException $e) {
//            log_message('error', 'Fallo al encriptar: ' . $e->getMessage());
//            return null;
//        }
//    }

//    public function decrypt($message = '')
//    {
//        if (empty($message)) {
//            return false;
//        }

//        $kmsClient = new KmsClient([
//            'profile' => 'default',
//            'version' => 'latest',
//            'region' => 'us-east-1'
//        ]);

//        try {
//            $result = $kmsClient->decrypt([
//                'CiphertextBlob' => base64_decode($message)
//            ]);
//            return $result['Plaintext'];
//        } catch (AwsException $e) {
//            log_message('error', 'Fallo al desencriptar: ' . $e->getMessage());
//            return null;
//        }
//    }
//}