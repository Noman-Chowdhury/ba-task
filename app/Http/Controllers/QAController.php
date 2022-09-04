<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class QAController extends Controller
{
    public function question1()
    {
        $ch = curl_init('http://103.219.147.17/api/json.php');
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_HEADER, 0);
        $response = curl_exec($ch);
        curl_close($ch);

        $strings = json_decode($response, true)['data'];

        preg_match_all('#speed=([^\s,]+)#', $strings, $matches); // get all speed= string
        foreach ($matches[1] as $key => $speed) {
            if ($speed > 60) { //get those speed value which is greater then 60
                echo $speed . '<br>';
            }
        }
        exit();
    }

    public function question2()
    {
        $array = array('0' => 'z1', '1' => 'Z10', '2' => 'z12', '3' => 'Z2', '4' => 'z3'); //given array
        uasort($array, function ($a, $b) {
            return strnatcasecmp($a, $b);
        });
        print_r($array);
    }

    public function question3()
    {
        $ip = \request()->ip;
        if (!$ip or strlen(trim($ip)) == 0) {
            echo 'No IP address given <br>';
            echo 'pass the ip_address in url. example: {base_url}/solution/3?ip=WHATEVER_IP';
            return false;
        }
        $ip = trim($ip);
        if (preg_match("/^[0-9]{1,3}(.[0-9]{1,3}){3}$/", $ip)) {
            foreach (explode(".", $ip) as $block)
                if ($block < 0 || $block > 255)
                    return false;
            return true;
        }
        return false;
    }
}
