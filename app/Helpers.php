<?php

function markdown($text) {
    $parser = new Parsedown();
    return $parser->text($text);
}
