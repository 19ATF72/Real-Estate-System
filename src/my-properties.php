<?php

require_once __DIR__ . '/system/core.php';

/**
* Create new property for the current logged in user
*/

if ($user->isLoggedIn()) {
  echo $property->getPropertiesCard();
}
