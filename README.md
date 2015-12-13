# Metis

UNDER DEVELOPMENT!

## Introduction

This is a Dynamic Routing and Load Balance library made with PHP.

It's goal is to "choose" an endpoint to connect to in distributed systems, like in a micro service architeture.

You can use this library with [Athena](https://github.com/mt-olympus/athena) server, that can returns more than one server
and use this module to choose one of them based on some rules and statistics about the servers.

You can inject a Metis instance to a [Hermes](https://github.com/mt-olympus/hermes), and it will automatically choose a 
server to connect to. More info on the Hermes documentation. 

## Components

* Server list
* Rule

### Server list

* Static: from a configuration file
* Fetched: The library will fetch the list from a remote server, like [Athena](https://github.com/mt-olympus/athena) (Service Discovery) or [Demeter](https://github.com/mt-olympus/demeter) (Distributed Configuration)

### Strategy

Regardless the chosen strategy, if there is a [Cerberus](https://github.com/mt-olympus/cerberus) (Circuit Breaker) attached,
the unavailable services will be filtered. 

* RoundRobin: Cycles among the servers in a specific order
* Random: Each time will select a random server from the list
* ResponseTime: Each server has it's response time measured and this time is weighted. The faster servers have more probability to be chosen.
