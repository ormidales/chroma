<?php

declare(strict_types=1);

namespace Pyreweb\Chroma\Service;

use Pyreweb\Chroma\Service\Validate;

/**
 * @author Hugo Doueil <hugo@pyreweb.com>
 * @author Pyréweb <contact@pyreweb.com>
 */
class Parse
{
	private const HEX_PREFIX = '#';

	private const HEX_RED_OFFSET = 0;
	private const HEX_GREEN_OFFSET = 2;
	private const HEX_BLUE_OFFSET = 4;
	private const HEX_COMPONENT_LENGTH = 2;

	public static function hex(string $hex): array
	{
		Validate::hex($hex);

		$hex = ltrim($hex, self::HEX_PREFIX);
		$r = hexdec(substr($hex, self::HEX_RED_OFFSET, self::HEX_COMPONENT_LENGTH));
		$g = hexdec(substr($hex, self::HEX_GREEN_OFFSET, self::HEX_COMPONENT_LENGTH));
		$b = hexdec(substr($hex, self::HEX_BLUE_OFFSET, self::HEX_COMPONENT_LENGTH));

		return [$r, $g, $b];
	}

	public static function rgb(string $rgb): array
	{
		$matches = Validate::rgb($rgb);

		$r = (int) $matches[1];
		$g = (int) $matches[2];
		$b = (int) $matches[3];

		if ($r > 255 || $g > 255 || $b > 255) {
			throw new \InvalidArgumentException('La couleur RGB doit être au format rgb(R, G, B) avec R, G et B entre 0 et 255.');
		}

		return [$r, $g, $b];
	}

	public static function rgba(string $rgba): array
	{
		$matches = Validate::rgba($rgba);

		$r = (int) $matches[1];
		$g = (int) $matches[2];
		$b = (int) $matches[3];
		$a = (float) $matches[4];

		if ($r > 255 || $g > 255 || $b > 255) {
			throw new \InvalidArgumentException(
				'La couleur RGBA doit être au format rgba(R, G, B, A) avec R, G et B entre 0 et 255 et A entre 0 et 1.'
			);
		}

		if ($a < 0.0 || $a > 1.0) {
			throw new \InvalidArgumentException(
				'La couleur RGBA doit être au format rgba(R, G, B, A) avec R, G et B entre 0 et 255 et A entre 0 et 1.'
			);
		}

		return [$r, $g, $b, $a];
	}

	public static function hsl(string $hsl): array
	{
		$matches = Validate::hsl($hsl);

		$h = (int) $matches[1];
		$s = (int) $matches[2];
		$l = (int) $matches[3];

		if ($h < 0 || $h > 360) {
			throw new \InvalidArgumentException(
				'La couleur HSL doit être au format hsl(H, S%, L%) avec H entre 0 et 360, S et L entre 0 et 100.'
			);
		}

		if ($s < 0 || $s > 100 || $l < 0 || $l > 100) {
			throw new \InvalidArgumentException(
				'La couleur HSL doit être au format hsl(H, S%, L%) avec H entre 0 et 360, S et L entre 0 et 100.'
			);
		}

		return [$h, $s, $l];
	}

	public static function oklch(string $oklch): array
	{
		$matches = Validate::oklch($oklch);

		$L = (float) $matches[1];
		$C = (float) $matches[2];
		$h = (float) $matches[3];

		if ($L < 0.0 || $L > 1.0) {
			throw new \InvalidArgumentException(
				'La couleur OKLCH doit être au format oklch(L C H) avec L entre 0 et 1, C positif et H entre 0 et 360.'
			);
		}

		if ($C < 0.0) {
			throw new \InvalidArgumentException(
				'La couleur OKLCH doit être au format oklch(L C H) avec L entre 0 et 1, C positif et H entre 0 et 360.'
			);
		}

		if ($h < 0.0 || $h > 360.0) {
			throw new \InvalidArgumentException(
				'La couleur OKLCH doit être au format oklch(L C H) avec L entre 0 et 1, C positif et H entre 0 et 360.'
			);
		}

		return [$L, $C, $h];
	}
}
