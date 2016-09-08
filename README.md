# System for Cross-domain Identity Management (SCIM) Library for PHP

This project aims to provide components to build an Identity Manager based on the SCIM specifications ([RFC7643](https://tools.ietf.org/html/rfc7643) and [RFC7644](https://tools.ietf.org/html/rfc7644)).

The following components are implemented:

* [ ] Core Schema
    * [ ] SCIM Schema:
        * [ ] Attributes
        * [ ] Attribute Characteristics
        * [ ] Attribute Data Types
            * [ ] String
                * [ ] Boolean
                * [ ] Decimal
                * [ ] Integer
                * [ ] DateTime
                * [ ] Binary
                * [ ] Reference
                * [ ] Complex
            * [ ] Multi-Valued Attributes
            * [ ] Unassigned and Null Values
    * [ ] SCIM Resources
        * [ ] Common Attributes
        * [ ] Defining New Resource Types
        * [ ] Attribute Extensions to Resources
    * [ ] SCIM Core Resources and Extensions
        * [ ] "User" Resource Schema
            * [ ] Singular Attributes
            * [ ] Multi-Valued Attributes
        * [ ] "Group" Resource Schema
        * [ ] Enterprise User Schema Extension
    * [ ] Service Provider Configuration Schema
    * [ ] ResourceType Schema
    * [ ] Schema Definition
    * [ ] JSON Representation
        * [ ] Minimal User Representation
        * [ ] Full User Representation
        * [ ] Enterprise User Extension Representation
        * [ ] Group Representation
        * [ ] Service Provider Configuration Representation
        * [ ] Resource Type Representation
        * [ ] Schema Representation
            * [ ] Resource Schema Representation
            * [ ] Service Provider Schema Representation
* [ ] Protocol
    * [ ] Authentication and Authorization
        * [ ] se of Tokens as Authorizations
        * [ ] Anonymous Requests
    * [ ] SCIM Protocol
        * [ ] Background
        * [ ] SCIM Endpoints and HTTP Methods
        * [ ] Creating Resources
            * [ ] Resource Types
        * [ ] Retrieving Resources
            * [ ] Retrieving a Known Resource
            * [ ] Query Resources
            * [ ] Querying Resources Using HTTP POST
        * [ ] Modifying Resources
            * [ ] Replacing with PUT
            * [ ] Modifying with PATCH
        * [ ] Deleting Resources
        * [ ] Bulk Operations
            * [ ] Circular Reference Processing
            * [ ] "bulkId" Temporary Identifiers
            * [ ] Response and Error Handling
            * [ ] Maximum Operations
        * [ ] Data Input/Output Formats
        * [ ] Additional Operation Response Parameters
        * [ ] Attribute Notation
        * [ ] "/Me" Authenticated Subject Alias
        * [ ] HTTP Status and Error Response Handling
        * [ ] SCIM Protocol Versioning
        * [ ] Versioning Resources
    * [ ] Service Provider Configuration Endpoints
    * [ ] Preparation and Comparison of Internationalized Strings
    * [ ] Multi-Tenancy
        * [ ] Associating Clients to Tenants
        * [ ] SCIM Identifiers with Multiple Tenants
    * [ ] Security Considerations
        * [ ] HTTP Considerations
        * [ ] TLS Support Considerations
        * [ ] Authorization Token Considerations
        * [ ] Bearer Token and Cookie Considerations
        * [ ] Privacy Considerations
            * [ ] Personal Information
            * [ ] Disclosure of Sensitive Information in URIs
        * [ ] Anonymous Requests
        * [ ] Secure Storage and Handling of Sensitive Data
        * [ ] Case-Insensitive Comparison and International Languages

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
