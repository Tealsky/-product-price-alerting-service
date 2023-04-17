@browse
Feature: Browse online shops
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

    Scenario Outline: Go to the "Amazon" search results page for the product named "<product name>"
        Given a shop named "Amazon"
        When I search for a product called "<search>" with the url : "<url>"
        Then the response should be received
        Then The main results section should be present.

        Examples:
            | search              | url                             |
            | Google Pixel 7      | https://www.amazon.fr/s?k=google+pixel+7           |
            | Éponge              | https://www.amazon.fr/s?k=éponge |
            | L'aspirateur        | https://www.amazon.fr/s?k=l'aspirateur          |
            | L'aspirateur        | https://www.amazon.fr/s?k=l%27aspirateur        |
