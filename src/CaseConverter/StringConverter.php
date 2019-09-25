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
        // vd($parts);
        // dd();
        // $delimiter = $this->s->getDelimiter();
        // if ($this->s->getType() === Type::NONE) {
        //     $delimiter = ' ';
        // }
        $delimiter = '_';

        $str = implode($delimiter, $parts);
        // $str = (new MbString($str))->toLower();
        // $str = (new MbString($str))->toLcFirst();
        // vd($str);
        // dd();

        return $str;
    }

    public function toCamel()
    {
        $parts = $this->s->getParts();

        foreach ($parts as &$p) {
            $p = (new MbString($p))->toLower();
            $p = (new MbString($p))->toUcFirstNonNumber();
        }
        // vd($parts);
        // dd();
        // $delimiter = $this->s->getDelimiter();
        // if ($this->s->getType() === Type::NONE) {
        //     $delimiter = ' ';
        // }
        $delimiter = '';

        $str = implode($delimiter, $parts);
        // $str = (new MbString($str))->toLower();
        $str = (new MbString($str))->toLcFirst();
        // vd($str);
        // dd();

        return $str;
    }

    public function toCobol()
    {
        $parts = $this->s->getParts();

        // foreach ($parts as &$p) {
        //     $p = (new MbString($p))->toLower();
        //     $p = (new MbString($p))->toUcFirstNonNumber();
        // }
        // vd($parts);
        // dd();
        // $delimiter = $this->s->getDelimiter();
        // if ($this->s->getType() === Type::NONE) {
        //     $delimiter = ' ';
        // }
        $delimiter = '-';

        $str = implode($delimiter, $parts);
        $str = (new MbString($str))->toUpper();
        // $str = (new MbString($str))->toUcFirstNonNumber();
        // vd($str);
        // dd();

        return $str;
    }

    public function toDot()
    {
        $parts = $this->s->getParts();

        // foreach ($parts as &$p) {
        //     $p = (new MbString($p))->toLower();
        //     $p = (new MbString($p))->toUcFirstNonNumber();
        // }
        // vd($parts);
        // dd();
        // $delimiter = $this->s->getDelimiter();
        // if ($this->s->getType() === Type::NONE) {
        //     $delimiter = ' ';
        // }
        $delimiter = '.';

        $str = implode($delimiter, $parts);
        $str = (new MbString($str))->toLower();
        // $str = (new MbString($str))->toUcFirstNonNumber();
        // vd($str);
        // dd();

        return $str;
    }

    public function toKebab()
    {
        $parts = $this->s->getParts();

        // foreach ($parts as &$p) {
        //     $p = (new MbString($p))->toLower();
        //     $p = (new MbString($p))->toUcFirstNonNumber();
        // }
        // vd($parts);
        // dd();
        // $delimiter = $this->s->getDelimiter();
        // if ($this->s->getType() === Type::NONE) {
        //     $delimiter = ' ';
        // }
        $delimiter = '-';

        $str = implode($delimiter, $parts);
        $str = (new MbString($str))->toLower();
        // $str = (new MbString($str))->toUcFirstNonNumber();
        // vd($str);
        // dd();

        return $str;
    }

    public function toLower()
    {
        // vd($this->s->getStr());
        $parts = $this->s->getParts();
        // vd($parts);
        // dd();
        // $delimiter = $this->s->getDelimiter();
        // if ($this->s->getType() === Type::NONE) {
        //     $delimiter = ' ';
        // }
        $delimiter = ' ';

        $str = implode($delimiter, $parts);
        $mb = new MbString($str);
        $str = $mb->toLower();
        // vd($str);
        // dd();

        return $str;
    }

    public function toMacro()
    {
        $parts = $this->s->getParts();
        // foreach ($parts as &$p) {
        //     $p = (new MbString($p))->toLower();
        //     $p = (new MbString($p))->toUcFirstNonNumber();
        // }
        // vd($parts);
        // dd();
        // $delimiter = $this->s->getDelimiter();
        // if ($this->s->getType() === Type::NONE) {
        //     $delimiter = ' ';
        // }
        $delimiter = '_';

        $str = implode($delimiter, $parts);
        $str = (new MbString($str))->toUpper();
        // $str = (new MbString($str))->toUcFirstNonNumber();
        // vd($str);
        // dd();

        return $str;
    }

    public function toPascal()
    {
        $parts = $this->s->getParts();
        foreach ($parts as &$p) {
            $p = (new MbString($p))->toLower();
            $p = (new MbString($p))->toUcFirstNonNumber();
        }
        // vd($parts);
        // dd();
        // $delimiter = $this->s->getDelimiter();
        // if ($this->s->getType() === Type::NONE) {
        //     $delimiter = ' ';
        // }
        $delimiter = '';

        $str = implode($delimiter, $parts);
        // $str = (new MbString($str))->toLower();
        // $str = (new MbString($str))->toUcFirstNonNumber();
        // vd($str);
        // dd();

        return $str;
    }

    public function toSentence()
    {
        $parts = $this->s->getParts();
        // foreach ($parts as &$p) {
        //     $p = (new MbString($p))->toLower();
        //     // $p = (new MbString($p))->toUcFirstNonNumber();
        // }
        // vd($parts);
        // dd();
        // $delimiter = $this->s->getDelimiter();
        // if ($this->s->getType() === Type::NONE) {
        //     $delimiter = ' ';
        // }
        $delimiter = ' ';

        $str = implode($delimiter, $parts);
        $str = (new MbString($str))->toLower();
        $str = (new MbString($str))->toUcFirstNonNumber();
        // vd($str);
        // dd();

        return $str;
    }

    public function toSnake()
    {
// vd($this->s->getStr());
        $parts = $this->s->getParts();
        foreach ($parts as &$p) {
            $p = (new MbString($p))->toLower();
            // $p = (new MbString($p))->toUcFirstNonNumber();
        }
        // vd($parts);
        // dd();
        // $delimiter = $this->s->getDelimiter();
        // if ($this->s->getType() === Type::NONE) {
        //     $delimiter = ' ';
        // }
        $delimiter = '_';

        $str = implode($delimiter, $parts);
        // $mb = new MbString($str);
        // $str = $mb->toLower();
        // vd($str);
        // dd();

        return $str;
    }

    public function toTitle()
    {
// vd($this->s->getStr());
        $parts = $this->s->getParts();
        foreach ($parts as &$p) {
            $p = (new MbString($p))->toLower();
            $p = (new MbString($p))->toUcFirstNonNumber();
        }
        // vd($parts);
        // dd();
        // $delimiter = $this->s->getDelimiter();
        // if ($this->s->getType() === Type::NONE) {
        //     $delimiter = ' ';
        // }
        $delimiter = ' ';

        $str = implode($delimiter, $parts);
        // $mb = new MbString($str);
        // $str = $mb->toLower();
        // vd($str);
        // dd();

        return $str;
    }

    public function toTrain()
    {
        // vd($this->s->getStr());
        $parts = $this->s->getParts();
        foreach ($parts as &$p) {
            $p = (new MbString($p))->toLower();
            $p = (new MbString($p))->toUcFirstNonNumber();
            $pMb = new MbString($p);
            if ($pMb->containsNumber()) {
                // dc($p);
                $pos = $pMb->getFirstNonNumberPos();
                if ($pos !== false) {
                    $p = $pMb->toUcNth($pos);
                }
            }
        }
        // vd($parts);
        // dd();
        // $delimiter = $this->s->getDelimiter();
        // if ($this->s->getType() === Type::NONE) {
        //     $delimiter = ' ';
        // }
        $delimiter = '-';

        $str = implode($delimiter, $parts);
        // $mb = new MbString($str);
        // $str = $mb->toLower();
        // vd($str);
        // dd();

        return $str;
    }

    public function toUpper()
    {
        // vd($this->s->getType());
        // vd($this->s->getStr());
        $parts = $this->s->getParts();
        // vd($parts);
        // dd();
        $delimiter = $this->s->getDelimiter();
        if ($this->s->getType() === Type::NONE) {
            $delimiter = ' ';
        }
        $delimiter = ' ';

        $str = implode($delimiter, $parts);
        $mb = new MbString($str);
        $str = $mb->toUpper();
        // vd($str);
        // dd();

        return $str;
    }
}
