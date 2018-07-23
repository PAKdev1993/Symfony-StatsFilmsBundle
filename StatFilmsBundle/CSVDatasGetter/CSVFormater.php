<?php

namespace Krstic\StatFilmsBundle\CSVDatasGetter;

/*
 * Strategy Interface
 */
interface CSVFormater {
    public function getDatas($text);
}
