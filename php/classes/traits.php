<?php

interface Logger
{
    public function log(string $message): void;
}

trait Loggable
{
    public function log(string $message): void
    {
        echo "Logging: $message\n";
    }
}

class User
{
    use Loggable;

    public function __construct(public string $name)
    {}

    public function save(): void
    {
        $this->log("User {$this->name} saved");
    }
}

$user = new User("Piotr");
$user->save();
