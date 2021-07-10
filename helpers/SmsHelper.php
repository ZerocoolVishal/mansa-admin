<?php


namespace app\helpers;


use app\models\Appointments;

class SmsHelper
{
    const API_KEY = 'HCxF8MG1V2n0WiDKhaAcjq7mtsbLZReEBNlQOdfoPJkwXgyIz96lqchX1bCKx7i0EdOPsDroaHTG9vwk';

    public static function getBalance()
    {
        $curl = curl_init();

        curl_setopt_array($curl, array(
            CURLOPT_URL => "https://www.fast2sms.com/dev/wallet",
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 30,
            CURLOPT_SSL_VERIFYHOST => 0,
            CURLOPT_SSL_VERIFYPEER => 0,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "POST",
            CURLOPT_HTTPHEADER => array(
                "authorization: " . self::API_KEY
            ),
        ));

        $response_json = curl_exec($curl);
        $err = curl_error($curl);

        curl_close($curl);

        $response = json_decode($response_json);

        if(isset($response->wallet)) {
            return (int) $response->wallet;
        }

       return 0;
    }

    public static function sendSms($number, $message, $sender_id = 'IMPSMS')
    {
        $fields = array(
            "sender_id" => $sender_id,
            "message" => $message,
            "language" => "english",
            "route" => "p",
            "numbers" => $number,
        );

        $curl = curl_init();

        curl_setopt_array($curl, array(
            CURLOPT_URL => "https://www.fast2sms.com/dev/bulk",
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 30,
            CURLOPT_SSL_VERIFYHOST => 0,
            CURLOPT_SSL_VERIFYPEER => 0,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "POST",
            CURLOPT_POSTFIELDS => json_encode($fields),
            CURLOPT_HTTPHEADER => array(
                "authorization: " . self::API_KEY,
                "accept: */*",
                "cache-control: no-cache",
                "content-type: application/json"
            ),
        ));

        $response_json = curl_exec($curl);
        $err = curl_error($curl);

        curl_close($curl);

        $response = json_decode($response_json);

        //print_r($response);
        return $response;
    }

    public static function sendAppointmentMessage($phone, $status, $appointment_no, $name, $datetime, $doctor_name, $hospital_no = null, $sender_id = 'IMPSMS')
    {
        $status_appoint_no = "$status APT No. $appointment_no";

        $patient_name = $name;
        if(strlen($patient_name) > 15) {
            $nameArr = explode(' ', $patient_name);
            $patient_name = substr(trim($nameArr[0]),0, 15);
        }

        $doctor_name = substr(trim($doctor_name),0, 20);

        if($hospital_no == null) {
            $hospital_no = \Yii::$app->params['mobile_no'];
        }

        $field = array(
            "sender_id" => $sender_id,
            "language" => "english",
            "route" => "qt",
            "numbers" => $phone,
            "message" => "37734",
            "variables" => "{#FF#}|{#CC#}|{#DD#}|{#EE#}|{#BB#}",
            "variables_values" => "$status_appoint_no|$patient_name|$datetime|$doctor_name|$hospital_no"
        );

        $curl = curl_init();

        curl_setopt_array($curl, array(
            CURLOPT_URL => "https://www.fast2sms.com/dev/bulk",
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 30,
            CURLOPT_SSL_VERIFYHOST => 0,
            CURLOPT_SSL_VERIFYPEER => 0,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "POST",
            CURLOPT_POSTFIELDS => json_encode($field),
            CURLOPT_HTTPHEADER => array(
                "authorization: " . self::API_KEY,
                "cache-control: no-cache",
                "accept: */*",
                "content-type: application/json"
            ),
        ));

        $response_json = curl_exec($curl);
        $err = curl_error($curl);

        curl_close($curl);

        $response = json_decode($response_json);

        return $response;
    }

    public static function sendAppointmentSMS(Appointments $appointment) {

        $status = ($appointment->status == 1)? 'CONFIRMED' : 'CANCELED';
        $date = AppHelpers::formatDateTime($appointment->date, 'd M Y h:i A');

        return self::sendAppointmentMessage(
            $appointment->phone,
            $status,
            $appointment->appointment_no,
            $appointment->name,
            $date,
            $appointment->doctor->name
        );
    }
}