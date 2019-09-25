<?php

namespace Martinm\CaseConverter;

class StringWrapper extends MbString
{
    protected $type;

    protected $parts;

    protected $delimiter = '';

    public function __construct($str)
    {
        parent::__construct($str);

        $this->detectType();
    }

    private function checkForUpperAndLower()
    {
        if ($this->str === $this->toLower()) {
            $this->type = Type::LOWER;
        } elseif ($this->str === $this->toUpper()) {
            $this->type = Type::UPPER;
        }
    }

    private function checkForTitle()
    {
        foreach ($this->parts as $p) {
            $ps = new MbString($p);
            if ($p !== $ps->toUcFirst()) {
                return;
            }
        }

        $this->type = Type::TITLE;
    }

    private function checkForSentence()
    {
        if ($this->str === $this->toUcFirst()) {
            $this->type = Type::SENTENCE;
        }
    }

    private function checkForSpace()
    {
        if ($this->contains(' ')) {
            $this->delimiter = ' ';
            $this->parts = explode(' ', $this->str);

            $this->checkForUpperAndLower();

            if ($this->type === Type::NONE) {
                $this->checkForTitle();
            }

            if ($this->type === Type::NONE) {
                $this->checkForSentence();
            }

            return true;
        }

        return false;
    }

    private function checkForDash()
    {
        if ($this->contains('-')) {
            $this->delimiter = '-';

            $this->parts = explode('-', $this->str);

            $strUpper = $this->toUpper();
            $strLower = $this->toLower();
            $strUcFirst = $this->toUcFirst();

            if ($this->str === $strLower) {
                $this->type = Type::KEBAB;
            } elseif ($this->str === $strUpper) {
                $this->type = Type::COBOL;
            } else {
                $this->type = Type::TRAIN;

                foreach ($this->parts as $p) {
                    $ps = new MbString($p);
                    if ($p !== $ps->toUcFirst()) {
                        $this->type = Type::NONE;
                        break;
                    }
                }
            }

            return true;
        }

        return false;
    }

    private function checkForUnderScore()
    {
        if ($this->contains('_')) {
            $this->delimiter = '_';

            $this->parts = explode('_', $this->str);

            $strUpper = $this->toUpper();
            $strLower = $this->toLower();

            if ($this->str === $strLower) {
                $this->type = Type::SNAKE;
            } elseif ($this->str === $strUpper) {
                $this->type = Type::MACRO;
            } else {
                $this->type = Type::ADA;

                foreach ($this->parts as $p) {
                    $ps = new MbString($p);
                    if ($p !== $ps->toUcFirst()) {
                        $this->type = Type::NONE;
                        break;
                    }
                }
            }

            return true;
        }

        return false;
    }

    private function checkForDot()
    {
        if ($this->contains('.')) {
            $this->delimiter = '.';

            $this->parts = explode('.', $this->str);

            if ($this->str === $this->toLower()) {
                $this->type = Type::DOT;
            }

            return true;
        }

        return false;
    }

    private function checkForPascalAndCamelCase()
    {
        $chrArray = $this->toCharacterArray();
        $parts = [];
        $part = [];
        $this->type = Type::PASCAL;

        $last = null;
        foreach ($chrArray as $k => $ch) {
            $chMb = new MbString($ch);

            if ($chMb->isNumber()) {
                $current = 'n';
            } elseif ($chMb->isUppercase()) {
                $current = 'u';

                if (!empty($part)) {
                    $parts[] = implode($part);
                } elseif ($k > 0) {
                    $this->type = Type::NONE;
                }
                $part = [];
            } else {
                // lower case
                $current = 'l';

                if ($k === 0) {

                    if ($this->type !== Type::NONE) {
                        $this->type = Type::CAMEL;
                    }
                }
            }

            $last = $current;
            $part[] = $ch;
        }

        $parts[] = implode($part);

        $this->parts = $parts;
    }

    private function chArrToChNumParts(array $chArr)
    {
        $parts = [];
        $i = 0;
        foreach ($chArr as $ch) {
            if (is_numeric($ch)) {
                $lastI = $i - 1;
                if ($i > 0) {
                    $parts[$lastI] .= $ch;
                    continue;
                }
            }
            $parts[] = $ch;
            $i++;
        }

        return $parts;
    }

    private function checkNumberCases()
    {
        if ($this->containsNumber()) {
            if ($this->type === Type::UPPER) {
                $this->parts = $this->chArrToChNumParts($this->toCharacterArray());
            } elseif ($this->type === Type::LOWER) {
                $this->parts = [$this->str];
            } else {
                if ($this->hasEmptyParts()) {
                    $this->splitPartsAfterNumber();
                }
            }
        }
    }

    private function splitPartsAfterNumber()
    {
        $newParts = [];
        foreach ($this->parts as $k => $part) {
            $mbP = new MbString($part);
            if ($mbP->containsNumber()) {
                $subParts = $mbP->splitAfterNumbers();
                foreach ($subParts as $subPart) {
                    $newParts[] = $subPart;
                }
            } else {
                $newParts[] = $part;
            }
        }

        $this->parts = $newParts;
    }

    protected function detectType()
    {
        $this->type = Type::NONE;

        if ($this->checkForDash()) {
        } elseif ($this->checkForSpace()) {
        } elseif ($this->checkForUnderScore()) {
        } elseif ($this->checkForDot()) {
        } else {
            $this->checkForUpperAndLower();

            if ($this->type === Type::NONE) {
                $this->checkForPascalAndCamelCase();
            } else {
                $this->parts = [$this->str];
            }
        }

        $this->checkNumberCases();
    }

    public function getType()
    {
        return $this->type;
    }

    public function getParts()
    {
        return $this->parts;
    }

    public function getNonEmptyParts()
    {
        $parts = [];
        foreach ($this->parts as $p) {
            if ($p !== '') {
                $parts[] = $p;
            }
        }

        return $parts;
    }

    public function getDelimiter()
    {
        return $this->delimiter;
    }

    public function hasEmptyParts()
    {
        foreach ($this->parts as $p) {
            if ($p === '') {
                return true;
            }
        }

        return false;
    }
}
