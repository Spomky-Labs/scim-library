# System for Cross-domain Identity Management (SCIM) Library for PHP

[![Join the chat at https://gitter.im/Spomky-Labs/scim-library](https://badges.gitter.im/Spomky-Labs/scim-library.svg)](https://gitter.im/Spomky-Labs/scim-library?utm_source=badge&utm_medium=badge&utm_campaign=pr-badge&utm_content=badge)

[![Scrutinizer Code Quality](https://scrutinizer-ci.com/g/Spomky-Labs/scim-library/badges/quality-score.png?b=master)](https://scrutinizer-ci.com/g/Spomky-Labs/scim-library/?branch=master)
[![Coverage Status](https://coveralls.io/repos/github/Spomky-Labs/scim-library/badge.svg?branch=master)](https://coveralls.io/github/Spomky-Labs/scim-library?branch=master)
[![PSR-7 ready](https://img.shields.io/badge/PSR--7-ready-brightgreen.svg)](http://www.php-fig.org/psr/psr-7/)

[![Dependency Status](https://www.versioneye.com/user/projects/57acac64fc2569003af85833/badge.svg?style=flat-square)](https://www.versioneye.com/user/projects/57acac64fc2569003af85833)

[![Build Status](https://travis-ci.org/Spomky-Labs/scim-library.svg?branch=master)](https://travis-ci.org/Spomky-Labs/scim-library)
[![HHVM Status](http://hhvm.h4cc.de/badge/spomky-labs/scim-library.svg)](http://hhvm.h4cc.de/package/spomky-labs/scim-library)
[![PHP 7 ready](http://php7ready.timesplinter.ch/Spomky-Labs/scim-library/badge.svg)](https://travis-ci.org/Spomky-Labs/scim-library)

[![SensioLabsInsight](https://insight.sensiolabs.com/projects/7a822517-4ee8-4b20-aeb9-9adde14d27a4/big.png)](https://insight.sensiolabs.com/projects/7a822517-4ee8-4b20-aeb9-9adde14d27a4)

[![Latest Stable Version](https://poser.pugx.org/Spomky-Labs/scim-library/v/stable.png)](https://packagist.org/packages/Spomky-Labs/scim-library)
[![Total Downloads](https://poser.pugx.org/Spomky-Labs/scim-library/downloads.png)](https://packagist.org/packages/Spomky-Labs/scim-library)
[![Latest Unstable Version](https://poser.pugx.org/Spomky-Labs/scim-library/v/unstable.png)](https://packagist.org/packages/Spomky-Labs/scim-library)
[![License](https://poser.pugx.org/Spomky-Labs/scim-library/license.png)](https://packagist.org/packages/Spomky-Labs/scim-library) [![GuardRails badge](https://badges.production.guardrails.io/Spomky-Labs/scim-library.svg)](https://www.guardrails.io)

> *Note: this library is still in development. The first stable release will be tagged as `v1.0.x`. All tags `v0.x.y` must be considered as unstable.*

This project aims to provide components to build an Identity Manager based on the SCIM specifications ([RFC7643](https://tools.ietf.org/html/rfc7643) and [RFC7644](https://tools.ietf.org/html/rfc7644)).

The following components are implemented:

* [ ] [Core Schema](https://tools.ietf.org/html/rfc7643)
    * [ ] [SCIM Schema](https://tools.ietf.org/html/rfc7643#section-2)
        * [ ] [Attributes](https://tools.ietf.org/html/rfc7643#section-2.1)
        * [ ] [Attribute Characteristics](https://tools.ietf.org/html/rfc7643#section-2.2)
        * [ ] [Attribute Data Types](https://tools.ietf.org/html/rfc7643#section-2.3)
            * [ ] [String](https://tools.ietf.org/html/rfc7643#section-2.3.1)
            * [ ] [Boolean](https://tools.ietf.org/html/rfc7643#section-2.3.2)
            * [ ] [Decimal](https://tools.ietf.org/html/rfc7643#section-2.3.3)
            * [ ] [Integer](https://tools.ietf.org/html/rfc7643#section-2.3.4)
            * [ ] [DateTime](https://tools.ietf.org/html/rfc7643#section-2.3.5)
            * [ ] [Binary](https://tools.ietf.org/html/rfc7643#section-2.3.6)
            * [ ] [Reference](https://tools.ietf.org/html/rfc7643#section-2.3.7)
            * [ ] [Complex](https://tools.ietf.org/html/rfc7643#section-2.3.8)
        * [ ] [Multi-Valued Attributes](https://tools.ietf.org/html/rfc7643#section-2.4)
        * [ ] [Unassigned and Null Values](https://tools.ietf.org/html/rfc7643#section-2.5)
    * [ ] [SCIM Resources](https://tools.ietf.org/html/rfc7643#section-3)
        * [ ] [Common Attributes](https://tools.ietf.org/html/rfc7643#section-3.1)
        * [ ] [Defining New Resource Types](https://tools.ietf.org/html/rfc7643#section-3.2)
        * [ ] [Attribute Extensions to Resources](https://tools.ietf.org/html/rfc7643#section-3.3)
    * [ ] [SCIM Core Resources and Extensions](https://tools.ietf.org/html/rfc7643#section-4)
        * [ ] ["User" Resource Schema](https://tools.ietf.org/html/rfc7643#section-4.1)
            * [ ] [Singular Attributes](https://tools.ietf.org/html/rfc7643#section-4.1.1)
            * [ ] [Multi-Valued Attributes](https://tools.ietf.org/html/rfc7643#section-4.1.2)
        * [ ] ["Group" Resource Schema](https://tools.ietf.org/html/rfc7643#section-4.2)
        * [ ] [Enterprise User Schema Extension](https://tools.ietf.org/html/rfc7643#section-4.3)
    * [ ] [Service Provider Configuration Schema](https://tools.ietf.org/html/rfc7643#section-5)
    * [ ] [ResourceType Schema](https://tools.ietf.org/html/rfc7643#section-6)
    * [ ] [Schema Definition](https://tools.ietf.org/html/rfc7643#section-7)
    * [ ] [JSON Representation](https://tools.ietf.org/html/rfc7643#section-8)
        * [ ] [Minimal User Representation](https://tools.ietf.org/html/rfc7643#section-8.1)
        * [ ] [Full User Representation](https://tools.ietf.org/html/rfc7643#section-8.2)
        * [ ] [Enterprise User Extension Representation](https://tools.ietf.org/html/rfc7643#section-8.3)
        * [ ] [Group Representation](https://tools.ietf.org/html/rfc7643#section-8.4)
        * [ ] [Service Provider Configuration Representation](https://tools.ietf.org/html/rfc7643#section-8.5)
        * [ ] [Resource Type Representation](https://tools.ietf.org/html/rfc7643#section-8.6)
        * [ ] [Schema Representation](https://tools.ietf.org/html/rfc7643#section-8.7)
            * [ ] [Resource Schema Representation](https://tools.ietf.org/html/rfc7643#section-8.7.1)
            * [ ] [Service Provider Schema Representation](https://tools.ietf.org/html/rfc7643#section-8.72)
* [ ] [Protocol](https://tools.ietf.org/html/rfc7644)
    * [ ] [Authentication and Authorization](https://tools.ietf.org/html/rfc7644#section-2)
        * [ ] [Use of Tokens as Authorizations](https://tools.ietf.org/html/rfc7644#section-2.1)
        * [ ] [Anonymous Requests](https://tools.ietf.org/html/rfc7644#section-2.1)
    * [ ] [SCIM Protocol](https://tools.ietf.org/html/rfc7644#section-3)
        * [ ] [Background](https://tools.ietf.org/html/rfc7644#section-3.1)
        * [ ] [SCIM Endpoints and HTTP Methods](https://tools.ietf.org/html/rfc7644#section-3.2)
        * [ ] [Creating Resources](https://tools.ietf.org/html/rfc7644#section-3.3)
            * [ ] [Resource Types](https://tools.ietf.org/html/rfc7644#section-3.3.1)
        * [ ] [Retrieving Resources](https://tools.ietf.org/html/rfc7644#section-3.4)
            * [ ] [Retrieving a Known Resource](https://tools.ietf.org/html/rfc7644#section-3.4.1)
            * [ ] [Query Resources](https://tools.ietf.org/html/rfc7644#section-3.4.2)
            * [ ] [Querying Resources Using HTTP POST](https://tools.ietf.org/html/rfc7644#section-3.4.3)
        * [ ] [Modifying Resources](https://tools.ietf.org/html/rfc7644#section-3.4)
            * [ ] [Replacing with PUT](https://tools.ietf.org/html/rfc7644#section-3.5.1)
            * [ ] [Modifying with PATCH](https://tools.ietf.org/html/rfc7644#section-3.5.2)
        * [ ] [Deleting Resources](https://tools.ietf.org/html/rfc7644#section-3.6)
        * [ ] [Bulk Operations](https://tools.ietf.org/html/rfc7644#section-3.7)
            * [ ] [Circular Reference Processing](https://tools.ietf.org/html/rfc7644#section-3.7.1)
            * [ ] ["bulkId" Temporary Identifiers](https://tools.ietf.org/html/rfc7644#section-3.7.2)
            * [ ] [Response and Error Handling](https://tools.ietf.org/html/rfc7644#section-3.7.3)
            * [ ] [Maximum Operations](https://tools.ietf.org/html/rfc7644#section-3.7.4)
        * [ ] [Data Input/Output Formats](https://tools.ietf.org/html/rfc7644#section-3.8)
        * [ ] [Additional Operation Response Parameters](https://tools.ietf.org/html/rfc7644#section-3.9)
        * [ ] [Attribute Notation](https://tools.ietf.org/html/rfc7644#section-3.10)
        * [ ] ["/Me" Authenticated Subject Alias](https://tools.ietf.org/html/rfc7644#section-3.11)
        * [ ] [HTTP Status and Error Response Handling](https://tools.ietf.org/html/rfc7644#section-3.12)
        * [ ] [SCIM Protocol Versioning](https://tools.ietf.org/html/rfc7644#section-3.13)
        * [ ] [Versioning Resources](https://tools.ietf.org/html/rfc7644#section-3.14)
    * [ ] [Service Provider Configuration Endpoints](https://tools.ietf.org/html/rfc7644#section-4)
    * [ ] [Preparation and Comparison of Internationalized Strings](https://tools.ietf.org/html/rfc7644#section-5)
    * [ ] [Multi-Tenancy](https://tools.ietf.org/html/rfc7644#section-6)
        * [ ] [Associating Clients to Tenants](https://tools.ietf.org/html/rfc7644#section-6.1)
        * [ ] [SCIM Identifiers with Multiple Tenants](https://tools.ietf.org/html/rfc7644#section-6.2)

# The Release Process

The release process [is described here](doc/Release.md).

# Prerequisites

This library needs at least ![PHP 5.6+](https://img.shields.io/badge/PHP-5.6%2B-ff69b4.svg).

It is tested on `PHP 5.6`, `PHP 7.0`, `PHP nightly` and `HHVM`.

# Installation

The preferred way to install this library is to rely on Composer:

```sh
composer require "spomky-labs/scim-library"
```

# How to use

_To Be Written._

# Contributing

Requests for new features, bug fixed and all other ideas to make this library useful are welcome.
The best contribution you could provide is by fixing the [opened issues where help is wanted](https://github.com/Spomky-Labs/scim-library/issues?q=is%3Aissue+is%3Aopen+label%3A%22help+wanted%22)

Please make sure to [follow these best practices](doc/Contributing.md).

# Licence

This library is release under [MIT licence](LICENSE).
