<?php
// Class -> Tesla Y
// Object -> My Tesla Y or your Tesla Y

class Person {
  public function __construct(
    public string $name, public int $age
  ) {}

  public function introduce(): string {
    return "Hi, I'm {$this->name} and I'm {$this->age} years old.";
  }
}

$person = new Person("Alice", 30);
echo $person->introduce();
$person2 = new Person("Piotr", 37);
echo $person2->introduce();

