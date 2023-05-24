# Laravel-Service-Repository

## implement
- [X] Test Model, Test View, Test Controller
- [X] Test Service
- [X] Test Repository
- [X] RepositoryServiceProvider bind PostRepositoryInterface
- [X] Register AppServiceProvider

## Resource Route
- 라라벨에서 PUT,PATCH 메소드는 POST메소드로 사용해야되고 _method에 PUT 또는 PATCH값을 담아서 보내야됩니다.

| Verb       | 	URI	Action	     | Route     | Name         | Use | 
|------------|------------------|-----------|--------------|-----|
| GET	       | /test	           | index     | 	test.index  | O   |
| GET	       | /test/create     | 	create	  | test.create  | X   |
| POST	      | /test	           | store	    | test.store   | O   |
| GET	       | /test/{id}	      | show	     | test.show    | O   |
| GET	       | /test/{id}/edit	 | edit	     | test.edit    | X   |
| PUT/PATCH	 | /test/{id}	      | update	   | test.update  | O   |
| DELETE	    | /test/{id}       | 	destroy	 | test.destroy | O   |

## Reference link
 - [https://joe-wadsworth.medium.com/laravel-repository-service-pattern-acf50f95726](https://joe-wadsworth.medium.com/laravel-repository-service-pattern-acf50f95726)
 - [https://blog.devgenius.io/laravel-repository-design-pattern-a-quick-demonstration-5698d7ce7e1f](https://blog.devgenius.io/laravel-repository-design-pattern-a-quick-demonstration-5698d7ce7e1f)
 - [https://dev.to/safbalili/implement-crud-with-laravel-service-repository-pattern-1dkl](https://dev.to/safbalili/implement-crud-with-laravel-service-repository-pattern-1dkl)
 - [https://josafebalili.vercel.app/laravel-service-repository-interface](https://josafebalili.vercel.app/laravel-service-repository-interface)
