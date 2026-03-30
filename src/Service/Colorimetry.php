<?php

declare(strict_types=1);

namespace Pyreweb\Chroma\Service;

/**
 * @author Hugo Doueil <hugo@pyreweb.com>
 * @author Pyréweb <contact@pyreweb.com>
 */
class Colorimetry
{
	public const SRGB_LINEARIZE_THRESHOLD = 0.04045;
	public const SRGB_LINEARIZE_DIVISOR = 12.92;
	public const SRGB_LINEARIZE_OFFSET = 0.055;
	public const SRGB_LINEARIZE_DIVISOR2 = 1.055;
	public const SRGB_LINEARIZE_GAMMA = 2.4;

	public const CBRT_EXPONENT = 1.0 / 3.0;

	public static function linearize(float $value): float
	{
		return $value <= self::SRGB_LINEARIZE_THRESHOLD
			? $value / self::SRGB_LINEARIZE_DIVISOR
			: (($value + self::SRGB_LINEARIZE_OFFSET) / self::SRGB_LINEARIZE_DIVISOR2) ** self::SRGB_LINEARIZE_GAMMA;
	}

	public static function cbrt(float $value): float
	{
		if ($value === 0.0) {
			return 0.0;
		}

		return $value < 0
			? -((-$value) ** self::CBRT_EXPONENT)
			: $value ** self::CBRT_EXPONENT;
	}
}