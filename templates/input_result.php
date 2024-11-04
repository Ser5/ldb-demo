<?php
/**
 * @var \Dance\Result $r
 */

echo "\n";

if ($r->isOK) {
    echo "Student added\n";
} else {
    echo "Error: $r->errorMessage\n";
}

echo "\n\n\n";
