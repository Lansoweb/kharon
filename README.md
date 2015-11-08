# Kharon

UNDER DEVELOPMENT!

## Introduction

This is a Dynamic Routing and Load Balance system made with PHP, using Zend Expressive micro-framework.

It's goal is to "choose" an endpoint to connect to in distributed systems, like in a micro service architeture.

You can use this module with [Athena](https://github.com/Lansoweb/athena) server, that can returns more than one server
and use this module to choose one of them based on some rules and statistics about the servers.

## Components

* Server list
* Rule

### Server list

* Static: from a configuration file
* Discovered: A background service will periodically fetch the list from a discovery server, like [Athena](https://github.com/Lansoweb/athena) 
* Fetched: A background service will periodically fetch the list from a configuration server, like [Hermes](https://github.com/Lansoweb/hermes)

### Rule

* RoundRobin: Cycles among the servers in a specific order
* Random: Each time will select a random server from the list
* Availability: You can attach a [Cerberus](https://github.com/Lansoweb/cerberus) module (Circuit Breaker) to control the availability of the servers
* ResponseTime: Each server has it's response time measured and this time is weighted. The faster servers have more probability to be chosen.
 