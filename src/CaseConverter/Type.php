<?php

namespace Martinm\CaseConverter;

interface Type
{
    const ADA = 'ADA';
    const CAMEL = 'CAMEL';
    const COBOL = 'COBOL';
    const DOT = 'DOT';
    const KEBAB = 'KEBAB';
    const LOWER = 'LOWER';
    const MACRO = 'MACRO';
    const PASCAL = 'PASCAL';
    const SENTENCE = 'SENTENCE';
    const SNAKE = 'SNAKE';
    const TITLE = 'TITLE';
    const TRAIN = 'TRAIN';
    const UPPER = 'UPPER';

    // doesn't match any of the above
    const NONE = 'NONE';
}
