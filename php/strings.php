<?php
$name = "John";
echo 'Hello, $name!\n'; 
echo "Hello, $name!\n"; 

$heredoc = <<<EOD
Multi-line string
with variable $name
EOD;

$nowdoc = <<<'EOD'
Multi-line string
with variable $name
EOD;

echo $heredoc;
echo $nowdoc;