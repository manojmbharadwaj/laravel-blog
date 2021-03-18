## Simple Blog written in Laravel

Below are the high level project structure.

-   All Admin related controllers reside in the namespace 'App\Http\Controllers\Admin'.
-   All request mostly will go through the Interceptors.
-   Interceptor is a Plain PHP Class which validates the request, creates required DTO and assigns the values to DTO Object.
-   Interceptors are coupled with Controllers. So a Web Controller will have its own Interceptor. And an API Controller will have its own Interceptor. Since the validations, and few fields might change for an Web and API request. However, the DTO stays same.
-   DTO is a Plain PHP Class which will have fields mapping to the DataBase and also any other required fields. Getter and Setter methods for the fields. A Model can have its own DTO. A Module could also have its own DTO. Ex: If Payment is a Module and if we need multile fields from multiple tables we could create one DTO for complete Payment Journey.
-   DTO are individual entity. Both Web and API interceptor will create the same DTO for same tasks. Few realed fields might very. Ex: setting user id in Web flow is from auth(), but in API it could be different.
-   Controller and Interceptors are the only starting point and there should not be any business logic in it.
-   Services are Plain PHP classes. Service classes are architectured for the module. Ex: All Post related actions will be done by PostService.
-   Services can work individually. The parameters should only be DTOs. That we both Web and API controller could use same methods from the Service just by passing DTO. Also, it will be easy to write Test Cases.
-   All Business Logic must reside in Service.
-   All Database transactions must reside in Models. Models only deal with DB transactions with try{} catch{} block and will not do any validations.

## Few Modules and misc.

-   Login with Google. Add required values in .env file.
-   For development purpose you can use Fake Login or Fake Register. THIS SHOULD NOT WORK IN PROD ENV. A check has been implemented in Routes, Controllers. However, extra care must be taken for this.
-   By default logged in users are assigned with End User Usertype. So they will not have any routes to perform any additional actions. Ideally no about should be able to Register. We can see the UserType Seeder and also in constants.php
-   Admin can create category, create posts mapping to category.
-   Listing pages are cached.
-   Log proper Exceptions, Security Issues. Helper methods are in config/log_helper.php. A log will get created every day. Exceptions and Security are different directories containing relavent Log Details.

## DB

Run Migrations. Run Seeders [ usertype, category, post ]. Register a user using fake register.

## Coding Standards.

-   All methods must obey Single Responsibility Principle.
-   Any Fetching/Updating/Insertion operations must follow Interceptor(Validations and DTO prepare) -> Services(with DTO) -> Models(DB operations).
-   Any Errors/Info Messages must be set to DTOs.
-   All Business logic should reside only in Services. And Service layer should be re-usable from both Web and API controllers.
