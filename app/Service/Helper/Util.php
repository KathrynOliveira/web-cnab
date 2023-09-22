<?php

namespace App\Service\Helper;

class Util 
{
    public static function remove($i, $f, &$array)
    {
        if (is_string($array)) {
            $array = preg_split('//u', rtrim($array, chr(10) . chr(13) . "\n" . "\r"), -1, PREG_SPLIT_NO_EMPTY);
        }

        $i--;

        if ($i > 398 || $f > 400) {
            throw new \Exception('$ini ou $fim ultrapassam o limite máximo de 400');
        }

        if ($f < $i) {
            throw new \Exception('$ini é maior que o $fim');
        }

        $t = $f - $i;

        $toSplice = $array;

        if($toSplice != null) {
            return trim(implode('', array_splice($toSplice, $i, $t)));
        } else {
            return null;
        }
    }

    public static function nFloat($number, $decimals = 2, $showThousands = false)
    {
        if (is_null($number) || empty(self::onlyNumbers($number)) || floatval($number) == 0) {
            return 0;
        }
        $pontuacao = preg_replace('/[0-9]/', '', $number);
        $locale = (mb_substr($pontuacao, -1, 1) == ',') ? "pt-BR" : "en-US";
        $formater = new \NumberFormatter($locale, \NumberFormatter::DECIMAL);

        if ($decimals === false) {
            $decimals = 2;
            preg_match_all('/[0-9][^0-9]([0-9]+)/', $number, $matches);
            if (!empty($matches[1])) {
                $decimals = mb_strlen(rtrim($matches[1][0], 0));
            }
        }

        return number_format($formater->parse($number, \NumberFormatter::TYPE_DOUBLE), $decimals, '.', ($showThousands ? ',' : ''));
    }

    public static function onlyNumbers($string)
    {
        return self::numbersOnly($string);
    }

    public static function numbersOnly($string)
    {
        return preg_replace('/[^[:digit:]]/', '', $string);
    }
}