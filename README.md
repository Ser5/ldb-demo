# LoveDancingBird demo project

## Requirements

PHP 8.1 or higher.

## How to run

```sh
git clone https://github.com/Ser5/ldb-demo.git
cd ldb-demo
php index.php
```

## Interface

There you can see classes list, each has capacity, leaders count, followers count, leader names list, follower names list.

Below is the input form, where you can enter desired class number, type - a leader or a follower, and a name.

After the data is entered, it's validated. Depending on the validation result you'll see a success message or an error.

After that you can repeat the process of signing up.

To exit press `Ctrl+C`.

## Validation

The sign-up performs the following validations:

- class ID exists
- type is either 1 or 2
- name isn't empty
- class capacity isn't exceeded
- leaders count doesn't exceed followers count by 3 or more
- followers count doesn't exceed leaders count by 3 or more

## Code features

- PSR-12 compliant
- OOP approach
- Simplistic dependency injection container
- Dependency injection
- `DanceClassesManager` class - for CRUD and other data management operations
- `DanceClass` class - contins data only, no Active Record
- console interface templates reside in dedicated files
