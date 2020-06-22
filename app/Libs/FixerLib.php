<?php


namespace App\Libs;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Cache;

class FixerLib
{
	protected $apiKey;

	public function __construct()
	{
		$this->apiKey = config('app.fixer_api_key');
	}

	public function getCurrencies() : array
	{
		return Cache::remember('currency_response', 20, function () {
			$apiKey = $this->apiKey;
			$response =  Http::get("http://data.fixer.io/api/latest?access_key=$apiKey&symbols=EUR,USD");
			return $response->json();
		});
	}
}