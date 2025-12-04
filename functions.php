<?php
// functions.php

function rando($length) {
$characters = '0123456789abcdefghijklmnopqrstuvwxyz';
$charactersLength = strlen($characters);
$randomString = '';
for ($i = 0; $i < $length; $i++) {
$randomString .= $characters[rand(0, $charactersLength - 1)];
}
return $randomString;
}


function httpCall($url, $data = null, $headers = [], $method = "GET", $returnHeaders = false)
{
    $ch = curl_init();
    
    // Set default headers
    if (empty($headers)) {
        $headers = [
            "User-Agent: Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/74.0.3729.169 Safari/537.36"
        ];
    }
    
    // Spoof IP address (the original code generated a random IP)
    $ip = long2ip(mt_rand());
    $headers[] = "X-Forwarded-For: $ip";
    
    curl_setopt_array($ch, [
        CURLOPT_URL => $url,
        CURLOPT_HTTPHEADER => $headers,
        CURLOPT_SSL_VERIFYPEER => false,
        CURLOPT_SSL_VERIFYHOST => false,
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_HEADER => $returnHeaders,
        CURLOPT_ENCODING => 'gzip',
        CURLOPT_FOLLOWLOCATION => true,
        CURLOPT_CONNECTTIMEOUT => 5,
        CURLOPT_TIMEOUT => 10
    ]);
    
    if (strtoupper($method) === "POST") {
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
    } elseif (strtoupper($method) === "PUT") {
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "PUT");
        if ($data) {
            curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
        }
    } else {
        if ($data) {
            $url .= "?" . http_build_query($data);
        }
    }
    
    $output = curl_exec($ch);
    curl_close($ch);
    
    return $output;
}

function generateRandomString($length, $characters)
{
    $charactersLength = strlen($characters);
    $randomString = '';
    for ($i = 0; $i < $length; $i++) {
        $randomString .= $characters[rand(0, $charactersLength - 1)];
    }
    return $randomString;
}

function generateRandomUserData()
{
    $char = "abcdefghijklmnopqrstuvwxyz1234567890";
    $numb = "1234567890";
    $f = array("Vasu","Nirmal","Akshay","Chander","Rupinder","Akhil","Shanti","Ravi","Kunal","Chandrakant","Sulabha","Mahinder","Swapnil","Deepa","Sulabha","Neelima","Vijaya","Nikhil","Isha","Siddhi","Ajeet","Kshitija","Anila","Jitender","Sumeet","Preethi","Priti","Gayathri","Dhaval","Mukesh","Lalita","Rachana","Rakhi","Harshal","Shekhar","Rajiv","Balakrishna","Ajeet","Tara","Chander","Deepa","Prabhu","Rajendra","Jeetendra","Nandu","Aniket","Sumati","Prabhu","Vimal","Indira","Laxman","Agni","Kapil","Kailash","Puneet","Pratik","Pankaj","Ishore","Swati","Rupa","Hardeep","Prabhu","Khushi","Gurmeet","Nishant","Rishi","Naveen");
$l = array("sameer","suresh","chettiar","jatin","chauhan","agarwal","rahul","tanmay","tiwari","kunal","rasania","sunil","kumar","gaurav","arihant","jain","falguni","yashashree","arpi","arshish","gupta","tanmay","samtgr","kiyera","atul","abhay","chandra","shoibaakriti","aanchal","talreja","aatholiy","abhijeet","akkalwar","abhijeet","bajpai","abhijeetsh","abhirup","roy","abhishek","sumit","kapil","rani","ramu","souvik","yogesh","umesh","sahadat","ankit","prasant","pravakar","sunil","sibaram");
    
    $deviceid = generateRandomString(16, $char);
    $imei = generateRandomString(16, $numb);
    $fname = $f[mt_rand(0, count($f) - 1)];
    $lname = $l[mt_rand(0, count($l) - 1)];
    $email = $fname . $lname . generateRandomString(5, $numb) . "@gmail.com";
    $number = mt_rand(61, 99) . generateRandomString(8, $numb);
    $firebaseid = generateRandomString(50, $char);
    
    return [
        'deviceid' => $deviceid,
        'imei' => $imei,
        'fname' => $fname,
        'lname' => $lname,
        'email' => $email,
        'number' => $number,
        'firebaseid' => $firebaseid
    ];
}
?>