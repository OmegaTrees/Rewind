<?php

//echo "cool down";return;
system('sudo rm -rf cache');
require_once '/var/www/html/newupdate/Zebra_cURL.php';
$curl = new Zebra_cURL();
$curl->cache('/var/www/html/newupdate/cache', 59);
$curl->ssl(true, 2, '/var/www/html/newupdate/cacert.pem');
$curl->threads = 10;
$curl->option(CURLOPT_TIMEOUT, 2400);
@unlink('cache');

$starttime = microtime(true);

$c_values = [
"XSRF-TOKEN=eyJpdiI6Ii9oS3hoQkRKZ1pvV3lWQTJPL1BWSnc9PSIsInZhbHVlIjoibW4wZG5GREFQd283aURwM1BGSURaZkx1Z3FhNmpoQ0JWdEMrYlk4bmppN2N1WDZzSUlTR2Q5NlVwUmNkQ2lZN1dPSStRQW4yaFE1cnlwcUtzaTgxd3Bmb0hueFlpRXZVSzdyNy9YR200WHNEYjVVTWs5RWp3WFRNajFFczJyZHEiLCJtYWMiOiI4ZjA5Mjg3MDM4Njc4M2NlNTY3MDg3NjM4MjAzYTRiOTg4MzMzMjM3MmIxMGJjMjdhMjJmODU3NjcxNWM0ZTU2IiwidGFnIjoiIn0%3D; yello_rush_session=eyJpdiI6InhVMnl4d1VEeUlWeDBkNW9MeGlLdHc9PSIsInZhbHVlIjoiak5Ya1RYcDVpTmZqRE5XSFQ5SGgwb2xvUWFQTmFFUlA4ZUJITUJEMGEvWmVDdWpxQWdsNnZIK3Y1VUFHOGtjTHd6c1VuNVhVOVovYTdzbmQxVHJnTlNreVJya0tUY0tnZFVHSURwRm8ySU9uaFFrZ1ZwaDZ0Nk4rRlVsOVc4K1AiLCJtYWMiOiI0OGU0NTMzYmMzZTg3NzkxNWE1YWNmZmQ3OWJiOTIxZmMwNmEwOWIyMTA3YjM5ZTY1YTRlMjk1YjBhYmI0ZjUxIiwidGFnIjoiIn0%3D",
    
"XSRF-TOKEN=eyJpdiI6IjVKWXFDSTQ1R3RGamhNUzYyVzNtcVE9PSIsInZhbHVlIjoiM0RyTlY4M1dWTGJYMUNGcmJFalVWcWtobExmbTltdzIrM3NvOEhEQjNiT25yRnV1amFLSlhuNnlkMkNHWHA2Q1RFRllJWUtRMWI3UWJ1R1BxRHk2Q1ByUFB2cEJzdlIxWnU1WTJpWUZZd3lRejBMNWtvUTN5MFhEMVgzTG4rN0YiLCJtYWMiOiI1NmMzZDE5MzQ2NTk4NzdiY2ZmMTQ5NGQwZDdmYzJmNzY2ZGVlMTM1YjNhNDA3NGI3ZWNhYjI5YjZjNTQ4NTZiIiwidGFnIjoiIn0%3D; yello_rush_session=eyJpdiI6IjMvSWZlT0dyUVdVdVN4aXhLeGt4enc9PSIsInZhbHVlIjoicmZmYVFYUzhOMEwvT1dnTm1OSDhVS2gyaEtsVnJvVmsxd3hqVzBxWGlZZmVMZTVtOFd6b0V5UnlUV0o4dE53cFZBZDhyS2VMZ3B0QkhNMzFCelRqYkttMnBXaWNvRlRMNmFYK2N1Tk1tUndIMTYyK2NkS0FzbjlIS1gwYThDRGkiLCJtYWMiOiI3NDNhMzliY2Q0OTIyYTEyMmQ4ZDQ2MjJjZjhlNjBmZjhjMTNjNzhmMTg3NGRmZjVkNzFjYzcyNjQwNDllODk1IiwidGFnIjoiIn0%3D",

"XSRF-TOKEN=eyJpdiI6IktvbDNmQ2Zoc3Iyd3I4bGJwQ2k2emc9PSIsInZhbHVlIjoieFNYV1RFSTJ6WkZSaDBVTnNjVnRQb3RZWWVTQTVjR05wOXViZndPeHdZM1EwUjhTTnNKMWU5eUxtclVYTkprZUdDSVZWejVUOGtOMVdack5JYmNTckt1RUszRXppUFBBSTRwNjRPSEtoWEhVci85VWV0eUZVblpCMmk1M3I1SkIiLCJtYWMiOiJjZTljYTE5NTA1NTZjMGNlNmVhM2YyNDhmYTMyZGVjMTdkZGVmMTZhMDVkOTg0ZWQyZWY1MjhmYmIyYWQxMGNiIiwidGFnIjoiIn0%3D; yello_rush_session=eyJpdiI6IkhjRUZFUkRNZi9yZys0UmJsWCtCR1E9PSIsInZhbHVlIjoiVHI3Q2RvTVg5RHM4L1NsdWdLY2VwMG1HNlh4WlNXNndBTFVzVXZoNllxMEF0Q1pTR3dyYnEyV0h6T01TbUpRa25YcUFGN0l3UkxIQk5zWk5ZWEsyZFRGZzIxV3pUWDY3MUNHQjN5WnJHTkNSNWxYQlpHUFRpckg3T2w0OTVTVysiLCJtYWMiOiJkZTliYzBiZjhiODQwOTE0ODNjYjExZjhmM2M3Y2Y4ZmYzOTViNjM3MzE2MWY2YzM5ODc4ZjU1ZWQzYjRmYjFhIiwidGFnIjoiIn0%3D",

"XSRF-TOKEN=eyJpdiI6Ikt4MGZtN0tia1dFZFZTcEZ0MHJBYWc9PSIsInZhbHVlIjoiRjZ2dTUxOWRPdmlHSTFsQmkxK1NuRm5sS3VNODltalI2dEhGMXNFNmRjd0paSUpzRmYzMExrTDdYS0FiYkk5VmdwVUxydjJZRnJaVDRjdDhPUzBJV005T3Z5K3g3TWdEMXd4aFgwemR0M3dyRFh4NmViTjJXT3gzNGVwMU9iak0iLCJtYWMiOiIxNzQ1ZGJlNDIxOTNjM2E5ZWZmZDQ5YjIwMGEyNmFjYjAzNGQ5ZjdlYWZjMDNlYWYwODE2ZDU5NDczOTg2NWI4IiwidGFnIjoiIn0%3D; yello_rush_session=eyJpdiI6IldBQzZ3dGhCazROSjA4cGNndTBFblE9PSIsInZhbHVlIjoiV2I4NWJrbk1LaXE5US9FVnptTkIwR05JelNkT3JPQmp6aWVVbjBQVGdkTlYwNGZwbEVLUFFiRE9FR0QvR1pRaHFuQ2FRcmgreCtaalg4TDlid0hYSFh4SVFXa1prc1dEdWZFYlpiSXhHblhQN0M1cnJ4dm1KYVBGMC93OENTbEwiLCJtYWMiOiJhMzI0Njg5YTEwNjViMmNlNDE2OTk5ZGU3NjEzODhjNGI4NjVlMDNjY2M4NzU5ZjRhMDEwY2FiNTMzYjM1YWYxIiwidGFnIjoiIn0%3D",

    ];

$urls_ar = array();
shuffle($c_values); 
$randomItems = array_slice($c_values, 0, 3); 
foreach ($randomItems as $c) {

    
  $url = 'http://102.209.117.85/newupdate/xavi-test.php?c=' . urlencode($c);


array_push($urls_ar, $url);

}



$curl->get($urls_ar, function($result) {
    if ($result->response[1] == CURLE_OK) {
        echo 'Success: ', $result->body;
    } else {
        echo 'Error: ', $result->response[0], PHP_EOL;
    }
});

$endtime = microtime(true);
$duration = $endtime - $starttime;
echo "Execution time: " . $duration . " seconds";

