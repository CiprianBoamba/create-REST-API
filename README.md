# Book Management REST API

This project is a simple RESTful API that was built using Laravel, a popular PHP framework. The purpose of the API is to manage a collection of books, providing basic Create, Read, Update, and Delete (CRUD) operations.

The API allows users to:

1. List all books in the collection (`GET /api/books`).
2. Create a new book in the collection (`POST /api/books`).
3. Retrieve details about a specific book (`GET /api/books/{id}`).
4. Update details of a specific book (`PUT /api/books/{id}`).
5. Delete a book from the collection (`DELETE /api/books/{id}`).

Each book in the collection has the following attributes: `title`, `author`, `genres`, and `published_year`.

This API is designed to be simple, straightforward, and easy to use, and could be used as a backend for a web or mobile application that manages a collection of books. It follows best practices for RESTful API design and leverages Laravel's robust features to ensure a secure, scalable, and maintainable application.

## API Endpoints

### `GET /api/books`

Retrieves a list of all books.

**Response**

-   `status`: HTTP status code.
-   `books`: An array of books (may be empty if no books exist).
-   `message`: A message stating that no books were found (only if no books exist).

### `POST /api/books`

Creates a new book.

**Request**

The request should include a JSON body with the following properties:

-   `title`: The title of the book.
-   `author`: The author of the book.
-   `genres`: The genres of the book.
-   `published_year`: The year the book was published.

**Response**

-   `status`: HTTP status code.
-   `message`: A success message if the book was created successfully.

### `GET /api/books/{id}`

Retrieves a specific book by its ID.

**Request**

The request should include the ID of the book in the URL.

**Response**

-   `status`: HTTP status code.
-   `book`: The requested book.

### `PUT /api/books/{id}/edit`

Updates a specific book by its ID.

**Request**

The request should include the ID of the book in the URL and a JSON body with the following properties:

-   `title`: The title of the book.
-   `author`: The author of the book.
-   `genres`: The genres of the book.
-   `published_year`: The year the book was published.

**Response**

-   `status`: HTTP status code.
-   `book`: The updated book.

### `DELETE /api/books/{id}`

Deletes a specific book by its ID.

**Request**

The request should include the ID of the book in the URL.

**Response**

-   `status`: HTTP status code.
-   `message`: A success message if the book was deleted successfully.

## Installation Instructions

Before you start, ensure you have [PHP](https://www.php.net/), [Composer](https://getcomposer.org/), and [MySQL](https://www.mysql.com/) installed and properly configured on your machine.

## Usage Instructions

1. **List All Books:** To get a list of all books, make a **`GET`** request to **`/api/books`** .
2. **Create a New Book:** To create a new book, make a **`POST`** request to **`/api/books`** with a JSON body containing **'title'**, **'author'**, **'genres'**, and **'published_year'**.
   Example:

```
{
 "title": "New Book Title",
 "author": "Book Author",
 "genres": "Fiction, Mystery",
 "published_year": 2022
}
```

3. **Retrieve a Specific Book** To get a list of all books, make a **`GET`** request to **`/api/books/{id}`**, where **`{id}`** is the ID of the book you want to retrieve.
4. **Update a Book:** To update an existing book, make a **`PUT`** request to **`/api/books/{id}/edit`** , where **`{id}`** is the ID of the book you want to update. Include a JSON body with the fields **'title'**, **'author'**, **'genres'**, and **'published_year'** that you want to update.
   Example:

```
{
 "title": "Updated  Book Title",
 "author": "Updated  Book Author",
 "genres": "Updated Fiction, Mystery",
 "published_year": 2023
}
```

5. **Delete a Book** To delete a book, make a **`DELETE`** request to **`/api/books/{id}`**, where **`{id}`** is the ID of the book you want to delete.

To interact with this API, you can use any HTTP client, such as [Postman](https://www.postman.com/), or any programming language that can send HTTP requests.

Please note that this API does not require any authentication or authorization at the moment, and it should not be used in production without adding proper security measures.

<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

<p align="center">
<a href="https://github.com/laravel/framework/actions"><img src="https://github.com/laravel/framework/workflows/tests/badge.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

## About Laravel

Laravel is a web application framework with expressive, elegant syntax. We believe development must be an enjoyable and creative experience to be truly fulfilling. Laravel takes the pain out of development by easing common tasks used in many web projects, such as:

-   [Simple, fast routing engine](https://laravel.com/docs/routing).
-   [Powerful dependency injection container](https://laravel.com/docs/container).
-   Multiple back-ends for [session](https://laravel.com/docs/session) and [cache](https://laravel.com/docs/cache) storage.
-   Expressive, intuitive [database ORM](https://laravel.com/docs/eloquent).
-   Database agnostic [schema migrations](https://laravel.com/docs/migrations).
-   [Robust background job processing](https://laravel.com/docs/queues).
-   [Real-time event broadcasting](https://laravel.com/docs/broadcasting).

Laravel is accessible, powerful, and provides tools required for large, robust applications.

## Learning Laravel

Laravel has the most extensive and thorough [documentation](https://laravel.com/docs) and video tutorial library of all modern web application frameworks, making it a breeze to get started with the framework.

You may also try the [Laravel Bootcamp](https://bootcamp.laravel.com), where you will be guided through building a modern Laravel application from scratch.

If you don't feel like reading, [Laracasts](https://laracasts.com) can help. Laracasts contains over 2000 video tutorials on a range of topics including Laravel, modern PHP, unit testing, and JavaScript. Boost your skills by digging into our comprehensive video library.

## Laravel Sponsors

We would like to extend our thanks to the following sponsors for funding Laravel development. If you are interested in becoming a sponsor, please visit the Laravel [Patreon page](https://patreon.com/taylorotwell).

### Premium Partners

-   **[Vehikl](https://vehikl.com/)**
-   **[Tighten Co.](https://tighten.co)**
-   **[Kirschbaum Development Group](https://kirschbaumdevelopment.com)**
-   **[64 Robots](https://64robots.com)**
-   **[Cubet Techno Labs](https://cubettech.com)**
-   **[Cyber-Duck](https://cyber-duck.co.uk)**
-   **[Many](https://www.many.co.uk)**
-   **[Webdock, Fast VPS Hosting](https://www.webdock.io/en)**
-   **[DevSquad](https://devsquad.com)**
-   **[Curotec](https://www.curotec.com/services/technologies/laravel/)**
-   **[OP.GG](https://op.gg)**
-   **[WebReinvent](https://webreinvent.com/?utm_source=laravel&utm_medium=github&utm_campaign=patreon-sponsors)**
-   **[Lendio](https://lendio.com)**

## Contributing

Thank you for considering contributing to the Laravel framework! The contribution guide can be found in the [Laravel documentation](https://laravel.com/docs/contributions).

## Code of Conduct

In order to ensure that the Laravel community is welcoming to all, please review and abide by the [Code of Conduct](https://laravel.com/docs/contributions#code-of-conduct).

## Security Vulnerabilities

If you discover a security vulnerability within Laravel, please send an e-mail to Taylor Otwell via [taylor@laravel.com](mailto:taylor@laravel.com). All security vulnerabilities will be promptly addressed.

## License

The Laravel framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).
