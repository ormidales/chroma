<?php

declare(strict_types=1);

namespace Pyreweb\Chroma\Tests\Enum;

use PHPUnit\Framework\TestCase;

use Pyreweb\Chroma\Enum\Color;

/**
 * @author Hugo Doueil <hugo@pyreweb.com>
 * @author Pyréweb <contact@pyreweb.com>
 */
class ColorTest extends TestCase
{
	public function testFromBlack(): void
	{
		$expected = Color::Black;

		$this->assertSame($expected, Color::from(1));
		$this->assertSame($expected, Color::from(Color::Black->value));
		$this->assertSame($expected, Color::from(Color::Black->getId()));
	}

	public function testFromWhite(): void
	{
		$expected = Color::White;

		$this->assertSame($expected, Color::from(2));
		$this->assertSame($expected, Color::from(Color::White->value));
		$this->assertSame($expected, Color::from(Color::White->getId()));
	}

	public function testFromRed500(): void
	{
		$expected = Color::Red500;

		$this->assertSame($expected, Color::from(105));
		$this->assertSame($expected, Color::from(Color::Red500->value));
		$this->assertSame($expected, Color::from(Color::Red500->getId()));
	}

	public function testFromIdBlack(): void
	{
		$expected = Color::Black;

		$this->assertSame($expected, Color::fromId(1));
		$this->assertSame($expected, Color::fromId(Color::Black->value));
		$this->assertSame($expected, Color::fromId(Color::Black->getId()));
	}

	public function testFromIdWhite(): void
	{
		$expected = Color::White;

		$this->assertSame($expected, Color::fromId(2));
		$this->assertSame($expected, Color::fromId(Color::White->value));
		$this->assertSame($expected, Color::fromId(Color::White->getId()));
	}

	public function testFromIdRed500(): void
	{
		$expected = Color::Red500;

		$this->assertSame($expected, Color::fromId(105));
		$this->assertSame($expected, Color::fromId(Color::Red500->value));
		$this->assertSame($expected, Color::fromId(Color::Red500->getId()));
	}

	public function testFromNameBlack(): void
	{
		$expected = Color::Black;

		$this->assertSame($expected, Color::fromName('Black'));
		$this->assertSame($expected, Color::fromName(Color::Black->name));
		$this->assertSame($expected, Color::fromName(Color::Black->getName()));
	}

	public function testFromNameWhite(): void
	{
		$expected = Color::White;

		$this->assertSame($expected, Color::fromName('White'));
		$this->assertSame($expected, Color::fromName(Color::White->name));
		$this->assertSame($expected, Color::fromName(Color::White->getName()));
	}

	public function testFromNameRed500(): void
	{
		$expected = Color::Red500;

		$this->assertSame($expected, Color::fromName('Red500'));
		$this->assertSame($expected, Color::fromName(Color::Red500->name));
		$this->assertSame($expected, Color::fromName(Color::Red500->getName()));
	}

	public function testFromTitleBlack(): void
	{
		$expected = Color::Black;

		$this->assertSame($expected, Color::fromTitle('Noir'));
		$this->assertSame($expected, Color::fromTitle(Color::Black->getTitle()));
	}

	public function testFromTitleWhite(): void
	{
		$expected = Color::White;

		$this->assertSame($expected, Color::fromTitle('Blanc'));
		$this->assertSame($expected, Color::fromTitle(Color::White->getTitle()));
	}

	public function testFromTitleRed500(): void
	{
		$expected = Color::Red500;

		$this->assertSame($expected, Color::fromTitle('Rouge passion'));
		$this->assertSame($expected, Color::fromTitle(Color::Red500->getTitle()));
	}

	public function testFromHexBlack(): void
	{
		$expected = Color::Black;

		$this->assertSame($expected, Color::fromHex('#000000'));
		$this->assertSame($expected, Color::fromHex(Color::Black->getHex()));
	}

	public function testFromHexWhite(): void
	{
		$expected = Color::White;

		$this->assertSame($expected, Color::fromHex('#ffffff'));
		$this->assertSame($expected, Color::fromHex(Color::White->getHex()));
	}

	public function testFromHexRed500(): void
	{
		$expected = Color::Red500;

		$this->assertSame($expected, Color::fromHex('#ef4444'));
		$this->assertSame($expected, Color::fromHex(Color::Red500->getHex()));
	}

	public function testFromRgbBlack(): void
	{
		$expected = Color::Black;

		$this->assertSame($expected, Color::fromRgb('rgb(0, 0, 0)'));
		$this->assertSame($expected, Color::fromRgb(Color::Black->getRgb()));
	}

	public function testFromRgbWhite(): void
	{
		$expected = Color::White;

		$this->assertSame($expected, Color::fromRgb('rgb(255, 255, 255)'));
		$this->assertSame($expected, Color::fromRgb(Color::White->getRgb()));
	}

	public function testFromRgbRed500(): void
	{
		$expected = Color::Red500;

		$this->assertSame($expected, Color::fromRgb('rgb(239, 68, 68)'));
		$this->assertSame($expected, Color::fromRgb(Color::Red500->getRgb()));
	}
}