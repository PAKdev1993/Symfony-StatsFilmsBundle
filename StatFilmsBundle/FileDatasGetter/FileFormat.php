<?php

namespace Krstic\StatFilmsBundle\FileDatasGetter;

/*
 * Strategy Interface
 */
interface FileFormat {
    public function getDatas($text);
}
