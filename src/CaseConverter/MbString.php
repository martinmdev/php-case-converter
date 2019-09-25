<?php

namespace Martinm\CaseConverter;

class MbString
{
    protected $str;

    protected $len;

    protected $encoding;

    public function __construct($str)
    {
        $this->str = $str;

        $this->analyze();
    }

    protected function analyze()
    {
        $this->encoding = mb_detect_encoding($this->str);
        $this->len = mb_strlen($this->str, $this->encoding);
    }

    public function toUcNth($pos)
    {
        $string = $this->str;
        $encoding = $this->encoding;
        $strlen = $this->len;

        $before = mb_substr($string, 0, $pos, $encoding);
        $theChar = mb_substr($string, $pos, 1, $encoding);
        $then = mb_substr($string, $pos + 1, $strlen - (1 + $pos), $encoding);

        return $before . mb_strtoupper($theChar, $encoding) . $then;
    }

    public function toUcFirst()
    {
        $string = $this->str;
        $encoding = $this->encoding;
        $strlen = $this->len;

        $firstChar = mb_substr($string, 0, 1, $encoding);
        $then = mb_substr($string, 1, $strlen - 1, $encoding);

        return mb_strtoupper($firstChar, $encoding) . $then;
    }

    public function toUcFirstNonNumber()
    {
        $pos = $this->getFirstNonNumberPos();
        if ($pos !== false) {
            return $this->toUcNth($pos);
        }

        return $this->str;
    }

    public function toLcFirst()
    {
        $string = $this->str;
        $encoding = $this->encoding;
        $strlen = $this->len;

        $firstChar = mb_substr($string, 0, 1, $encoding);
        $then = mb_substr($string, 1, $strlen - 1, $encoding);

        return mb_strtolower($firstChar, $encoding) . $then;
    }

    public function toLower()
    {
        return mb_strtolower($this->str, $this->encoding);
    }

    public function toUpper()
    {
        return mb_strtoupper($this->str, $this->encoding);
    }

    public function getEncoding()
    {
        return $this->encoding;
    }

    public function toUtf8()
    {
        $this->str = mb_convert_encoding($this->str, 'UTF-8', $this->encoding);
    }

    public function getStr()
    {
        return $this->str;
    }

    protected function contains($needle)
    {
        return mb_strpos($this->str, $needle, 0, $this->encoding) !== false;
    }

    public function isLowercase()
    {
        $strLower = $this->toLower();

        if ($this->str === $strLower) {
            return true;
        }

        return false;
    }

    public function isUppercase()
    {
        $strUpper = $this->toUpper();

        if ($this->str === $strUpper) {
            return true;
        }

        return false;
    }

    public function isNumber()
    {
        return is_numeric($this->str);
    }

    public function containsNumber()
    {
        return (bool)preg_match('/[0-9]/', $this->str);
    }

    public function toCharacterArray()
    {
        return preg_split('//u', $this->str, -1, PREG_SPLIT_NO_EMPTY);
    }

    public function splitAfterNumbers()
    {
        // return preg_split('/[0-9]+/u', $this->str, -1, PREG_SPLIT_NO_EMPTY);
        // return preg_split('/[0-9]+/u', $this->str, -1);
        // return preg_split('/([0-9]+)/u', $this->str, -1, PREG_SPLIT_NO_EMPTY | PREG_SPLIT_DELIM_CAPTURE);
        return preg_split('/([^0-9]*[0-9]+)/u', $this->str, -1, PREG_SPLIT_NO_EMPTY | PREG_SPLIT_DELIM_CAPTURE);
    }

    public function getFirstNonNumberPos()
    {
        for ($i = 0; $i < $this->len; $i++) {
            $ch = $this->str[$i];
            if (!is_numeric($ch)) {
                return $i;
            }
        }

        return false;
        // dc($this->str);
        // $res = preg_split('/[^0-9]/', $this->str, 1, PREG_SPLIT_NO_EMPTY | PREG_SPLIT_OFFSET_CAPTURE);
        // dc($res);
        //
        // if (!empty($res) && isset($res[0][1])) {
        //     return $res[0][1];
        // }
        //
        // return false;
    }
}
