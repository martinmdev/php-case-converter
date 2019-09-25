<?php

namespace Martinm\Test\CaseConverter;

use Martinm\CaseConverter\Converter;
use Martinm\CaseConverter\StringWrapper;
use Martinm\Test\DataProvider\Provider1;
use Martinm\Test\DataProvider\Provider2;
use PHPUnit\Framework\TestCase;

class ToArrayTest extends TestCase
{
    /**
     * @dataProvider provide
     */
    public function test1($method, $in, $ex)
    {
        $s = new StringWrapper($in);

        $parts = $s->getNonEmptyParts();
        $a = implode(';', $parts);
        $res = '[' . $a . ']';

        $message = 'method: ' . $method;
        $message .= '; in: ' . $in;
        $message .= '; type: ' . $s->getType();

        $this->assertEquals($ex, $res, $message);
    }

    public function provide()
    {
        return Provider2::create()->provide();
    }
}
