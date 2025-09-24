<?php
/**
* Check the validity of the SL Number
* @author   Simeon Michael
*/
define('NUM_LENGTH_WITHOUT_COUNTRY_CODE',9);
define('NUM_LENGTH_WITH_COUNTRY_CODE',12);
define('SL_COUNTRY_CODE', ['+232','00232']);
define('VALID_SL_NDC',['30','31','32','33','34','72','73','74','75','76','77','78','79','80','88']);

/**
 * Checks for the validity of the SL number provided
 * If the number is not a valid SL Number a boolean false is returned
 * Else, the formatted number with SL country code is returned
 * @param string $phone_number The phone number to be validated
 * @return bool|string
 **/
function isPhoneNumberAValidSLNumber(string $phone_number): bool|string
{
    if(preg_match('/[a-zA-Z]/',$phone_number)){
        return false;
    }

    $phone_number = preg_replace('/[\s\(\)\-\.]/', '', $phone_number);

    //change '00' to '+' at the start of a number
    if(str_starts_with($phone_number,'00')){
        $phone_number = '+' . substr($phone_number,2);
    }

    if (strlen($phone_number) === NUM_LENGTH_WITH_COUNTRY_CODE) {
        $country_code = substr($phone_number, 0, 4);
        $ndc = substr($phone_number, 4, 2);
        $subscriber_number = substr($phone_number, 6);

        if (!in_array($country_code,SL_COUNTRY_CODE)) {
            return false;
        }

        if (!in_array($ndc, VALID_SL_NDC)) {
            return false;
        }

        if (strlen($subscriber_number) !== 6) {
            return false;
        }

        return $phone_number;

    } elseif (strlen($phone_number) === NUM_LENGTH_WITHOUT_COUNTRY_CODE) {
        $ndc = substr($phone_number, 1, 2);
        $subscriber_number = substr($phone_number, 2);

        if (!in_array($ndc, VALID_SL_NDC)) {
            return false;
        }

        if (strlen($subscriber_number) !== 7) {
            return false;
        }

        return SL_COUNTRY_CODE[0] . substr($phone_number,1);
    }

    return false;
}
