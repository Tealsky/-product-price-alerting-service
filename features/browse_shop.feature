@browse
Feature: Browse the Amazon online shop
    In order to find products
    As a script
    I want to get informations about products

    Scenario Outline: It receives a response from "<online shop>" shop
        Given a shop named "<online shop>" with a website "<url>"
        Then the response should be received

        Examples:
            | online shop | url |
            | Amazon      | https://www.amazon.fr           |
            | Rakuten     | https://fr.shopping.rakuten.com |
            | Darty       | https://www.darty.com           |