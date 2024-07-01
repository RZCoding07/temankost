<?php namespace App\Controllers;


class Map extends BaseController
{

	public function index($kordinat)
	{
	    //$inputString = $kordinat;
      	$inputString = $this->request->uri->getSegment(2);
        $longitude = Map::getWordBeforeComma($inputString);
        $latitude = Map::getWordAfterComma($inputString);
     	$latitude = str_replace('%20', '', $latitude);
      
		$data=[
			'title'=>'Peta',
			'kordinat' => $kordinat,
      		'latitude' => $longitude,
      		'longitude' => $latitude
		];
		
         return view('user/peta/index',$data);
	}
  
  public static function getWordAfterComma($inputString) {
    $commaPosition = strpos($inputString, ','); // Find the position of the comma in the input string
    if ($commaPosition !== false) {
        $wordAfterComma = substr($inputString, $commaPosition + 1); // Get the substring after the comma
        $wordAfterComma = trim($wordAfterComma); // Remove any leading or trailing whitespace
        return $wordAfterComma;
    } else {
        return ''; // Return an empty string if there is no comma or word after the comma
    }
}
  
  public static function getWordBeforeComma($inputString) {
    $commaPosition = strpos($inputString, ','); // Find the position of the comma in the input string
    if ($commaPosition !== false) {
        $wordBeforeComma = substr($inputString, 0, $commaPosition); // Get the substring before the comma
        $wordBeforeComma = trim($wordBeforeComma); // Remove any leading or trailing whitespace
        return $wordBeforeComma;
    } else {
        return ''; // Return an empty string if there is no comma or word before the comma
    }
  
}





	
	//--------------------------------------------------------------------

}
