<?php
function extractMentions($text) {
    preg_match_all('/@(\w+)/', $text, $matches);
    return $matches[1]; // Array of usernames
}
?>