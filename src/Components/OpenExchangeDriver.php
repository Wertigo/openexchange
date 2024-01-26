<?php

namespace Openexchange\Components;

use Openexchange\DTO\Latest;

class OpenExchangeDriver
{
	private const LATEST = 'https://openexchangerates.org/api/latest.json';
	private const APP_ID = '49d0ef61c0624b32b3ad146fdf104c1b';
	
	public function getLatest(): Latest
	{
		$response = $this->getResponse(self::LATEST, ['app_id' => self::APP_ID]);
		$data = json_decode($response, true);
		
		return new Latest($data['base'], $data['timestamp'], $data['rates']);
	}
	
	private function getResponse($url, array $params = []): string
	{
		if (!empty($params)) {
			$url = $url . '?' . http_build_query($params);
		}
		
		$ch = curl_init($url);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
		curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
		curl_setopt($ch, CURLOPT_HEADER, false);
		$res = curl_exec($ch);
		curl_close($ch);
		 
		return $res;
	}
}
