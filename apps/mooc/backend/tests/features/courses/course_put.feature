Feature: Create a new course
  In order to have courses on the platform
  As a user with admin permissions
  I want to create a new course

  Scenario: A valid non existing course
    Given I send a PUT request to "/courses/0fbb8e99-1f96-418a-9079-554736bde158" with body:
    """
    {
      "name": "The best course",
      "duration": "5 hours"
    }
    """
    Then the response status code should be 201
    Then the response should be empty