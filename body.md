# Build a RESTful API

## With PHP 7.2 and TDD


#### We will learn, step-by-step, how to build a powerful RESTful API with PHP 7 and TDD from scratch.

**You will be able to use the API that we will build together in this book, for your next SaaS or your new startup idea.**


# Get Started

## Requirements
* Knowledge in OOP & PHP 7+
* Make sure you have PHP 7.2 or newer installed on your machine.
* Make sure you installed Composer globally before starting (https://getcomposer.org/doc/00-intro.md)
* Make sure you initialize composer in a empty folder where you want to build this project.
* Make sure you installed Postman (https://www.getpostman.com/), for making the requests to test your API.


# What is TDD?

TDD stands for Test-Driving Development. It literally means, coding the unit tests before creating or implementing the functions or methods.
Thanks TDD, it makes sure your project is tested. Most of the time, you first create your class, adding methods, etc. and then you relelized you don't have time to add unit tests or feel lazy and you end up with just a few tests.

Writing your tests before coding the app, also helps you to have a proper code that can be tested.

If you write the unit tests after, you might sometimes instance objects in your class (constructor for instance) and won't use dependency injection, which and you end up with a spagethii code that is not testable.

Finally, writing your unit tests, will make you writing class better and cleaner, with better method names and a nicer architecture in general. It will also decrease bugs.


# What are Endpoints?

An API Endpoint is a unique URI which represents an object (the resource) of the API and accessed by a client application from an HTTP request.


## Available HTTP Methods

Below are the available HTTP methods we have to communicate with our REST API.

* **GET** - for retrieving data from the API.
* **POST** - for adding new resources (or updating them).
* **PUT** - for updating resources (in most cases, it is wiser to use POST or PATCH instead of PUT).
* **PATCH** - for updating partially a resource.
* **DELETE** - for deleting resources.
* **OPTIONS** - for providing context about the resources.


## Creating our First Endpoints

Since we use TDD principles in mind, we will first add the unit tests before coding our first functions.

We will use Guzzle composer package to help us making HTTP request over the server and verify the HTTP code status.

Please install Guzzle package first by typing `composer require guzzlehttp/guzzle`

To begin with, we will create a simple unit test that makes sure our endpoint returns "Hello World".


```PHP
declare(strict_types=1);

// Scope the code int a namespace
namespace RESTBook\Test\Main;

use PHPUnit\Framework\TestCase;

class MainTest extends TestCase
{
    /** @var Client */
    private $oClient;

    protected function setUp()
    {
        $this->oClient = new Client(['base_uri' => 'http://localhost/rest-book/', 'exceptions' => false]);
    }

    public function testTestEndpoint(): void
    {
        $oResponse = $this->oClient->post($this->getApiUrl('test'));

        $this->assertSame(200, $oResponse->getStatusCode());
        $this->assertSame(['return' => 'It Works!'], json_decode($oResponse->getBody(), true));
    }
}
```
