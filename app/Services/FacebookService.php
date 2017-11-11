<?php
namespace App\Services;

use App;
use Log;
use Carbon\Carbon;
use Facebook;

 # /matematicario/posts?fields=created_time,message,attachments,source,type,caption

class FacebookService
{

    public static function getContent($page_id){

            $fb = new \Facebook\Facebook([
                'app_id' => '689994681170823',
                'app_secret' => 'eb9ce3602c5fae0235ca9bd208932410',
                'default_graph_version' => 'v2.10',
                'default_access_token' => '689994681170823|M-cBxle5l2KhKjKFzoyGxwrRE3g', // optional
            ]);


            $params = ['fields' => 'message,attachments,source,type,caption,created_time','limit' => '100'];
            
            try {
            $response = $fb->sendRequest('GET', '/'.$page_id.'/posts', $params, '689994681170823|M-cBxle5l2KhKjKFzoyGxwrRE3g');
            } catch(Facebook\Exceptions\FacebookResponseException $e) {
            // When Graph returns an error
            echo 'Graph returned an error: ' . $e->getMessage();
            exit;
            } catch(Facebook\Exceptions\FacebookSDKException $e) {
            // When validation fails or other local issues
            echo 'Facebook SDK returned an error: ' . $e->getMessage();
            exit;
            }

            $graphNode = $response->getGraphEdge();

            $graphNodeDecoded = json_decode($graphNode, true);

        return  $graphNodeDecoded;
        
        
        //return $graphNodeDecoded;
    }
}