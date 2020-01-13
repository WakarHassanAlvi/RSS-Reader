<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $authors = null;
        $titles = null;
        $summaries = null;
        $max_count = 10;

        //getting newsfeed contents in xml format
        $url = file_get_contents("https://www.theregister.co.uk/software/headlines.atom");

        //encoding xml to json format
        $xml = json_decode(json_encode(simplexml_load_string($url)), TRUE);

        //accessing all the author names
        foreach($xml['entry'] as $entry){

            //getting all author names in one string
            $authors .= $entry['author']['name']." ";
        }

        //accessing all the article titles
        foreach($xml['entry'] as $entry){

            //getting all article titles in one string
            $titles .= $entry['title']." ";
        }

        //accessing all the article summaries (Descriptions)
        foreach($xml['entry'] as $entry){

            //getting all article summaries (Descriptions) in one string
            $summaries .= strip_tags($entry['summary'])." ";
        }
        
        //getting all author names, article titles and summaries in one string
        $total_string = $authors.$titles.$summaries;

        //getting all the most common words from json file
        $stop_words = json_decode(\Storage::disk('local')->get('mostcommonwords.json'));

        //getting 10 most common words with their count from news feed
        $words = $this->extractWords( $total_string, $stop_words, $max_count);

        //getting all common words with counts from news feed
        $other_words = $this->extractWords( $total_string, $stop_words, 0);

        //returning home blade with all the data
        return view('home', [
            'words' => $words,
            'other_words' => $other_words,
            'feeds' => $xml
        ]);
    }

    /**
     * for getting most common words with their counts
     *
     * @param String $string = total string from where need to extract words
     * @param String $stop_words = words to be ignored
     * @param Integer $max_count = No. of counts need to extract
     * @return Json  most common words with their counts
     */
    function extractWords($string, $stop_words, $max_count){  //max count to define how many words are returned
      
        $string = preg_replace('/\s\s+/i', '', $string); // replace whitespace
        $string = trim($string); // trim the string
        $string = preg_replace('/[^a-zA-Z.\/\&nbsp\;() - ]/', '', $string); // only take alpha characters, but keep the spaces and dashes too… remove / . 
        $string = strtolower($string); // make it lowercase
        $string = strip_tags($string);
     
        preg_match_all('/\b.*?\b/i', $string, $matchWords); //remove spacial characters
        $matchWords = $matchWords[0];
        
        //check all ignore words and remove from string
        foreach ( $matchWords as $key=>$item ) {
              if ( $item == '' || in_array($item, $stop_words) || strlen($item) <= 3 ) {
                unset($matchWords[$key]);
            }
        }   
        $wordCountArr = array();

        //extracting all most commong words used with count
        if ( is_array($matchWords) ) {
            foreach ( $matchWords as $key => $val ) {
                $val = strtolower($val);
                if ( isset($wordCountArr[$val]) ) {
                    $wordCountArr[$val]++;
                } else {
                    $wordCountArr[$val] = 1;
                }
            }
        }

        //sorting the array with word counts
        arsort($wordCountArr);

        //return all matched array if max count not set
        if($max_count)
        $wordCountArr = array_slice($wordCountArr, 0, $max_count);
        return $wordCountArr;
  }
}
