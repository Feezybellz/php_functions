
function isvalidBracket($s){
  
    //CLean the string from unneccesary characters
    $cleanStr = preg_replace('/[^\{\}\(\)\[\]]+/', '', $s);
    
    $openBrackets = ["(", "{", "["];
    $closeBrackets = [")", "}", "]"];
    $bracketStacks = array();
    for ($i=0; $i < strlen($cleanStr); $i++){
        $currentBracket = $cleanStr[$i];
        if(in_array($currentBracket, $openBrackets))
            array_push($bracketStacks, $currentBracket);
        else{
            //$bracketStacks cannot be empty at this point!
            if (empty($bracketStacks)) return false;

            $poppedBracket = array_pop($bracketStacks);
            
            //If currentBracket is not opening bracket, 
            //then it must be closing; Otherwise return false.
            
            foreach($openBrackets as $key => $braket){
              if($poppedBracket === $openBrackets[$key] and $currentBracket !== $closeBrackets[$key] )
                    return false;
            }
            
        }
    }
    return empty($bracketStacks);
}


//var_dump(isvalidBracket("[((ds))]{{f}f{[()()]{}}}")); //true
//var_dump(isvalidBracket("{}(]}")); //false
//var_dump(isvalidBracket("[{}(){}]")); //true
