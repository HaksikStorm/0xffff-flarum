<?php

/*
 * This file is part of Flarum.
 *
 * For detailed copyright and license information, please view the
 * LICENSE file that was distributed with this source code.
 */

use Flarum\Extend;
use Flarum\Discussion\Event\Saving;
use Overtrue\Pinyin\Pinyin;

// https://github.com/overtrue/pinyin
$pinyin = new Pinyin();

return [
    (new Extend\Event)
        ->listen(Saving::class, function ($event) use ($pinyin) {
            // pinyin slug
            $event->discussion->slug = mb_strtolower($pinyin->permalink($event->discussion->title));
        })
];
