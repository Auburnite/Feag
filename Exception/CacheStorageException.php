<?php

/*******************************************************************************
 * Auburnite
 *
 * @link                https://github.com/Auburnite/Auburnite
 * @copywrite           Copywrite (c) 2023-present | Jordan Wamser - RedPanda Coding
 * @license             https://github.com/Auburnite/Auburnite/blob/main/LICENSE
 ******************************************************************************/
namespace Auburnite\Component\Feag\Exception;

use Auburnite\Auburnite\Component\Exception\Exception;
use Psr\SimpleCache\CacheException;

class CacheStorageException extends Exception implements CacheException
{

}
