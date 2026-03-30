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
	public function testFrom(): void
	{
		foreach (Color::cases() as $color) {
			$this->assertSame($color, Color::from($color->getId()));
		}
	}

	public function testFromId(): void
	{
		foreach (Color::cases() as $color) {
			$this->assertSame($color, Color::fromId($color->getId()));
		}
	}

	public function testFromName(): void
	{
		foreach (Color::cases() as $color) {
			$this->assertSame($color, Color::fromName($color->getName()));
		}
	}

	public function testFromTitle(): void
	{
		foreach (Color::cases() as $color) {
			$this->assertSame($color, Color::fromTitle($color->getTitle()));
		}
	}

	public function testFromHex(): void
	{
		foreach (Color::cases() as $color) {
			$this->assertSame($color, Color::fromHex($color->getHex()));
		}
	}

	public function testFromRgb(): void
	{
		foreach (Color::cases() as $color) {
			$this->assertSame($color, Color::fromRgb($color->getRgb()));
		}
	}

	public function testFromRgba(): void
	{
		foreach (Color::cases() as $color) {
			$this->assertSame($color, Color::fromRgba($color->getRgba()));
		}
	}

	public function testFromHsl(): void
	{
		foreach (Color::cases() as $color) {
			$this->assertSame($color, Color::fromHsl($color->getHsl()));
		}
	}
}