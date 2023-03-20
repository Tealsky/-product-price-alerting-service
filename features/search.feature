
Feature: User search
    In order to find the lowest price for a product
    As a user
    I want to compare the price of a product sold on several websites

    Background:
        Given a product named "Google Pixel 7"
        And an online store named "Amazon"
#        And an online store named named "Rakuten"
#        And an online store named named "Darty"

    Scenario Outline: Find the product lowest price on <online shop>
        Given there is a "Google Pixel 7", which costs <first product price> on <online shop>
        And there is another "Google Pixel 7", which costs <second product price> on <online shop>
        When when I search for "Google Pixel 7"
        Then I should get one "Google Pixel 7" product, which costs <lowest price>

        Examples:
            | online shop | first product price | second product price | lowest price |
            | Amazon      | 650€                | 700€                 | 650€         |
            | Rakuten     | 800€                | 12€                  | 12€          |