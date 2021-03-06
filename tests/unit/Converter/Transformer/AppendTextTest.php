<?php

declare(strict_types=1);

namespace Smile\GdprDump\Tests\Unit\Converter\Transformer;

use Smile\GdprDump\Converter\Parameters\ValidationException;
use Smile\GdprDump\Converter\Transformer\AddSuffix;
use Smile\GdprDump\Converter\Transformer\AppendText;
use Smile\GdprDump\Tests\Unit\TestCase;

class AppendTextTest extends TestCase
{
    /**
     * Test the converter.
     */
    public function testConverter(): void
    {
        $converter = new AppendText(['value' => '_test']);
        $deprecatedConverter = new AddSuffix(['value' => '_test']);

        $value = $converter->convert(null);
        $this->assertSame('', $value);

        $value = $deprecatedConverter->convert(null);
        $this->assertSame('', $value);

        $value = $converter->convert('user1');
        $this->assertSame('user1_test', $value);

        $value = $deprecatedConverter->convert('user1');
        $this->assertSame('user1_test', $value);
    }

    /**
     * Assert that an exception is thrown when the suffix is not set.
     */
    public function testSuffixNotSet(): void
    {
        $this->expectException(ValidationException::class);
        new AppendText();
    }
}
