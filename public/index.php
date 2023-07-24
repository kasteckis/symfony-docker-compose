<?php

echo "You should put some breakpoints in your IDE";

$something = 4 + 5;

echo " to check if XDEBUG works." . PHP_EOL;

$somethingAgain = 9 + 4;

echo "Make sure you have ran: \"docker compose -f docker-compose.yml -f docker-compose.xdebug.yml up -d --build\" before" . PHP_EOL;
