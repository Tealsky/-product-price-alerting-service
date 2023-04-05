@browse @amazon
Feature: Browse the Amazon online shop
    In order to find products
    As a script
    I want to get informations about products

    @france
    Scenario: It receives a response from Amazon shop
        When a demo scenario sends a request to "https://www.amazon.fr"
        Then the response should be received