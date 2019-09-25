<?php

namespace Martinm\Test\CaseConverter;

use Martinm\CaseConverter\Converter;
use Martinm\CaseConverter\StringWrapper;
use Martinm\Test\DataProvider\Provider3;
use PHPUnit\Framework\TestCase;

class UsingNumbersInInputTest extends TestCase
{
    /**
     * @dataProvider provide
     */
    public function test1($method, $in, $ex)
    {
        $s = new StringWrapper($in);

        $res = $this->method($method, $in);

        $message = 'method: ' . $method;
        $message .= '; in: ' . $in;
        $message .= '; type: ' . $s->getType();

        $this->assertEquals($ex, $res, $message);
    }

    protected function method($method, $in)
    {
        $converter = new Converter();

        switch ($method) {
            case 'toUpper':
                $res = $converter->toUpper($in);
            break;

            case 'toTrain':
                $res = $converter->toTrain($in);
            break;

            case 'toTitle':
                $res = $converter->toTitle($in);
            break;

            case 'toSnake':
                $res = $converter->toSnake($in);
            break;

            case 'toSentence':
                $res = $converter->toSentence($in);
            break;

            case 'toPascal':
                $res = $converter->toPascal($in);
            break;

            case 'toMacro':
                $res = $converter->toMacro($in);
            break;

            case 'toLower':
                $res = $converter->toLower($in);
            break;

            case 'toKebab':
                $res = $converter->toKebab($in);
            break;

            case 'toDot':
                $res = $converter->toDot($in);
            break;

            case 'toCobol':
                $res = $converter->toCobol($in);
            break;

            case 'toCamel':
                $res = $converter->toCamel($in);
            break;

            case 'toAda':
                $res = $converter->toAda($in);
            break;
        }

        return $res;
    }

    public function provide()
    {
        return Provider3::create()->provide();
    }
}
