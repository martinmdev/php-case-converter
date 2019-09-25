<?php

namespace Martinm\CaseConverter;

class StringConverter
{
    /**
     * @var StringWrapper
     */
    protected $s;

    public function __construct(string $str)
    {
        $this->s = new StringWrapper($str);
    }

    public function toAda()
    {
        $parts = $this->s->getParts();

        foreach ($parts as &$p) {
            $p = (new MbString($p))->toLower();
            $p = (new MbString($p))->toUcFirstNonNumber();
        }
        $delimiter = '_';

        $str = implode($delimiter, $parts);

        return $str;
    }

    public function toCamel()
    {
        $parts = $this->s->getParts();

        foreach ($parts as &$p) {
            $p = (new MbString($p))->toLower();
            $p = (new MbString($p))->toUcFirstNonNumber();
        }
        $delimiter = '';

        $str = implode($delimiter, $parts);
        $str = (new MbString($str))->toLcFirst();

        return $str;
    }

    public function toCobol()
    {
        $parts = $this->s->getParts();

        $delimiter = '-';

        $str = implode($delimiter, $parts);
        $str = (new MbString($str))->toUpper();

        return $str;
    }

    public function toDot()
    {
        $parts = $this->s->getParts();
        $delimiter = '.';

        $str = implode($delimiter, $parts);
        $str = (new MbString($str))->toLower();

        return $str;
    }

    public function toKebab()
    {
        $parts = $this->s->getParts();

        $delimiter = '-';

        $str = implode($delimiter, $parts);
        $str = (new MbString($str))->toLower();

        return $str;
    }

    public function toLower()
    {
        $parts = $this->s->getParts();
        $delimiter = ' ';

        $str = implode($delimiter, $parts);
        $mb = new MbString($str);
        $str = $mb->toLower();

        return $str;
    }

    public function toMacro()
    {
        $parts = $this->s->getParts();
        $delimiter = '_';

        $str = implode($delimiter, $parts);
        $str = (new MbString($str))->toUpper();

        return $str;
    }

    public function toPascal()
    {
        $parts = $this->s->getParts();
        foreach ($parts as &$p) {
            $p = (new MbString($p))->toLower();
            $p = (new MbString($p))->toUcFirstNonNumber();
        }
        $delimiter = '';

        $str = implode($delimiter, $parts);

        return $str;
    }

    public function toSentence()
    {
        $parts = $this->s->getParts();
        $delimiter = ' ';

        $str = implode($delimiter, $parts);
        $str = (new MbString($str))->toLower();
        $str = (new MbString($str))->toUcFirstNonNumber();

        return $str;
    }

    public function toSnake()
    {
        $parts = $this->s->getParts();
        foreach ($parts as &$p) {
            $p = (new MbString($p))->toLower();
        }
        $delimiter = '_';

        $str = implode($delimiter, $parts);

        return $str;
    }

    public function toTitle()
    {
        $parts = $this->s->getParts();
        foreach ($parts as &$p) {
            $p = (new MbString($p))->toLower();
            $p = (new MbString($p))->toUcFirstNonNumber();
        }
        $delimiter = ' ';

        $str = implode($delimiter, $parts);

        return $str;
    }

    public function toTrain()
    {
        $parts = $this->s->getParts();
        foreach ($parts as &$p) {
            $p = (new MbString($p))->toLower();
            $p = (new MbString($p))->toUcFirstNonNumber();
            $pMb = new MbString($p);
            if ($pMb->containsNumber()) {
                $pos = $pMb->getFirstNonNumberPos();
                if ($pos !== false) {
                    $p = $pMb->toUcNth($pos);
                }
            }
        }
        $delimiter = '-';

        $str = implode($delimiter, $parts);

        return $str;
    }

    public function toUpper()
    {
        $parts = $this->s->getParts();
        $delimiter = ' ';

        $str = implode($delimiter, $parts);
        $mb = new MbString($str);
        $str = $mb->toUpper();

        return $str;
    }
}
