<?php
//echo "cool down";return;
system("rm -rf cache");

require_once '/var/www/html/newupdate/Zebra_cURL.php';
$curl = new Zebra_cURL();
$curl->cache('/var/www/html/newupdate/cache', 59);
$curl->ssl(true, 2, '/var/www/html/newupdate/cacert.pem');
$curl->threads = 10;
$curl->option(CURLOPT_TIMEOUT, 3600);
@unlink('cache');

$starttime = microtime(true);

for ($i=0; $i<2;$i++){
$c_values = [
"XSRF-TOKEN=eyJpdiI6Ii9oS3hoQkRKZ1pvV3lWQTJPL1BWSnc9PSIsInZhbHVlIjoibW4wZG5GREFQd283aURwM1BGSURaZkx1Z3FhNmpoQ0JWdEMrYlk4bmppN2N1WDZzSUlTR2Q5NlVwUmNkQ2lZN1dPSStRQW4yaFE1cnlwcUtzaTgxd3Bmb0hueFlpRXZVSzdyNy9YR200WHNEYjVVTWs5RWp3WFRNajFFczJyZHEiLCJtYWMiOiI4ZjA5Mjg3MDM4Njc4M2NlNTY3MDg3NjM4MjAzYTRiOTg4MzMzMjM3MmIxMGJjMjdhMjJmODU3NjcxNWM0ZTU2IiwidGFnIjoiIn0%3D; yello_rush_session=eyJpdiI6InhVMnl4d1VEeUlWeDBkNW9MeGlLdHc9PSIsInZhbHVlIjoiak5Ya1RYcDVpTmZqRE5XSFQ5SGgwb2xvUWFQTmFFUlA4ZUJITUJEMGEvWmVDdWpxQWdsNnZIK3Y1VUFHOGtjTHd6c1VuNVhVOVovYTdzbmQxVHJnTlNreVJya0tUY0tnZFVHSURwRm8ySU9uaFFrZ1ZwaDZ0Nk4rRlVsOVc4K1AiLCJtYWMiOiI0OGU0NTMzYmMzZTg3NzkxNWE1YWNmZmQ3OWJiOTIxZmMwNmEwOWIyMTA3YjM5ZTY1YTRlMjk1YjBhYmI0ZjUxIiwidGFnIjoiIn0%3D",
    
"XSRF-TOKEN=eyJpdiI6IjVKWXFDSTQ1R3RGamhNUzYyVzNtcVE9PSIsInZhbHVlIjoiM0RyTlY4M1dWTGJYMUNGcmJFalVWcWtobExmbTltdzIrM3NvOEhEQjNiT25yRnV1amFLSlhuNnlkMkNHWHA2Q1RFRllJWUtRMWI3UWJ1R1BxRHk2Q1ByUFB2cEJzdlIxWnU1WTJpWUZZd3lRejBMNWtvUTN5MFhEMVgzTG4rN0YiLCJtYWMiOiI1NmMzZDE5MzQ2NTk4NzdiY2ZmMTQ5NGQwZDdmYzJmNzY2ZGVlMTM1YjNhNDA3NGI3ZWNhYjI5YjZjNTQ4NTZiIiwidGFnIjoiIn0%3D; yello_rush_session=eyJpdiI6IjMvSWZlT0dyUVdVdVN4aXhLeGt4enc9PSIsInZhbHVlIjoicmZmYVFYUzhOMEwvT1dnTm1OSDhVS2gyaEtsVnJvVmsxd3hqVzBxWGlZZmVMZTVtOFd6b0V5UnlUV0o4dE53cFZBZDhyS2VMZ3B0QkhNMzFCelRqYkttMnBXaWNvRlRMNmFYK2N1Tk1tUndIMTYyK2NkS0FzbjlIS1gwYThDRGkiLCJtYWMiOiI3NDNhMzliY2Q0OTIyYTEyMmQ4ZDQ2MjJjZjhlNjBmZjhjMTNjNzhmMTg3NGRmZjVkNzFjYzcyNjQwNDllODk1IiwidGFnIjoiIn0%3D",

"XSRF-TOKEN=eyJpdiI6IktvbDNmQ2Zoc3Iyd3I4bGJwQ2k2emc9PSIsInZhbHVlIjoieFNYV1RFSTJ6WkZSaDBVTnNjVnRQb3RZWWVTQTVjR05wOXViZndPeHdZM1EwUjhTTnNKMWU5eUxtclVYTkprZUdDSVZWejVUOGtOMVdack5JYmNTckt1RUszRXppUFBBSTRwNjRPSEtoWEhVci85VWV0eUZVblpCMmk1M3I1SkIiLCJtYWMiOiJjZTljYTE5NTA1NTZjMGNlNmVhM2YyNDhmYTMyZGVjMTdkZGVmMTZhMDVkOTg0ZWQyZWY1MjhmYmIyYWQxMGNiIiwidGFnIjoiIn0%3D; yello_rush_session=eyJpdiI6IkhjRUZFUkRNZi9yZys0UmJsWCtCR1E9PSIsInZhbHVlIjoiVHI3Q2RvTVg5RHM4L1NsdWdLY2VwMG1HNlh4WlNXNndBTFVzVXZoNllxMEF0Q1pTR3dyYnEyV0h6T01TbUpRa25YcUFGN0l3UkxIQk5zWk5ZWEsyZFRGZzIxV3pUWDY3MUNHQjN5WnJHTkNSNWxYQlpHUFRpckg3T2w0OTVTVysiLCJtYWMiOiJkZTliYzBiZjhiODQwOTE0ODNjYjExZjhmM2M3Y2Y4ZmYzOTViNjM3MzE2MWY2YzM5ODc4ZjU1ZWQzYjRmYjFhIiwidGFnIjoiIn0%3D",

"XSRF-TOKEN=eyJpdiI6Ikt4MGZtN0tia1dFZFZTcEZ0MHJBYWc9PSIsInZhbHVlIjoiRjZ2dTUxOWRPdmlHSTFsQmkxK1NuRm5sS3VNODltalI2dEhGMXNFNmRjd0paSUpzRmYzMExrTDdYS0FiYkk5VmdwVUxydjJZRnJaVDRjdDhPUzBJV005T3Z5K3g3TWdEMXd4aFgwemR0M3dyRFh4NmViTjJXT3gzNGVwMU9iak0iLCJtYWMiOiIxNzQ1ZGJlNDIxOTNjM2E5ZWZmZDQ5YjIwMGEyNmFjYjAzNGQ5ZjdlYWZjMDNlYWYwODE2ZDU5NDczOTg2NWI4IiwidGFnIjoiIn0%3D; yello_rush_session=eyJpdiI6IldBQzZ3dGhCazROSjA4cGNndTBFblE9PSIsInZhbHVlIjoiV2I4NWJrbk1LaXE5US9FVnptTkIwR05JelNkT3JPQmp6aWVVbjBQVGdkTlYwNGZwbEVLUFFiRE9FR0QvR1pRaHFuQ2FRcmgreCtaalg4TDlid0hYSFh4SVFXa1prc1dEdWZFYlpiSXhHblhQN0M1cnJ4dm1KYVBGMC93OENTbEwiLCJtYWMiOiJhMzI0Njg5YTEwNjViMmNlNDE2OTk5ZGU3NjEzODhjNGI4NjVlMDNjY2M4NzU5ZjRhMDEwY2FiNTMzYjM1YWYxIiwidGFnIjoiIn0%3D",

"XSRF-TOKEN=eyJpdiI6Ik1jN3FHRUJjNTdiRVlnWFI4bTU5YWc9PSIsInZhbHVlIjoiWEliUmUvZiszMUdOaTR1ei80QnVwTXVONHZjR2s2NE82clV1VXhOR3lTakJZTkZJeTNNeWUyNWFKWm1iQWQ0dlo2c3JrU01yN1Q5RmwxK0NBODk0ZG96emQvTFJtRzkrQ1ZNb3RsMUZzekFlQW9LTkkvVDlMemEzMWMralpwdDYiLCJtYWMiOiIzMzM2OTMwMjU1MzZkNzk4Y2IxOWIwZDkxYTc3YmNjNGRhNmE0NTE4MTEwY2E4M2UzOTMxZmNlMzk5ZWM0YzQ5IiwidGFnIjoiIn0%3D; yello_rush_session=eyJpdiI6Imw2SGRNbW84RWY5TEZqVGxNUVI3eFE9PSIsInZhbHVlIjoiRUsrcENCOEVYU1lCQ1VDMmZSc1M2YjBWUGN2UEd0SjZFTGlYQVY5N0xzbktPbEtrOFdka2VrMlZMb0dlRVB2NStPYTNHZU03Zm5YWWRrRHhzZUNvZVNNb2NJL0laZG9ZY1BMcHk0SlJIVURGTWtQMVA3TkRpRzFpOUNvb09LMU0iLCJtYWMiOiI0MDQ3ZGFhZWFlZjZjZGU5YzFjMDdlODg5YmVlYTQwOTMxN2EwNmE0MmI5OTBkMDJhMjI3OTA0MWYwOWI0MDk0IiwidGFnIjoiIn0%3D",

"XSRF-TOKEN=eyJpdiI6Imt1TmQ2RkE2VEVpcUtXUmlwYktJS2c9PSIsInZhbHVlIjoiTVpab1NGMkhBdzZ4ak5XblRSNThVRmRlejFpeGU4VExGY3dKSnByZFFYTkI4c214b0pxbDF3NXYxeHBvTUpYQmtsWnhCL2ZJQ0xUaitIZmF2R1JjNjlidm5mSUZVNHRtd3BsaEM3cW0yN2FsTHk2amNSd3krdkg2cGdibStlQnQiLCJtYWMiOiJjZjhiNmJkNGJhNzJjZGZjM2E4NWRjZmM2NWUzYjJhZjBlZWRhOTcyMjQ2NDE5ZTViOTkzOTEyNzNhN2RiYTVmIiwidGFnIjoiIn0%3D; yello_rush_session=eyJpdiI6IkVzTmNGNE8zK3c2VzdwYmJCQXlaM3c9PSIsInZhbHVlIjoiam14R1dvVWl0U0Q3VHRlNlVSeFpPNHlTamRYTkIyb3kyZ2wzV3BLMFBrSXF2amNWcm13SVVPK0hoekpLSklMaWRrcU5ENUNlWW44R3ZOUHc2Zmo1WmU3dUloZDlLcllHcWk0UXJaQVhRYkx0djdOeEdVYXhSdUNIKzNreE9mNGsiLCJtYWMiOiI0ZGQyZmZlZWMwYTk5Y2MyYWQwNGFkY2YzZWUwNzhiNjg2NDQwZWJkMWY4NGY4Mjk0ZGYyNzA3ZWEzNWU5NWFkIiwidGFnIjoiIn0%3D",

"XSRF-TOKEN=eyJpdiI6Im84M0JNL3phUklqN1hXZWpxTTBGWFE9PSIsInZhbHVlIjoiaGJkdTA4Y0R6Sk13Z2Q3QTNRNEYwMmhCWW5BblhhUURYcVZ2Y2wxUTh2c2lObFd6eWd2OHlWVmJsWUZheU5GQTYraGgzN3UrK0VPcVhLL0ttS0JmNFJWdS9hVFVHUkVhd3JLeEd3d3Z1b2FZK2YrdHZ0ZWlmZzRJV0sxYmptWGUiLCJtYWMiOiIzNmJlMzJlMmVhZmE2N2M3ODNjYmI4NzkyZjQ0MDE1NzQyNWJiNmQzZTkxMDEwMzc3MTM4MmY2NzRlNzcyNTFhIiwidGFnIjoiIn0%3D; yello_rush_session=eyJpdiI6InBHRXZnMWFEL0E3UXJBUGJ5cTJvVmc9PSIsInZhbHVlIjoiem9scGdNbFdhUGRoeTkrdVkvekFKWVN6dUVkNUlyZkpMZUxxTUxZWTIzYXBLRUVtcWRFWUo5MGdOQ1pmaFZuWjNOYXl2RjdFSU5EZDB0UDczb0owYWpWRUJURFVyMlU5SFVGcU9lRUZEZWc0eXN3aTdiY3g5elZKNEFmQzA1czMiLCJtYWMiOiI1MTQ1ZWFhMjA4YWVmMjY1YzE0YzAzODQ4Mjc5ZjQxM2Q2NjU1MWI1NjFhMDBhNGIxYzJjOGY3YTcyMzhlYTA1IiwidGFnIjoiIn0%3D",


"XSRF-TOKEN=eyJpdiI6Im5ZZHZKRlRxZ09VSkdtdHZNNTI1WkE9PSIsInZhbHVlIjoieHZkVFArTVVyZEtQWE5OVTFNTmcrc05hdStZRnpyMnBaR0c1QktxUTJzS0hnbUJLSWdGUzRDRFd6NlpBVmtrTlFBQ2FXenZmenVSUmphZzRPVmp2V2FmMlM0VUtzSEY4U3hhaFB3OWl0OE8rOUg3d0cxaEt0YWhlVW1IYkN2akQiLCJtYWMiOiI2MjYxZTlhZWQyYzQwZDk3ZGNmYWFhZDBmMTQ2NjRhYjlhY2UzY2Q2MzZiMWU4NGYzMzM5Nzk2ODk5NDVkZWYwIiwidGFnIjoiIn0%3D; yello_rush_session=eyJpdiI6ImUrMGdVMEhUQi9QWGU0WWNwVHJxVHc9PSIsInZhbHVlIjoiUDV1amd6ZFpET2NHVWIvZzZwNktsZS9zUHBNRk9DZGxFK044aHBONzE1a1Brb3Z6WUNUNjdLQTBLZTIrbmVUeXpCYmJmY0VOb1lKU1FSbjhiUWUxdG83YXBWMjBmclhHckdiYnZCQkJnenZmR3ZNWlJJamk2WkJ2SnBQcGU3Y3QiLCJtYWMiOiI4ZTc4ZGJhNGM3YmZjNTY2NWQxMTljOTdkOTJlN2Q4NTA3ZjQ1MzI0ZTQ4ZjNhNjM1ZDNiMTdhOGViYjI1Zjg2IiwidGFnIjoiIn0%3D",

];

$urls_ar = array();
foreach ($c_values as $c) {
    $url = 'http://102.209.117.85/newupdate/xavi-mtn.php?c=' . urlencode($c);
    array_push($urls_ar, $url);
}

// Define batch size and delay
$batch_size = 3;
$delay = 30; // 1 minute 20 seconds in seconds

// Calculate the number of batches
$num_batches = ceil(count($urls_ar) / $batch_size);

echo "Starting to process " . count($urls_ar) . " requests in $num_batches batches...\n";

// Process each batch
for ($i = 0; $i < $num_batches; $i++) {
    $start = $i * $batch_size;
    $batch_urls = array_slice($urls_ar, $start, $batch_size);
    $completed = 0;

    echo "Processing batch " . ($i + 1) . " with " . count($batch_urls) . " requests...\n";

    // Send requests for the current batch
    $curl->get($batch_urls, function($result) use (&$completed) {
        if ($result->response[1] == CURLE_OK) {
            echo 'Success: ', $result->body;
        } else {
            echo 'Error: ', $result->response[0], PHP_EOL;
        }
        $completed++;
    });

    // Wait for all requests in this batch to complete
    while ($completed < count($batch_urls)) {
        usleep(100000); // Sleep for 0.1 seconds to avoid busy-waiting
    }

    echo "Batch " . ($i + 1) . " completed.\n";

    // Wait 80 seconds before the next batch, except after the last batch
    if ($i < $num_batches - 1) {
        echo "Waiting $delay seconds before the next batch...\n";
        sleep($delay);
    }
}

$endtime = microtime(true);
$duration = $endtime - $starttime;
echo "All batches processed. Total execution time: " . $duration . " seconds\n";
}
