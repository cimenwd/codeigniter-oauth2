<?php
/**
 * Facebook OAuth2 Provider
 *
 * @package    CodeIgniter/OAuth2
 * @category   Provider
 * @author     Phil Sturgeon
 * @copyright  (c) 2012 HappyNinjas Ltd
 * @license    http://philsturgeon.co.uk/code/dbad-license
 */

class OAuth2_Provider_Facebook extends OAuth2_Provider
{

	protected $scope = array('email','user_status');

	public function getsslpage($url) {
		$ch = curl_init();
		curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);
		curl_setopt($ch, CURLOPT_HEADER, false);
		curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
		curl_setopt($ch, CURLOPT_URL, $url);
		curl_setopt($ch, CURLOPT_REFERER, $url);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
		$result = curl_exec($ch);
		curl_close($ch);
		return $result;
	}

	public function url_authorize()
	{
		return 'https://www.facebook.com/dialog/oauth';
	}

	public function url_access_token()
	{
		return 'https://graph.facebook.com/oauth/access_token';
	}

	public function get_user_info(OAuth2_Token_Access $token)
	{

		$appsecret_proof= hash_hmac('sha256', $token, $config['fb_appsecret']);
		$url = 'https://graph.facebook.com/v2.6/me?'.http_build_query(array(
			'access_token' => $token->access_token,
				'appsecret_proof'=>$appsecret_proof,
				'fields'=>"id,name,first_name,last_name,email,hometown,bio,link,picture.type(large)"
		));
		$ul=$this->getsslpage($url);
		$user = json_decode($ul);

		// Create a response from the request
		return array(
			'uid' => $user->id,
			'nickname' => isset($user->username) ? $user->username : null,
			'name' => $user->name,
			'first_name' => $user->first_name,
			'last_name' => $user->last_name,
			'email' => isset($user->email) ? $user->email : null,
			'location' => isset($user->hometown->name) ? $user->hometown->name : null,
			'description' => isset($user->bio) ? $user->bio : null,
			'image' => $user->picture->data->url,
			'urls' => array(
			  'Facebook' => $user->link,
			),
		);
	}

	public function get_fbuser_info(OAuth2_Token_Access $token,$appsecret="")
	{
		$appsecret_proof= hash_hmac('sha256', $token, $appsecret);
		$url = 'https://graph.facebook.com/v2.6/me?'.http_build_query(array(
				'access_token' => $token->access_token,
				'appsecret_proof'=>$appsecret_proof,
				'fields'=>"id,name,first_name,last_name,email,hometown,bio,link,picture.type(large)"
			));
		$ul=$this->getsslpage($url);
		$user = json_decode($ul);

		// Create a response from the request
		return array(
			'uid' => $user->id,
			'nickname' => isset($user->username) ? $user->username : null,
			'name' => $user->name,
			'first_name' => $user->first_name,
			'last_name' => $user->last_name,
			'email' => isset($user->email) ? $user->email : null,
			'location' => isset($user->hometown->name) ? $user->hometown->name : null,
			'description' => isset($user->bio) ? $user->bio : null,
			'image' => $user->picture->data->url,
			'urls' => array(
				'Facebook' => $user->link,
			),
		);
	}
}
