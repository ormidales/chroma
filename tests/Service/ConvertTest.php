<?php

declare(strict_types=1);

namespace Pyreweb\Chroma\Tests\Service;

use PHPUnit\Framework\TestCase;

use Pyreweb\Chroma\Enum\Color;
use Pyreweb\Chroma\Service\Convert;

/**
 * @author Hugo Doueil <hugo@pyreweb.com>
 * @author Pyréweb <contact@pyreweb.com>
 */
class ConvertTest extends TestCase
{
	private const BLACK_HEX = '#000000';
	private const BLACK_RGB = 'rgb(0, 0, 0)';
	private const BLACK_RGBA = 'rgba(0, 0, 0, 1)';
	private const BLACK_HSL = 'hsl(0, 0%, 0%)';
	private const BLACK_OKLCH = 'oklch(0%, 0%, 0)';
	private const BLACK_CMYK = 'cmyk(0%, 0%, 0%, 100%)';

	private const WHITE_HEX = '#FFFFFF';
	private const WHITE_RGB = 'rgb(255, 255, 255)';
	private const WHITE_RGBA = 'rgba(255, 255, 255, 1)';
	private const WHITE_HSL = 'hsl(0, 0%, 100%)';
	private const WHITE_OKLCH = 'oklch(100%, 0%, 0)';
	private const WHITE_CMYK = 'cmyk(0%, 0%, 0%, 0%)';

	private const RED500_HEX = '#ef4444';
	private const RED500_RGB = 'rgb(239, 68, 68)';
	private const RED500_RGBA = 'rgba(239, 68, 68, 1)';
	private const RED500_HSL = 'hsl(0, 84.24%, 60.2%)';
	private const RED500_OKLCH = 'oklch(63.68%, 20.78%, 25.33132777693)';
	private const RED500_CMYK = 'cmyk(0%, 71.55%, 71.55%, 6.27%)';

	public function testHexBlack(): void
	{
		$expected = [
			'rgb' => self::BLACK_RGB,
			'rgba' => self::BLACK_RGBA,
			'hsl' => self::BLACK_HSL,
			'oklch' => self::BLACK_OKLCH,
			'cmyk' => self::BLACK_CMYK,
		];

		$this->assertSame($expected, Convert::hex(self::BLACK_HEX));
		$this->assertSame($expected, Convert::hex(Color::Black->getHex()));
	}

	public function testHexWhite(): void
	{
		$expected = [
			'rgb' => self::WHITE_RGB,
			'rgba' => self::WHITE_RGBA,
			'hsl' => self::WHITE_HSL,
			'oklch' => self::WHITE_OKLCH,
			'cmyk' => self::WHITE_CMYK,
		];

		$this->assertSame($expected, Convert::hex(self::WHITE_HEX));
		$this->assertSame($expected, Convert::hex(Color::White->getHex()));
	}

	public function testHexRed500(): void
	{
		$expected = [
			'rgb' => self::RED500_RGB,
			'rgba' => self::RED500_RGBA,
			'hsl' => self::RED500_HSL,
			'oklch' => self::RED500_OKLCH,
			'cmyk' => self::RED500_CMYK,
		];

		$this->assertSame($expected, Convert::hex(self::RED500_HEX));
		$this->assertSame($expected, Convert::hex(Color::Red500->getHex()));
	}

	public function testHex2RgbBlack(): void
	{
		$expected = self::BLACK_RGB;

		$this->assertSame($expected, Convert::hexToRgb(self::BLACK_HEX));
		$this->assertSame($expected, Convert::hexToRgb(Color::Black->getHex()));
	}

	public function testHex2RgbWhite(): void
	{
		$expected = self::WHITE_RGB;

		$this->assertSame($expected, Convert::hexToRgb(self::WHITE_HEX));
		$this->assertSame($expected, Convert::hexToRgb(Color::White->getHex()));
	}

	public function testHex2RgbRed500(): void
	{
		$expected = self::RED500_RGB;

		$this->assertSame($expected, Convert::hexToRgb(self::RED500_HEX));
		$this->assertSame($expected, Convert::hexToRgb(Color::Red500->getHex()));
	}

	public function testHex2RgbaBlack(): void
	{
		$expected = self::BLACK_RGBA;

		$this->assertSame($expected, Convert::hexToRgba(self::BLACK_HEX));
		$this->assertSame($expected, Convert::hexToRgba(Color::Black->getHex()));
	}

	public function testHex2RgbaWhite(): void
	{
		$expected = self::WHITE_RGBA;

		$this->assertSame($expected, Convert::hexToRgba(self::WHITE_HEX));
		$this->assertSame($expected, Convert::hexToRgba(Color::White->getHex()));
	}

	public function testHex2RgbaRed500(): void
	{
		$expected = self::RED500_RGBA;

		$this->assertSame($expected, Convert::hexToRgba(self::RED500_HEX));
		$this->assertSame($expected, Convert::hexToRgba(Color::Red500->getHex()));
	}

	public function testHex2HslBlack(): void
	{
		$expected = self::BLACK_HSL;

		$this->assertSame($expected, Convert::hexToHsl(self::BLACK_HEX));
		$this->assertSame($expected, Convert::hexToHsl(Color::Black->getHex()));
	}

	public function testHex2HslWhite(): void
	{
		$expected = self::WHITE_HSL;

		$this->assertSame($expected, Convert::hexToHsl(self::WHITE_HEX));
		$this->assertSame($expected, Convert::hexToHsl(Color::White->getHex()));
	}

	public function testHex2HslRed500(): void
	{
		$expected = self::RED500_HSL;

		$this->assertSame($expected, Convert::hexToHsl(self::RED500_HEX));
		$this->assertSame($expected, Convert::hexToHsl(Color::Red500->getHex()));
	}

	public function testHex2OklchBlack(): void
	{
		$expected = self::BLACK_OKLCH;

		$this->assertSame($expected, Convert::hexToOklch(self::BLACK_HEX));
		$this->assertSame($expected, Convert::hexToOklch(Color::Black->getHex()));
	}

	public function testHex2OklchWhite(): void
	{
		$expected = self::WHITE_OKLCH;

		$this->assertSame($expected, Convert::hexToOklch(self::WHITE_HEX));
		$this->assertSame($expected, Convert::hexToOklch(Color::White->getHex()));
	}

	public function testHex2OklchRed500(): void
	{
		$expected = self::RED500_OKLCH;

		$this->assertSame($expected, Convert::hexToOklch(self::RED500_HEX));
		$this->assertSame($expected, Convert::hexToOklch(Color::Red500->getHex()));
	}

	public function testHex2CmykBlack(): void
	{
		$expected = self::BLACK_CMYK;

		$this->assertSame($expected, Convert::hexToCmyk(self::BLACK_HEX));
		$this->assertSame($expected, Convert::hexToCmyk(Color::Black->getHex()));
	}

	public function testHex2CmykWhite(): void
	{
		$expected = self::WHITE_CMYK;

		$this->assertSame($expected, Convert::hexToCmyk(self::WHITE_HEX));
		$this->assertSame($expected, Convert::hexToCmyk(Color::White->getHex()));
	}

	public function testHex2CmykRed500(): void
	{
		$expected = self::RED500_CMYK;

		$this->assertSame($expected, Convert::hexToCmyk(self::RED500_HEX));
		$this->assertSame($expected, Convert::hexToCmyk(Color::Red500->getHex()));
	}
}