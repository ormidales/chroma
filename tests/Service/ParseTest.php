<?php

declare(strict_types=1);

namespace Pyreweb\Chroma\Tests\Service;

use PHPUnit\Framework\TestCase;

use Pyreweb\Chroma\Enum\Color;
use Pyreweb\Chroma\Service\Convert;
use Pyreweb\Chroma\Service\Parse;

/**
 * @author Hugo Doueil <hugo@pyreweb.com>
 * @author Pyréweb <contact@pyreweb.com>
 */
class ParseTest extends TestCase
{
	public function testHexBlack(): void
	{
		$expected = [0, 0, 0];

		$this->assertSame($expected, Parse::hex('#000000'));
		$this->assertSame($expected, Parse::hex(Color::Black->getHex()));
	}

	public function testHexWhite(): void
	{
		$expected = [255, 255, 255];

		$this->assertSame($expected, Parse::hex('#FFFFFF'));
		$this->assertSame($expected, Parse::hex(Color::White->getHex()));
	}

	public function testRgbBlack(): void
	{
		$expected = [0, 0, 0];

		$this->assertSame($expected, Parse::rgb('rgb(0, 0, 0)'));
		$this->assertSame($expected, Parse::rgb(Color::Black->getRgb()));
		$this->assertSame($expected, Parse::rgb(Convert::hexToRgb('#000000')));
		$this->assertSame($expected, Parse::rgb(Convert::hexToRgb(Color::Black->getHex())));
	}

	public function testRgbWhite(): void
	{
		$expected = [255, 255, 255];

		$this->assertSame($expected, Parse::rgb('rgb(255, 255, 255)'));
		$this->assertSame($expected, Parse::rgb(Color::White->getRgb()));
		$this->assertSame($expected, Parse::rgb(Convert::hexToRgb('#FFFFFF')));
		$this->assertSame($expected, Parse::rgb(Convert::hexToRgb(Color::White->getHex())));
	}

	public function testRgbaBlack(): void
	{
		$expected = [0, 0, 0, 1.0];

		$this->assertSame($expected, Parse::rgba('rgba(0, 0, 0, 1.0)'));
		$this->assertSame($expected, Parse::rgba(Color::Black->getRgba()));
		$this->assertSame($expected, Parse::rgba(Convert::hexToRgba('#000000')));
		$this->assertSame($expected, Parse::rgba(Convert::hexToRgba(Color::Black->getHex())));
	}

	public function testRgbaWhite(): void
	{
		$expected = [255, 255, 255, 1.0];

		$this->assertSame($expected, Parse::rgba('rgba(255, 255, 255, 1.0)'));
		$this->assertSame($expected, Parse::rgba(Color::White->getRgba()));
		$this->assertSame($expected, Parse::rgba(Convert::hexToRgba('#FFFFFF')));
		$this->assertSame($expected, Parse::rgba(Convert::hexToRgba(Color::White->getHex())));
	}
}