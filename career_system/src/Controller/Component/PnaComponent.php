<?php

namespace App\Controller\Component;

use Cake\Controller\Component;
use Cake\Network\Http\Client;

/**
 * Push Notification for Android Component
 *
 *
 */
class PnaComponent extends Component
{

	
	private $_serverAddress = 'https://gcm-http.googleapis.com/gcm/send';
	private $_apiKey = 'AIzaSyAJJcDuIjDZ3JkCLG3kVd-rqhke0zcDHtA';

	protected function _parseData($objects, $data)
	{
        $package = [
        	'registration_ids' => $objects,
        	'data' => $data
        ];
        return json_encode($package);
	} 

    public function send($objects, $data)
    {
    	///////////////////////////////////////////////
        $objects = [
            'fBaqW4R9XkA:APA91bH9tZOKGS_QfvEaSiWsrdmIMeps5VHZywN8qXmdLDE0OSisemLck7BOvzcQ9caYj69gdBF15KGFN6moX4NXxKzLzTiI8bWvpbGc5WdMN5iQTB1BYC69kyGTKGBAjMOgsh5xS7QM',
            'eVCFsTWx9ic:APA91bE4itXCL5gbJqQrMaMATyPWQUENTCYlKu164Nw8cVh2F3rvxv_weBZwJzdqN41zAuyeoSgwLlQSP63uNsXH5ZhJFpEEr9M8zjnxvBmLIQEbcfSIofTS3r0zWktggekNXXfeVkY7'
        ];
        $data = [
            'title' => 'CakePHP',
            'message' => 'Truong Khoa Huynh Kim Khoa San'
        ];
    	///////////////////////////////////////////////

        $http = new Client();
        $jsonPackage = $this->_parseData($objects, $data);
        $response = $http->post(
            $this->_serverAddress,
            $jsonPackage,
            ['headers' => [
                'Content-Type' => 'application/json',
                'Authorization' => 'key=' . $this->_apiKey
            ]]
        );
        return $response;
    }
}