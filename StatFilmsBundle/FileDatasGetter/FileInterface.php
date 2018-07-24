<?php

namespace Krstic\StatFilmsBundle\FileDatasGetter;

/*
 * Strategy Interface
 */
interface FileInterface {
    public function getDatas($text);
}
