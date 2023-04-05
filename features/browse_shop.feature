@browse
Feature: Browse the Amazon online shop
    In order to find products
    As a user
    I want to get informations about products

    Scenario Outline: It receives a response from "<online shop>" shop
        Given a shop named "<online shop>"
        When I visit the website "<url>"
        Then the response should be received
        When I visit the path "<url><search query>"
        Then the response should be received

        Examples:
            | online shop | url                             | search query         |
            | Amazon      | https://www.amazon.fr           | /s?k=                |
            | Rakuten     | https://fr.shopping.rakuten.com | /search/             |
            | Darty       | https://www.darty.com           | /nav/recherche?text= |