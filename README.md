#GraphQL API for Magento2

This fork makes module works with latest versions of related modules. It's made by deleting conflicting things. Tests are broken in this branch. Also one of the files is a copypast of the base class.

##Installation

Install this magento2 module using composer:
```
composer require we-like-graphql/magento2-graphql
```

```
bin/magento module:enable graphan_Magento2GraphQL
bin/magento setup:upgrade
```

It exposes GraphQL Endpoint at:
```
http://<your_magento2_path>/index.php/graphql
```

We highly recommend using [GraphIQL Feen](https://chrome.google.com/webstore/detail/graphiql-feen/mcbfdonlkfpbfdpimkjilhdneikhfklp) to explore this endpoint.

##List of covered [Magento's REST APIs](http://devdocs.magento.com/swagger/)
 - [backendModuleService](http://devdocs.magento.com/swagger/#!/backendModuleServiceV1)
 - [catalogCategoryAttributeRepository](http://devdocs.magento.com/swagger/#!/catalogCategoryAttributeRepositoryV1)
 - [catalogCategoryManagement](http://devdocs.magento.com/swagger/#!/catalogCategoryManagementV1)
 - [catalogCategoryRepository](http://devdocs.magento.com/swagger/#!/catalogCategoryRepositoryV1)
 - [catalogProductAttributeRepository](http://devdocs.magento.com/swagger/#!/catalogProductAttributeRepositoryV1)
 - [catalogProductRepository](http://devdocs.magento.com/swagger/#!/catalogProductRepositoryV1)

