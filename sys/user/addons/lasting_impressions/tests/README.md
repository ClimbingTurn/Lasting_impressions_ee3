# TODO find out how to unit test ee
## Unit Tests
Run all unit tests from the tests directory.
The phpunit.xml file is located there.
Don't forget to run composer dump-autoload if the autoloader is not present.
To run phpunit without specifying the full path you can use an alias like this:
  
  `alias phpunit="./vendor/phpunit/phpunit/phpunit"`

   _n.b. You need to be running php 7.3 or higher_
  You shouldn't need to add the bootstrap option but here it is just in case
  `phpunit --bootstrap="vendor/autoload.php" --testsuite LastingImpressions`