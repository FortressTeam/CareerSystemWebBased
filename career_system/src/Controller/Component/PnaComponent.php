<?php

namespace App\Controller\Component;

use Cake\Controller\Component;
use Cake\Network\Http\Client;
use Cake\ORM\TableRegistry;

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

    private function _sendToAndroid($objectToken, $data)
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
        $objects = [
            $objectToken
        ];        
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

    private function _sendToWebBased($user = nul, $message = nulll)
    {
        $data = [
            'notification_title' => $message['title'],
            'notification_message' => $message['message'],
            'notification_type' => $message['type'],
            'notification_object_id' => $message['object_id'],
            'user_id' => $user['id'],
            'is_seen' => 0
        ];
        $notiTable = TableRegistry::get('Notifications');
        $notification = $notiTable->newEntity();
        $notification = $notiTable->patchEntity($notification, $data);
        $notiTable->save($notification);
    }

    public function sendNotification($message = null, $user = null)
    {
        $this->_sendToAndroid($user['user_android_token'], $message);
        $this->_sendToWebBased($user, $message);
    }
}