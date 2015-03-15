<?php

class ThingController extends BaseController {
    protected $apikey;

    public function __construct()
    {
        $this->apiKey = '1d341d3550630117cf4641d3601b350c239604c59305de2d3721aca274d2beeb';
    }
//
	public function index()
	{
        $things = [];

        $things = $this->getRiotThings($this->apiKey);
		return View::make('home.index')
            ->with('things', $things);
	}

    public function getThingTypes()
    {
        $thingTypes = [];
        $thingTypes = $this->getRiotThingTypes($this->apiKey);

        return View::make('home.thingtypes')
            ->with('thing_types', $thingTypes);
    }

    public function show($id)
    {
        $thing = $this->getRiotThing($this->apiKey, $id);

        return View::make('home.securitypanel')
            ->with('thing', $thing);
    }

    public function history($thing_id, $field_id)
    {
        $history = $this->getRiotHistory($this->apiKey, $thing_id, $field_id);

        return View::make('home.history')
            ->with('history', $history);
    }

    private function getRiotHistory($api_key, $thing_id, $field_id)
    {
        $uri = 'http://one.hackiot.com:8080/riot-core-services/api/thing/';
        $uri .= $thing_id . '/field' . '/' . $field_id;
        $result = [];

        try {
            $response = Httpful\Request::get($uri)
                ->addHeader('Api_key', $api_key)
                ->send();

            $result = $response->body;
        }
        catch(Exception $e) {
        }

        return $result;
    }

    private function getRiotThing($api_key, $id)
    {
        $uri = "http://one.hackiot.com:8080/riot-core-services/api/thing/$id";
        $result = [];

        try {
            $response = Httpful\Request::get($uri)
                ->addHeader('Api_key', $api_key)
                ->send();

            $result = $response->body;
        }
        catch(Excpetion $e) {
        }

        return $result;
    }

    private function getRiotThingTypes($api_key)
    {
        $uri = 'http://one.hackiot.com:8080/riot-core-services/api/thingType/';
        $result = [];
        try {
            $response = Httpful\Request::get($uri)
                ->addHeader('Api_key', $api_key)
                ->send();

            $result = $response->body->results;
        }
        catch(Exception $e) {
            // wrong
        }

        return $result;
    }

    private function getRiotThings($api_key)
    {
        $result = [];
        $url = 'http://one.hackiot.com:8080/riot-core-services/api/thing/?extra=thingType';
        try {
            $response = Httpful\Request::get($url)
                ->addHeader('Api_key', $api_key)
                ->send();
            $result = $response->body->results;

        }
        catch(Excpetion $e) {
            // wrong
        }

        return $result;
    }

    private function test_post($api_key)
    {
        $body = [
            'topic' => $topic,
            'payload' => $data
        ];

        try {
            $request = \Httpful\Request::get('http://localhost:9999/mqtt/publish')
                ->sendsJson()
                ->addHeader('Api_key', $api_key)
                ->body(json_encode($body))
                ->send();
        }
        catch(\Exception $e) {
        }
    }
}

