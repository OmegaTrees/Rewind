<?php
date_default_timezone_set('Africa/Johannesburg');
            $current_time = new DateTime();
//Business of the day
require_once('Tools-telkom-v2.php');
system('clear');
$scoreTarget = TargetScore();
$number3 = GetTargetScore(1);


echo "\nOur target score is: $number3";
    


$cookiez = ['XSRF-TOKEN=eyJpdiI6IkFrMS9sVCtsc1B1dzFZVUpXWWR5ZFE9PSIsInZhbHVlIjoiSWwrakhVc1o5b3Q4ZTRlL0JGTkhqYkxaWnp6bzZ0aVMzODM0ck54MjRaNU9ZRklqeEhxZTMxcnVOZ0t5dXljWE9Gd1pZNjZ5Q1VTOXV1MGpjTi9pOUxTRzlLK0Y2bTQ3K2paU0Y1VmFzN2JHai9EdmgzVzEyMzNsQ2g2UjhSbFIiLCJtYWMiOiJiMDQyZGZlYTZhOTZmNzEyNjdkODg3OGJiZGM3NDhlZGVjZjYxZTQxZTY1OTZhY2UwOTI0YThkYTA3ZDY3MDdmIiwidGFnIjoiIn0%3D; yello_rush_session=eyJpdiI6InEzR2kvN2c1eDA4aDljbzdqSEt4a0E9PSIsInZhbHVlIjoiZThlc21uOVliU09NNWZWckpqblZSdDBTWjJEUkUyYUVzY2czbjZPVnAzdk1JZ3lYcjRmd2p5TnVFYmhJZ1ZWUXZaOXMzcjdwdFpIQnlpM3RhNFlCSkFvT3VhMllzeTFYUk1aWjZSZmJLbjMxUGpCdFpGdTF4a2xTdDh6RTJSNDEiLCJtYWMiOiI2NjkyYjYxNjlhYjJhNzc1OWQ4MTFmZGQ0YWRmMGFmZGU2NzM3ZDhkMGM4Yzk2OTJjNjNjNzZlYWRmNmU2OGViIiwidGFnIjoiIn0%3D',

'XSRF-TOKEN=eyJpdiI6IlFQcHYwdW00ZkNmSzhTb2t6aEtZR3c9PSIsInZhbHVlIjoiN3B6NEtLVmdVd3dKTmxGSU1MZkRpV3UzcmY3dXhiL2FVN1RKdzA5c0E1dFVyeGhmdldvTWo4MjlhWVZmVUQ2cnZqNy9KSG9Lb281dlFmTDZaWm5TMUw3a3Bkb2V1cmQ2Rks5SStRQ0FzVTlJdlRKYXhPbVVFT0p5RVp0UWkvWUYiLCJtYWMiOiIyOTM4MzhlNGNkYjc1YzhkNDY3Njk2NTA1Zjk5ODA0NzM4M2E2YzJkZTU3M2YxODg5ZDFmNGE3OTU2NzRmOGJiIiwidGFnIjoiIn0%3D; yello_rush_session=eyJpdiI6IlpCdnRXQ0JKcmRKbE05cEVRYU9MUHc9PSIsInZhbHVlIjoieXFMUk4zZTFPVHltRnI5OEZnMGNTcWVORGRBT3c1VDgvY1NNbnIzOGZOd01nS1VtbmIzMDlMMDlsajNzTzBMQWVHYnN4b1Q5TFNhNitIUGFrb3VYTVpKRUxLWlFVYklLZ3BUUTJHditMYkJDNVZMcUNTeUpPWlg2SC9pNCtEdGUiLCJtYWMiOiJhYmQxOTNiOWU4MzcwMGY4NjE1YTg0MWI5NGZhYjc3MTA3ZTk5OGZiMDAzYTAzMjhjMzFhMzdmM2UwMDdmOWJjIiwidGFnIjoiIn0%3D'

];

$cookie = "XSRF-TOKEN=eyJpdiI6ImZGTm9WUWZaaXZyRWhSWjE5d2syd2c9PSIsInZhbHVlIjoiV0pZYzkrOVgzQ1c4STgzNlZRTUprV2piTzJXRDF1SE9CSTd2Yzh5Z1REbTVZS1cxeTNoQ050cEtMTHNHNFRHL0NHQTJ3cXNHOXlmUDY0OUVGL1VLODI1QW1BVHp1akJvZmZldm1VSm9rWGNCRmI1ZGhZc1VNbWlqTlJ4L3VUM3ciLCJtYWMiOiJmNTM4NzY4MjkyZjQ3NGNiNTg1MDcyM2JkYzllY2QyZDI1NmJlYTk1MmNmODRjOTVlZmNmZTA1ZGZmMDg4Y2ZhIiwidGFnIjoiIn0%3D; wozagames_mzansi_games_session=eyJpdiI6IlFoQ3RQQlRUVFlEcElZc21HMkN3N0E9PSIsInZhbHVlIjoiekdldG5aTVBRWklYRENGRnlUK2xJbmRCaXRuaFp1Z090K3dGd3QxRzQvR283emNrMStTSEJnbDlRTWplZVRxLzZVV21qVTZidGJQeWZCd0pVOXl3YWw4b1ZaQ0lrZGpFVmtrWVYzVXliL05UTXhicU9uTlpIT0pPalRpVVhNZ2siLCJtYWMiOiI2ZmNkNjM1ZmI4NTA4OTAzZGE4NGE3NTBmZWVkZTUyMjc4MDc3ODE0ZTZjZGY5ZmI1ZWNkZmQ2NzIwNTU2NjVmIiwidGFnIjoiIn0%3D";
//   foreach ($cookiez as $cookie){ 
$pos = GetPosition ($cookie);


        
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, 'https://www.wozagames.com/play-now');
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'GET');
        $headers = array(
            'Accept: text/html,application/xhtml+xml,application/xml;q=0.9,image/avif,image/webp,image/apng,*/*;q=0.8,application/signed-exchange;v=b3;q=0.7',
            'Accept-Language: en-US,en;q=0.9',
            'Cache-Control: no-cache',
            'Connection: keep-alive',
            'Cookie: '.$cookie,
            'Pragma: no-cache',
            'Referer: https://www.wozagames.com/',
            'Sec-CH-UA: \"Safari\";v=\"15\", \"AppleWebKit\";v=\"605\"',
            'Sec-CH-UA-Mobile: ?1',
            'Sec-CH-UA-Platform: \"iOS\"',
            'Sec-Fetch-Dest: empty',
            'Sec-Fetch-Mode: navigate',
            'Sec-Fetch-Site: same-origin',
            'Upgrade-Insecure-Requests: 1',
            'User-Agent: Mozilla/5.0 (Linux; Android 8.0.0; SM-G955U Build/R16NW) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/116.0.0.0 Mobile Safari/537.36'
        );
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
        $curl = curl_exec($ch);
        $redirectedUrl = curl_getinfo($ch, CURLINFO_EFFECTIVE_URL);
                    
        curl_close($ch);
        $query_str = parse_url($redirectedUrl, PHP_URL_QUERY);
        parse_str($query_str, $query_params);
        $unique_id = isset($query_params['unique_id']) ? $query_params['unique_id'] : '';
        $game_id = isset($query_params['game_id']) ? $query_params['game_id'] : '';
        $sigv1 = isset($query_params['sigv1']) ? $query_params['sigv1'] : '';

       // echo "<br>Uniquie_id: $unique_id<hr>";
        //echo "<br>Game_id: $game_id<hr>";

        ###################
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, 'https://www.wozagames.com/new-game-check-user-status/'.$unique_id.'/'.$sigv1.'');
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'GET');
        $headers = array(
            'Referer:'.$redirectedUrl,
            'Sec-CH-UA: \"Safari\";v=\"15\", \"AppleWebKit\";v=\"605\"',
            'Sec-CH-UA-Mobile: ?1',
            'Sec-CH-UA-Platform: \"iOS\"',
            'Sec-Fetch-Dest: empty',
            'Sec-Fetch-Mode: navigate',
            'Sec-Fetch-Site: same-origin',
            'Upgrade-Insecure-Requests: 1',
        );
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
        curl_setopt($ch, CURLOPT_HEADER, 1);

        $curl = curl_exec($ch);

        // Separate headers and body
        $header_size = curl_getinfo($ch, CURLINFO_HEADER_SIZE);
        $header = substr($curl, 0, $header_size);
        $body = substr($curl, $header_size);
        curl_close($ch);

        
        
        $x_power = X_Power($header);
        echo "\n<br> X-Powered-Version: $x_power\n";

       

        if(($pos >= 1 && $pos <=2 )|| $pos == 0){
                $score = rand(30,50);
        }else{
            
            
            $score = rand($number3,($number3+rand(35,10)));
             
            
            
             
            
        }
        
        $increment = 1;
        
            
            
            // if (in_array($current_time->format('i'), ['50','54','55','57', '58', '59'])) {
                
            //    // if ($pos>=6 || $pos ==0){
            //  // $score =  rand(500,1000)+$number3;
           
            //     $score = rand($number3,($number3+rand(10,5)));
           
            // //  if (in_array($current_time->format('i'), ['55','57', '58', '59'])) {

            // //  if ($number3 >= 45000){
            // // return;
            // //  }

            // }
               /// }
               
            //if($score <40000){
              //  $score+= rand(10000,20000);
           // }
            // sleep(5);
       // }
// $score += rand(100,500);
 while($score>=2000){
        
        $score = $score - rand(50,100);
    }

   // $score = rand(20000,30000);

    // $score = round($score, -1);
        ///////////////////////////
        $uA = RandomUa();
        
        //echo "\n<br>UA used => $uA\n";
        $memory = validate_request($x_power,$score);
        $OnePieceIsReal = generateRandomDivisionData($score,$redirectedUrl,$x_power,$memory,$increment,$uA);


        


//}


