<?php
declare(strict_types=1);

const INCLUDES_DIR = __DIR__ . '/includes';
const ROUTES_DIR = __DIR__ . '/routes';
const TEMPLATES_DIR = __DIR__ . '/templates';
const DB_DIR = __DIR__ . '/db';

require_once INCLUDES_DIR . '/router.php';
require_once INCLUDES_DIR . '/view.php';
require_once INCLUDES_DIR . '/db.php';