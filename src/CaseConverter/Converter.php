<?php

namespace Martinm\CaseConverter;

class Converter extends AbstractConverter
{
    public function toAda($str)
    {
        return (new StringConverter($str))->toAda();
    }

    public function toCamel($str)
    {
        return (new StringConverter($str))->toCamel();
    }

    public function toCobol($str)
    {
        return (new StringConverter($str))->toCobol();
    }

    public function toDot($str)
    {
        return (new StringConverter($str))->toDot();
    }

    public function toKebab($str)
    {
        return (new StringConverter($str))->toKebab();
    }

    public function toLower($str)
    {
        return (new StringConverter($str))->toLower();
    }

    public function toMacro($str)
    {
        return (new StringConverter($str))->toMacro();
    }

    public function toPascal($str)
    {
        return (new StringConverter($str))->toPascal();
    }

    public function toSentence($str)
    {
        return (new StringConverter($str))->toSentence();
    }

    public function toSnake($str)
    {
        return (new StringConverter($str))->toSnake();
    }

    public function toTitle($str)
    {
        return (new StringConverter($str))->toTitle();
    }

    public function toTrain($str)
    {
        return (new StringConverter($str))->toTrain();
    }

    public function toUpper($str)
    {
        return (new StringConverter($str))->toUpper();
    }
}
