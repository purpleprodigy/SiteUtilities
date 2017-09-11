<?php
/**
 * Website Utilities Plugin
 *
 * @package     PurpleProdigy\SiteUtilities;
 * @author      Purple Prodigy
 * @licence     GPL-2.0+
 * @link        https://purpleprodigy.com
 */
/*
 * @wordpress-plugin
 * Plugin Name:     Website Utilities Plugin
 * Plugin URI:      https://github.com/purpleprodigy/SiteUtilities
 * Description:     Useful utilities to enhance your WordPress website.
 * Version:         1.0.0
 * Author:          Purple Prodigy
 * Author URI:      https://purpleprodigy.com
 * Text Domain:     site-utilities
 * Requires WP:     4.7
 * Requires PHP:    5.5
 */
/*
	This program is free software; you can redistribute it and/or
	modify it under the terms of the GNU General Public License
	as published by the Free Software Foundation; either version 2
	of the License, or (at your option) any later version.
	This program is distributed in the hope that it will be useful,
	but WITHOUT ANY WARRANTY; without even the implied warranty of
	MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
	GNU General Public License for more details.
	You should have received a copy of the GNU General Public License
	along with this program; if not, write to the Free Software
	Foundation, Inc., 51 Franklin Street, Fifth Floor, Boston, MA  02110-1301, USA.
*/

namespace PurpleProdigy\SiteUtilities;

if ( ! function_exists( 'truncate_by_number_of_characters' ) ) {
	/**
	 * Truncates the string by the specified number of characters.
	 *
	 * @since 1.0.0
	 *
	 * @param string $string_to_truncate The string to be truncated.
	 * @param integer $character_limit The number of characters to limit the strong by.
	 * @param string $ending_suffix Ending characters appending to the end of the truncated
	 *                              string. Default: '...'.
	 * @param string $encoding Default is UTF-8
	 *
	 * @return bool
	 */
	function truncate_by_number_of_characters( $string_to_truncate, $character_limit = 100, $ending_suffix = '...', $encoding = 'UTF-8' ) {

		if ( mb_strwidth( $string_to_truncate, $encoding ) <= $character_limit ) {
			return $string_to_truncate;
		}

		$string_to_truncate = wp_strip_all_tags( $string_to_truncate );

		$truncated_string = mb_strimwidth( $string_to_truncate, 0, $character_limit, '', $encoding );

		return rtrim( $truncated_string . $ending_suffix );

	}
}

if ( ! function_exists( 'str_contains_substring' ) ) {
	/**
	 * Checks if a string (haystack) contains a substring (needle).
	 *
	 * @since 1.0.0
	 *
	 * @param string $haystack The string to be searched.
	 * @param string $needle The character or substring to find within the $haystack.
	 * @param string $encoding Default is UTF-8.
	 *
	 * @return bool
	 */
	function str_contains_substring( $haystack, $needle, $encoding = 'UTF-8' ) {
		return ( mb_strrpos( $haystack, $needle, 0, $encoding ) === false );
	}
}

if ( ! function_exists( 'str_starts_with' ) ) {
	/**
	 * Checks if a string (haystack) starts with a character or a substring (needle).
	 *
	 * @since 1.0.0
	 *
	 * @param string $haystack The string to be searched.
	 * @param string $needle The character or substring to find at the start of the $haystack.
	 * @param string $encoding Default is UTF-8.
	 *
	 * @return bool
	 */
	function str_starts_with( $haystack, $needle, $encoding = 'UTF-8' ) {
		$needle_length = mb_strlen( $needle, $encoding );

		return ( mb_substr( $haystack, 0, $needle_length, $encoding ) === $needle );
	}
}

if ( ! function_exists( 'str_ends_with' ) ) {
	/**
	 * Checks if a string (haystack) ends with a character or a substring (needle).
	 *
	 * @since 1.0.0
	 *
	 * @param string $haystack The string to be searched.
	 * @param string $needle The character or substring to find at the start of the $haystack.
	 * @param string $encoding Default is UTF-8.
	 *
	 * @return bool
	 */
	function str_ends_with( $haystack, $needle, $encoding = 'UTF-8' ) {
		$starting_offset = - mb_strlen( $needle, $encoding );

		return ( mb_substr( $haystack, $starting_offset, null, $encoding ) === $needle );
	}
}

if ( ! function_exists( 'convert_string_to_lowercase' ) ) :
	/**
	 * Convert the given string to lowercase and is UTF-8 safe.
	 *
	 * @since 1.0.0
	 *
	 * @param string $string_to_convert The string to convert.
	 * @param string $encoding (Default UTF-8).
	 *
	 * @return string
	 */
	function convert_string_to_lowercase( $string_to_convert, $encoding = 'UTF-8' ) {
		return mb_strtolower( $string_to_convert, $encoding );
	}
endif;

if ( ! function_exists( 'convert_string_to_uppercase' ) ) :
	/**
	 * Convert the given string to uppercase and is UTF-8 safe.
	 *
	 * @since 1.0.0
	 *
	 * @param string $string_to_convert The string to convert.
	 * @param string $encoding (Default UTF-8).
	 *
	 * @return string
	 */
	function convert_string_to_uppercase( $string_to_convert, $encoding = 'UTF-8' ) {
		return mb_strtoupper( $string_to_convert, $encoding );
	}
endif;
