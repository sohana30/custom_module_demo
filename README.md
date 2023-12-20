# Local Development Setup

## Installation

Prerequisites:

1.[Git](https://git-scm.com/book/en/v2/Getting-Started-Installing-Git)

2.[Docker](https://www.digitalocean.com/community/tutorials/how-to-install-and-use-docker-on-ubuntu-20-04)

3.[Docker Compose](https://www.digitalocean.com/community/tutorials/how-to-install-and-use-docker-compose-on-ubuntu-22-04)

4.[Lando](https://docs.lando.dev/basics/installation.html)

5. Clone this repository

   ```shell script
   https://github.com/sohana30/thesis_minisite.git
   ```

### Composer

- cd inside the folder
- `composer install`

### Lando

- Create the application using `lando start`. This will handle installing the composer packages.
- if issue occurs do
  - `lando destroy`
  - `lando rebuild`
- Import config files `lando drush cim`
  - If issue occur can import database too directly `lando db-import drupal9.2023-12-19-1703025703.sql.gz`

## Check custom module output

- Enable the demo_module module: `lando drush en demo_module`

- Access the endpoint at <http://demo-module.lndo.site/demo-module/endpoint/100/125> in your browser.
  - Will get addition of 2 string
    - Can check output with different input

# Code Explanation

## Custom module: demo_module

1.`demo_module.info.yml`: Module configuration file.

- This info.yml file provides crucial information about the module, helping Drupal understand and manage the module within the context of the Drupal site. The metadata defined here is used by Drupal's module system to install, enable, and configure the module appropriately.

2.`demo_module.services.yml`: Service definitions for custom services.

3.`src/AdderService.php`: Custom service class to perform number addition.

- This file have addition logic.

4.`src/StringFormatterService.php`: Custom service class to format strings.

- Purpose: The purpose of this class is to provide a service for formatting a string that includes the result of adding two numbers. It uses the AdderService to perform the addition.

- Dependency Injection: It demonstrates dependency injection by injecting an instance of the AdderService into the constructor, allowing the class to use the functionality of the AdderService.

- The use of t() for string translation makes the module more accessible for internationalization.

- Usage: This class is likely used within Drupal controllers or other service classes to generate formatted strings based on the addition of two numbers.

5.`demo_module.routing.yml`: Routing configuration for the module.

- This route configuration sets up a path `/demo-module/endpoint/{num1}/{num2}`, where {num1} and {num2} are placeholders for numeric values. When a user accesses this path, the DemoModuleController::content method will be called to handle the request, and the user must have the 'access content' permission to view the content.

6.`src/Controller/DemoModuleController.php`: Controller class for the module.

- Purpose: This controller handles the logic for displaying content based on parameters provided in the URL. It uses the StringFormatterService to format a string based on the provided or default numbers.

- Dependency Injection: The StringFormatterService is injected into the controller, demonstrating dependency injection, allowing the controller to use the functionality of the service.

- Factory Method: The create method serves as a factory method, creating an instance of the controller with the necessary dependencies.

- Rendering Output: The controller returns an array with the HTML markup to be displayed, using the formatted string from the StringFormatterService.
# custom_module_demo
