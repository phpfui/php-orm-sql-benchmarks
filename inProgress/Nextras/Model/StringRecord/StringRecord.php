<?php

namespace SOB\Nextras\Model\StringRecord;

use SOB\Nextras\Model\AbstractEntity;

/**
 * @property string $stringRequired {default } {enum self::_*}
 * @property string|NULL $stringDefaultNull {default NULL} {enum self::_*}
 * @property string|NULL $stringDefaultNullable {default 'default'} {enum self::_*}
 * @property string $stringDefaultNotNull {default 'default'} {enum self::_*}
 */
class StringRecord extends AbstractEntity
{
}
