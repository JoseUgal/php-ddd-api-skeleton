Feature: Create a new user
  In order to have users on the platform
  As a simple application user
  I want to create a new user

  Scenario: A valid non registered user
    Given I send a PUT request to "/users/0fbb8e99-1f96-418a-9079-554736bde158" with body:
    """
    {
      "firstName": "José María",
      "lastName": "Ugal Luque"
    }
    """
    Then the response status code should be 201
    Then the response should be empty