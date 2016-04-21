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
        // $objects = [
        //     'fPW96qYHMd4:APA91bG-gfVe0nsIr9drbhGWVYR-UgsHCx2ClsO9z82QkpFds28GIyStYANAa1nqtcX70vg16eqtLFs7USTIfE-7d8q8cskT4jHMaw1_eDXtsPTQ2_Yc'
        // ];
        // $data = [
        //     'title' => 'Khoa Noi',
        //     'message' => 'Truong Khoa Huynh Kim Khoa San'
        // ];
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