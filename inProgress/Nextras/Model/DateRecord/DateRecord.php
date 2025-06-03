<?php

namespace SOB\Nextras\Model\DateRecord;

use SOB\Nextras\Model\AbstractEntity;

/**
 * @property string $dateRequired {default } {enum self::_*}
 * @property string|NULL $dateDefaultNull {default NULL} {enum self::_*}
 * @property string|NULL $dateDefaultNullable {default '2000-01-02'} {enum self::_*}
 * @property string $dateDefaultNotNull {default '2000-01-02'} {enum self::_*}
 * @property string|NULL $timestampDefaultCurrentNullable {default CURRENT_TIMESTAMP} {enum self::_*}
 * @property string $timestampDefaultCurrentNotNull {default CURRENT_TIMESTAMP} {enum self::_*}
 */
class DateRecord extends AbstractEntity
{
}
