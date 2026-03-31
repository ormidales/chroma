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
		$result1 = Convert::hex(self::BLACK_HEX);
		$result2 = Convert::hex(Color::Black->getHex());

		$this->assertSame(self::BLACK_RGB, $result1['rgb']);
		$this->assertSame(self::BLACK_RGBA, $result1['rgba']);
		$this->assertSame(self::BLACK_HSL, $result1['hsl']);
		$this->assertSame(self::BLACK_OKLCH, $result1['oklch']);
		$this->assertSame(self::BLACK_CMYK, $result1['cmyk']);

		$this->assertSame(self::BLACK_RGB, $result2['rgb']);
		$this->assertSame(self::BLACK_RGBA, $result2['rgba']);
		$this->assertSame(self::BLACK_HSL, $result2['hsl']);
		$this->assertSame(self::BLACK_OKLCH, $result2['oklch']);
		$this->assertSame(self::BLACK_CMYK, $result2['cmyk']);
	}

	public function testHexWhite(): void
	{
		$result1 = Convert::hex(self::WHITE_HEX);
		$result2 = Convert::hex(Color::White->getHex());

		$this->assertSame(self::WHITE_RGB, $result1['rgb']);
		$this->assertSame(self::WHITE_RGBA, $result1['rgba']);
		$this->assertSame(self::WHITE_HSL, $result1['hsl']);
		$this->assertSame(self::WHITE_OKLCH, $result1['oklch']);
		$this->assertSame(self::WHITE_CMYK, $result1['cmyk']);

		$this->assertSame(self::WHITE_RGB, $result2['rgb']);
		$this->assertSame(self::WHITE_RGBA, $result2['rgba']);
		$this->assertSame(self::WHITE_HSL, $result2['hsl']);
		$this->assertSame(self::WHITE_OKLCH, $result2['oklch']);
		$this->assertSame(self::WHITE_CMYK, $result2['cmyk']);
	}

	public function testHexRed500(): void
	{
		$result1 = Convert::hex(self::RED500_HEX);
		$result2 = Convert::hex(Color::Red500->getHex());

		$this->assertSame(self::RED500_RGB, $result1['rgb']);
		$this->assertSame(self::RED500_RGBA, $result1['rgba']);
		$this->assertSame(self::RED500_HSL, $result1['hsl']);
		$this->assertSame(self::RED500_OKLCH, $result1['oklch']);
		$this->assertSame(self::RED500_CMYK, $result1['cmyk']);

		$this->assertSame(self::RED500_RGB, $result2['rgb']);
		$this->assertSame(self::RED500_RGBA, $result2['rgba']);
		$this->assertSame(self::RED500_HSL, $result2['hsl']);
		$this->assertSame(self::RED500_OKLCH, $result2['oklch']);
		$this->assertSame(self::RED500_CMYK, $result2['cmyk']);
	}

	public function testHex2RgbBlack(): void
	{
		$this->assertSame(self::BLACK_RGB, Convert::hex(self::BLACK_HEX)->toRgb());
		$this->assertSame(self::BLACK_RGB, Convert::hex(Color::Black->getHex())->toRgb());

		$this->assertSame(self::BLACK_RGB, Convert::hexToRgb(self::BLACK_HEX));
		$this->assertSame(self::BLACK_RGB, Convert::hexToRgb(Color::Black->getHex()));
	}

	public function testHex2RgbWhite(): void
	{
		$this->assertSame(self::WHITE_RGB, Convert::hex(self::WHITE_HEX)->toRgb());
		$this->assertSame(self::WHITE_RGB, Convert::hex(Color::White->getHex())->toRgb());

		$this->assertSame(self::WHITE_RGB, Convert::hexToRgb(self::WHITE_HEX));
		$this->assertSame(self::WHITE_RGB, Convert::hexToRgb(Color::White->getHex()));
	}

	public function testHex2RgbRed500(): void
	{
		$this->assertSame(self::RED500_RGB, Convert::hex(self::RED500_HEX)->toRgb());
		$this->assertSame(self::RED500_RGB, Convert::hex(Color::Red500->getHex())->toRgb());

		$this->assertSame(self::RED500_RGB, Convert::hexToRgb(self::RED500_HEX));
		$this->assertSame(self::RED500_RGB, Convert::hexToRgb(Color::Red500->getHex()));
	}

	public function testHex2RgbaBlack(): void
	{
		$this->assertSame(self::BLACK_RGBA, Convert::hex(self::BLACK_HEX)->toRgba());
		$this->assertSame(self::BLACK_RGBA, Convert::hex(Color::Black->getHex())->toRgba());

		$this->assertSame(self::BLACK_RGBA, Convert::hexToRgba(self::BLACK_HEX));
		$this->assertSame(self::BLACK_RGBA, Convert::hexToRgba(Color::Black->getHex()));
	}

	public function testHex2RgbaWhite(): void
	{
		$this->assertSame(self::WHITE_RGBA, Convert::hex(self::WHITE_HEX)->toRgba());
		$this->assertSame(self::WHITE_RGBA, Convert::hex(Color::White->getHex())->toRgba());

		$this->assertSame(self::WHITE_RGBA, Convert::hexToRgba(self::WHITE_HEX));
		$this->assertSame(self::WHITE_RGBA, Convert::hexToRgba(Color::White->getHex()));
	}

	public function testHex2RgbaRed500(): void
	{
		$this->assertSame(self::RED500_RGBA, Convert::hex(self::RED500_HEX)->toRgba());
		$this->assertSame(self::RED500_RGBA, Convert::hex(Color::Red500->getHex())->toRgba());

		$this->assertSame(self::RED500_RGBA, Convert::hexToRgba(self::RED500_HEX));
		$this->assertSame(self::RED500_RGBA, Convert::hexToRgba(Color::Red500->getHex()));
	}

	public function testHex2HslBlack(): void
	{
		$this->assertSame(self::BLACK_HSL, Convert::hex(self::BLACK_HEX)->toHsl());
		$this->assertSame(self::BLACK_HSL, Convert::hex(Color::Black->getHex())->toHsl());

		$this->assertSame(self::BLACK_HSL, Convert::hexToHsl(self::BLACK_HEX));
		$this->assertSame(self::BLACK_HSL, Convert::hexToHsl(Color::Black->getHex()));
	}

	public function testHex2HslWhite(): void
	{
		$this->assertSame(self::WHITE_HSL, Convert::hex(self::WHITE_HEX)->toHsl());
		$this->assertSame(self::WHITE_HSL, Convert::hex(Color::White->getHex())->toHsl());

		$this->assertSame(self::WHITE_HSL, Convert::hexToHsl(self::WHITE_HEX));
		$this->assertSame(self::WHITE_HSL, Convert::hexToHsl(Color::White->getHex()));
	}

	public function testHex2HslRed500(): void
	{
		$this->assertSame(self::RED500_HSL, Convert::hex(self::RED500_HEX)->toHsl());
		$this->assertSame(self::RED500_HSL, Convert::hex(Color::Red500->getHex())->toHsl());

		$this->assertSame(self::RED500_HSL, Convert::hexToHsl(self::RED500_HEX));
		$this->assertSame(self::RED500_HSL, Convert::hexToHsl(Color::Red500->getHex()));
	}

	public function testHex2OklchBlack(): void
	{
		$this->assertSame(self::BLACK_OKLCH, Convert::hex(self::BLACK_HEX)->toOklch());
		$this->assertSame(self::BLACK_OKLCH, Convert::hex(Color::Black->getHex())->toOklch());

		$this->assertSame(self::BLACK_OKLCH, Convert::hexToOklch(self::BLACK_HEX));
		$this->assertSame(self::BLACK_OKLCH, Convert::hexToOklch(Color::Black->getHex()));
	}

	public function testHex2OklchWhite(): void
	{
		$this->assertSame(self::WHITE_OKLCH, Convert::hex(self::WHITE_HEX)->toOklch());
		$this->assertSame(self::WHITE_OKLCH, Convert::hex(Color::White->getHex())->toOklch());

		$this->assertSame(self::WHITE_OKLCH, Convert::hexToOklch(self::WHITE_HEX));
		$this->assertSame(self::WHITE_OKLCH, Convert::hexToOklch(Color::White->getHex()));
	}

	public function testHex2OklchRed500(): void
	{
		$this->assertSame(self::RED500_OKLCH, Convert::hex(self::RED500_HEX)->toOklch());
		$this->assertSame(self::RED500_OKLCH, Convert::hex(Color::Red500->getHex())->toOklch());

		$this->assertSame(self::RED500_OKLCH, Convert::hexToOklch(self::RED500_HEX));
		$this->assertSame(self::RED500_OKLCH, Convert::hexToOklch(Color::Red500->getHex()));
	}

	public function testHex2CmykBlack(): void
	{
		$this->assertSame(self::BLACK_CMYK, Convert::hex(self::BLACK_HEX)->toCmyk());
		$this->assertSame(self::BLACK_CMYK, Convert::hex(Color::Black->getHex())->toCmyk());

		$this->assertSame(self::BLACK_CMYK, Convert::hexToCmyk(self::BLACK_HEX));
		$this->assertSame(self::BLACK_CMYK, Convert::hexToCmyk(Color::Black->getHex()));
	}

	public function testHex2CmykWhite(): void
	{
		$this->assertSame(self::WHITE_CMYK, Convert::hex(self::WHITE_HEX)->toCmyk());
		$this->assertSame(self::WHITE_CMYK, Convert::hex(Color::White->getHex())->toCmyk());

		$this->assertSame(self::WHITE_CMYK, Convert::hexToCmyk(self::WHITE_HEX));
		$this->assertSame(self::WHITE_CMYK, Convert::hexToCmyk(Color::White->getHex()));
	}

	public function testHex2CmykRed500(): void
	{
		$this->assertSame(self::RED500_CMYK, Convert::hex(self::RED500_HEX)->toCmyk());
		$this->assertSame(self::RED500_CMYK, Convert::hex(Color::Red500->getHex())->toCmyk());

		$this->assertSame(self::RED500_CMYK, Convert::hexToCmyk(self::RED500_HEX));
		$this->assertSame(self::RED500_CMYK, Convert::hexToCmyk(Color::Red500->getHex()));
	}
}