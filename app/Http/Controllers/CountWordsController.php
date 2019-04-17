<?php

namespace App\Http\Controllers;

use App\Http\Requests\CountWordsRequest;


class CountWordsController extends Controller
{
    /**
     * Receives a sentence and returns the list of the different words with the number of occurrences.
     * @param CountWordsRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function countWords(CountWordsRequest $request){
        $sentence = $request->get('sentence');
        $split = preg_split("/[^a-zA-z]+/", $sentence);
        $result = [];
        foreach ($split as $item) {
//            $key = strtoupper($item); //change if it is not case sensitive
            $key = $item; //change if it is not case sensitive
            if(array_key_exists($key, $result)){
                $result[$key] = $result[$key] +1;
            }
            else{
                if($key!='')
                    $result[$key] = 1;
            }
        }
        return response()->json($result)->header('Access-Control-Allow-Origin', '*');
    }
}
