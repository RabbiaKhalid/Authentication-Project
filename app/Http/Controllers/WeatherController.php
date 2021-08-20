<?php

namespace App\Http\Controllers;
//use App\Http;

use Illuminate\Http\Request;

class WeatherController extends Controller
{
    //
    public function weatherData(){
        $location="Toronto";
        $apiKey='1e55dd07527577d82b9c759099721129';
        $response=\Http::withOptions([
            'verify' => false,
        ])->get("https://api.openweathermap.org/data/2.5/weather?q={$location}&appid={$apiKey}&units=metric");
      //  $responseFuture=\Http::withOptions([
       //     'verify' => false,
      //  ])->get("https://api.openweathermap.org/data/2.5/forecast/daily?q=Islamabad&cnt=5&appid=1e55dd07527577d82b9c759099721129&units=metric");
      //dump($responseFuture->json());
       
        return view('weather',
        [ 
            'currentweather' =>$response->json(),
    
        ]);
}
    public function searchcity(Request $request)
    {   //$search_text=$request['search'];
        $this->validate($request,[
            'search'=>'required|regex:/^[a-zA-ZÑñ\s]+$/'
            ]);
        $search_text=$request->input('search');
        //$apiKey='1e55dd07527577d82b9c759099721129';
        $apiKey=config('services.openweather.key');
        $response=\Http::withOptions([
            'verify' => false,
        ])->get("https://api.openweathermap.org/data/2.5/weather?q={$search_text}&appid={$apiKey}&units=metric");
      //  dump($response->json());
       
        return view('weather',
        [ 
            'currentweather' =>$response->json(),
    
        ]);

    }
}