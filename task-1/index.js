function reverseString(str, start, last) {
    var splitString = str.split("");
    // pick start and last values
    var getPortion = splitString.slice(start, last+1)

 
    // reverse array here
    var reverseArray = getPortion.reverse(); 
 
    // join reveresed here
    var joinArray = reverseArray.join(""); 
    
    // put it back in original string
    var final_output = put_back_into_string(joinArray, str, start, last)
    console.log(final_output);

}

function put_back_into_string(reversed_str, old_str, start, last) {
    var word = old_str.split("");
    console.log(reversed_str);

    var get_first_portion = word.slice(0, start)
    var first_portion = get_first_portion.join("")
    console.log(first_portion);

    var get_last_portion = word.slice(last+1)
    var last_portion = get_last_portion.join("")
    // console.log(last_portion);

    // merge with reversed string
    return first_portion + reversed_str + last_portion

}

reverseString("developer", 1, 5)