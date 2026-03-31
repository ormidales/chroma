<?php

declare(strict_types=1);

namespace Pyreweb\Chroma\Interface;

/**
 * @author Hugo Doueil <hugo@pyreweb.com>
 * @author Pyréweb <contact@pyreweb.com>
 */
interface ColorInterface
{
	public function getId(): ?int;

	public function getName(): ?string;

	public function getCode(): ?int;

	public function getTitle(): ?string;

	public function getHex(): string;

	public function getRgb(): string;

	public function getRgba(float $alpha = 1.0): string;

	public function getHsl(): string;

	public function getOklch(): string;

	public function getCmyk(): string;

	public function getParsedHex(): array;

	public function getParsedRgb(): array;

	public function getParsedRgba(float $alpha = 1.0): array;

	public function toString(): string;

	public function toArray(float $alpha = 1.0): array;

	public function toJson(float $alpha = 1.0): string;
}