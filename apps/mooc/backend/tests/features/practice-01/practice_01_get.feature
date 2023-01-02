Feature: Practice 01
  To know if we have acquired the
  necessary knowledge

  Scenario: Check the api practice with name query parameter
    Given I send a GET request to "/practice/01?name=Jose Maria"
    Then the response content should be:
    """
    {
      "mooc-backend": "ok",
      "message": "Esto va fino Jose Maria"
    }
    """

  Scenario: Check the api practice without name query parameter
    Given I send a GET request to "/practice/01"
    Then the response content should be:
    """
    {
      "mooc-backend": "ok",
      "message": "Esto va fino Anonimo"
    }
    """