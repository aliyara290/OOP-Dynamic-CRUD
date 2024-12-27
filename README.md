# Understanding OOP in PHP

## Goal of OOP:
**Definition:** OOP (Object-Oriented Programming) is a way to model real-world things in programming using objects. Objects represent data (properties) and actions (methods).

### **Benefits of OOP:**
- **Reusability:** Write once, use multiple times.
- **Scalability:** Easier to add new features.
- **Maintainability:** Easier to update or fix code.

---

## Core OOP Concepts:
### 1. **Encapsulation:**
Hiding details of how something works and exposing only what’s necessary.
- Example: A class hides its properties and provides methods to access them.

### 2. **Abstraction:**
Showing only essential features and hiding the complex parts.
- Example: A car object only shows `start()` or `drive()` methods, hiding engine mechanics.

### 3. **Inheritance:**
Reusing properties and methods from a parent class in a child class.
- Example: A `Car` class can extend a `Vehicle` class to inherit its properties.

### 4. **Polymorphism:**
Using the same method name in different ways (e.g., in parent and child classes).
- Example: A `speak()` method in a `Dog` class and `Cat` class behaves differently.

---

## Classes and Objects:
Classes are blueprints, and objects are the actual things created from those blueprints.

### **Example:**
```php
class Car {
    public $brand;
    public function start() {
        echo "The car is starting.";
    }
}

$myCar = new Car(); // Creating an object
$myCar->brand = "Toyota"; // Setting a property
$myCar->start(); // Calling a method
```

### 3.1 **Properties and Methods:**
- **Properties:** Variables inside a class.
- **Methods:** Functions inside a class.

**Example:**
```php
class Person {
    public $name;
    public function sayHello() {
        echo "Hello, my name is $this->name.";
    }
}

$person = new Person();
$person->name = "Ali";
$person->sayHello(); // Output: Hello, my name is Ali.
```

### 3.2 **Constructors and Destructors:**
- **Constructor:** Automatically runs when an object is created.
- **Destructor:** Automatically runs when an object is destroyed.

**Example:**
```php
class Animal {
    public $name;

    public function __construct($name) {
        $this->name = $name;
        echo "$name has been created.";
    }

    public function __destruct() {
        echo "$this->name is being destroyed.";
    }
}

$dog = new Animal("Dog"); // Output: Dog has been created.
```

### 3.3 **Access Modifiers:**
- **public:** Accessible from anywhere.
- **private:** Accessible only within the class.
- **protected:** Accessible in the class and its child classes.

**Example:**
```php
class BankAccount {
    private $balance = 0;

    public function deposit($amount) {
        $this->balance += $amount;
    }

    public function getBalance() {
        return $this->balance;
    }
}

$account = new BankAccount();
$account->deposit(100);
echo $account->getBalance(); // Output: 100
```

---

## Inheritance:
Child classes inherit properties and methods from a parent class.

**Example:**
```php
class Animal {
    public function speak() {
        echo "The animal makes a sound.";
    }
}

class Dog extends Animal {
    public function speak() {
        echo "The dog barks.";
    }
}

$dog = new Dog();
$dog->speak(); // Output: The dog barks.
```

---

## Abstract Classes:
Abstract classes are templates for other classes. They cannot be instantiated directly.

**Example:**
```php
abstract class Shape {
    abstract public function area();
}

class Circle extends Shape {
    private $radius;

    public function __construct($radius) {
        $this->radius = $radius;
    }

    public function area() {
        return pi() * $this->radius * $this->radius;
    }
}

$circle = new Circle(5);
echo $circle->area(); // Output: 78.539816339745
```

---

## Interfaces:
Interfaces define methods that must be implemented in classes.

**Example:**
```php
interface Logger {
    public function log($message);
}

class FileLogger implements Logger {
    public function log($message) {
        echo "Logging to file: $message";
    }
}

$logger = new FileLogger();
$logger->log("Hello"); // Output: Logging to file: Hello
```

---

## Static Methods and Properties:
Static members belong to the class, not objects.

**Example:**
```php
class Math {
    public static function add($a, $b) {
        return $a + $b;
    }
}

echo Math::add(2, 3); // Output: 5
```

---

## Namespaces and Autoloading:
### **Namespaces:**
Organize code into groups to avoid name conflicts.

**Example:**
```php
namespace MyApp;

class User {
    public function sayHi() {
        echo "Hi!";
    }
}

$user = new \MyApp\User();
$user->sayHi(); // Output: Hi!
```

### **Autoloading:**
Use Composer to load classes automatically.

**Steps:**
1. Install Composer: https://getcomposer.org
2. Use `composer init` to create `composer.json`.
3. Define an autoload rule:
```json
{
    "autoload": {
        "psr-4": {
            "MyApp\\": "src/"
        }
    }
}
```
4. Run `composer dump-autoload`.
5. Use the class:
```php
require 'vendor/autoload.php';

use MyApp\User;

$user = new User();
$user->sayHi();
```
