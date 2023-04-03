
Feature: User search
    In order to find the lowest price for a product
    As a user
    I want to compare the price of a product sold on several websites

    Background:
        Given a product named "Google Pixel 7"

    Scenario Outline: Find the product lowest price
        Given there is a shop named "<online shop>" in France
        And there is one "Google Pixel 7", which costs <first product price>€
        And there is another "Google Pixel 7", which costs <second product price>€
        When I search for a "Google Pixel 7"
        Then I should get a "Google Pixel 7", which costs <lowest price>€

        Examples:
            | online shop | first product price | second product price | lowest price |
            | Amazon      | 650                 | 700                  | 650          |
            | Rakuten     | 700                 | 12                   | 12           |
            | Darty       | 1400                | 1800                 | 1400          |
