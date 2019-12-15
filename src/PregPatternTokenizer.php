<?php

declare(strict_types=1);

namespace Sfp\AngryRegex;

use Nette\Utils\RegexpException;
use Nette\Utils\Strings;
use function strrpos;
use function substr;

final class PregPatternTokenizer
{
    private function __construct()
    {
    }

    /**
     * @throws RegexpException
     */
    public static function tokenize(string $pattern)
    {
        Strings::match('', $pattern);
        $delimiter       = substr($pattern, 0, 1);
        $delimiterEndPos = strrpos($pattern, $delimiter);
        assert(is_int($delimiterEndPos));
        $modifier        = substr($pattern, $delimiterEndPos);
        return new PregEntry($delimiter, substr($pattern, 1, $delimiterEndPos - 1), $modifier);
    }
}
