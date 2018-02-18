<?php
/*
 * Copyright (c) AllAbout, Inc.
 * This project has been initiated under the
 * belief of simple and yet universal system
 * design driving customers' business efficiency.
 */
namespace App\Utilities\Validation;

use Illuminate\Validation\Validator as BaseValidator;

/**
 * Tiny enhanced Validator class.
 */
class Validator extends BaseValidator {
  /**
   * Checks if the specified attribute contains only alphabetic characters.
   *
   * @param  string $attribute just a stub argument, nothing to be done.
   * @param  mixed  $value     the possibly string to be checked.
   * @return bool              returns true if the $value consists of only
   *                           alphabetic characters.
   */
  protected function validateAlpha($attribute, $value)
  {
    return preg_match('/^([a-z])+$/i', $value);
  }

  /**
   * Checks if the specified attribute contains only alphabetic characters
   * nor numbers.
   *
   * @param  string $attribute the attribute string to be checked.
   * @param  mixed  $value     the possibly string to be checked.
   * @return bool              returns true if the $value consists of only
   *                           alphabetic nor numeric characters.
   */
  protected function validateAlphaNum($attribute, $value)
  {
    return preg_match('/^([a-z0-9])+$/i', $value);
  }

  /**
   * Checks if the specified attribute contains only alphabetic, numeric
   * characters nor dashes.
   *
   * @param  string $attribute the attribute string to be checked.
   * @param  mixed  $value     the possibly string to be checked.
   * @return bool              returns true if the $value consists of only
   *                           alphabetic, numeric nor dash characters.
   */
  protected function validateAlphaDash($attribute, $value)
  {
    return preg_match('/^([-a-z0-9_-])+$/i', $value);
  }

  /**
   * Checks if the specified attribute contains only hiragana characters.
   *
   * @param  string $attribute the attribute string to be checked.
   * @param  mixed  $value     the possibly string to be checked.
   * @return bool              returns true if the $value consists of only
   *                           hiragana characters.
   */
  protected function validateHiragana($attribute, $value)
  {
    return preg_match('/^([ぁ-ん])+$/u', $value);
  }

  /**
   * Checks if the specified attribute contains only katakana characters.
   *
   * @param  string $attribute the attribute string to be checked.
   * @param  mixed  $value     the possibly string to be checked.
   * @return bool              returns true if the $value consists of only
   *                           katakana characters.
   */
  protected function validateKatakana($attribute, $value)
  {
    return preg_match("/^([ァ-ヶー])+$/u", $value);
  }

  /**
   * Checks if the specified attribute contains only hiragana or katakana
   * characters.
   *
   * @param  string $attribute the attribute string to be checked.
   * @param  mixed  $value     the possibly string to be checked.
   * @return bool              returns true if the $value consists of only
   *                           hiragan nor katakana characters.
   */
  public static function validateHiraKata($attribute, $value)
  {
    return preg_match("/^([ぁ-んァ-ヶー])+$/u", $value);
  }

  /**
   * Checks if the specified attribute contains only hiragana, katakana nor kanji
   * characters.
   *
   * @param  string $attribute the attribute string to be checked.
   * @param  mixed  $value     the possibly string to be checked.
   * @return bool              returns true if the $value consists of only
   *                           hiragan, katakana nor kanji characters.
   */
  public static function validateEm($attribute, $value)
  {
    return preg_match("/^([ぁ-んァ-ン一-龥])+$/u", $value);
  }
}