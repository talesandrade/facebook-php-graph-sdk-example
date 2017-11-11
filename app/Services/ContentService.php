<?php
namespace App\Services;

use App\Services\FacebookService;
use Carbon\Carbon;
use App;


// TODO: implements IContentService
class ContentService {

    public static function getContentFacebook($user_uuid) {


		$content = FacebookService::getContent($user_uuid);

		return $content;
	}
}

?>