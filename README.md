<h1 align="center">
  🐘🎯 API Skeleton applying Hexagonal Architecture, DDD & CQRS in PHP
</h1>

<p align="center">
    <a href="https://github.com/CodelyTV"><img src="https://img.shields.io/badge/JoseUgal-OS-green.svg?style=flat-square" alt="JoseUgal"/></a>
    <a href="#"><img src="https://img.shields.io/badge/Symfony-6.2.3-purple.svg?style=flat-square&logo=symfony" alt="Symfony 5.0"/></a>
</p>

<p align="center">
  Example of a <strong>PHP API Skeleton using Domain-Driven Design (DDD) and Command Query Responsibility Segregation
  (CQRS) principles</strong> keeping the code as simple as possible.
  <br />
  <br />
  Take a look, play and have fun with this.
  <a href="https://github.com/JoseUgal/php-ddd-api-skeleton/stargazers">Stars are welcome 😊</a>
  <br />
  <br />
  <a href="https://github.com/JoseUgal/php-ddd-api-skeleton/issues">Report a bug</a>
  ·
  <a href="https://github.com/JoseUgal/php-ddd-api-skeleton/issues">Request a feature</a>
</p>

## 🚀 Environment Setup

### 🐳 Needed tools

1. Clone this project: `git clone https://github.com/CodelyTV/php-ddd-example php-ddd-example`
2. Move to the project folder: `cd php-ddd-example`

### 🛠️ Environment configuration

1. Create a local environment file (`cp .env .env.local`) if you want to modify any parameter

### 🔥 Application execution

1. Install all the dependencies executing: `composer install`
2. Bring up the project executing: `make start-local`
3. Then you'll have 3 apps available (2 APIs and 1 Frontend):
   1. [Mooc Backend](apps/mooc/backend): http://localhost:8031/health-check

### ✅ Tests execution

1. Install the dependencies if you haven't done it previously: `make deps`
2. Execute PHPUnit and Behat tests: `make test`

## 👩‍💻 Project explanation

This project tries to be a MOOC (Massive Open Online Course) platform. It's decoupled from any framework, but it has
some Symfony and Laravel implementations.

### ⛱️ Bounded Contexts

* [Mooc](src/Mooc): Place to look in if you wanna see some code 🙂. Massive Open Online Courses public platform with users, videos, notifications, and so on.

### 🎯 Hexagonal Architecture

This repository follows the Hexagonal Architecture pattern. Also, it's structured using `modules`.
With this, we can see that the current structure of a Bounded Context is:

```scala
$ tree -L 4 src

src
|-- Mooc // Company subdomain / Bounded Context: Features related to one of the company business lines / products
|   `-- Videos // Some Module inside the Mooc context
|       |-- Application
|       |   |-- Create // Inside the application layer all is structured by actions
|       |   |   |-- CreateVideoCommand.php
|       |   |   |-- CreateVideoCommandHandler.php
|       |   |   `-- VideoCreator.php
|       |   |-- Find
|       |   |-- Trim
|       |   `-- Update
|       |-- Domain
|       |   |-- Video.php // The Aggregate of the Module
|       |   |-- VideoCreatedDomainEvent.php // A Domain Event
|       |   |-- VideoFinder.php
|       |   |-- VideoId.php
|       |   |-- VideoNotFound.php
|       |   |-- VideoRepository.php // The `Interface` of the repository is inside Domain
|       |   |-- VideoTitle.php
|       |   |-- VideoType.php
|       |   |-- VideoUrl.php
|       |   `-- Videos.php // A collection of our Aggregate
|       `-- Infrastructure // The infrastructure of our module
|           |-- DependencyInjection
|           `-- Persistence
|               `--MySqlVideoRepository.php // An implementation of the repository
`-- Shared // Shared Kernel: Common infrastructure and domain shared between the different Bounded Contexts
    |-- Domain
    `-- Infrastructure
```

#### Repository pattern
Our repositories try to be as simple as possible usually only containing 2 methods `search` and `save`.
If we need some query with more filters we use the `Specification` pattern also known as `Criteria` pattern. So we add a
`searchByCriteria` method.

You can see an example [here](src/Mooc/Courses/Domain/CourseRepository.php)
and its implementation [here](src/Mooc/Courses/Infrastructure/Persistence/DoctrineCourseRepository.php).

### Aggregates
You can see an example of an aggregate [here](src/Mooc/Courses/Domain/Course.php). All aggregates should
extend the [AggregateRoot](src/Shared/Domain/Aggregate/AggregateRoot.php).

### Command Bus
There is 1 implementations of the [command bus](src/Shared/Domain/Bus/Command/CommandBus.php).
1. [Sync](src/Shared/Infrastructure/Bus/Command/InMemorySymfonyCommandBus.php) using the Symfony Message Bus

### Query Bus
The [Query Bus](src/Shared/Infrastructure/Bus/Query/InMemorySymfonyQueryBus.php) uses the Symfony Message Bus.

### Event Bus
The [Event Bus](src/Shared/Infrastructure/Bus/Event/InMemory/InMemorySymfonyEventBus.php) uses the Symfony Message Bus.
The [MySql Bus](src/Shared/Infrastructure/Bus/Event/MySql/MySqlDoctrineEventBus.php) uses a MySql+Pulling as a bus.
The [RabbitMQ Bus](src/Shared/Infrastructure/Bus/Event/RabbitMq/RabbitMqEventBus.php) uses RabbitMQ C extension.

## 📱 Monitoring
Every time a domain event is published it's exported to Prometheus. You can access to the Prometheus panel [here](http://localhost:9999/).

## 🤔 Contributing
There are some things missing (add swagger, improve documentation...), feel free to add this if you want! If you want
some guidelines feel free to contact us :)
