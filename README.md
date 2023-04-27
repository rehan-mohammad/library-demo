
# Library Demo

Basic scaffold of a library management application containing Libraries, Books, Users.

## Custom (non-standard) Models

### Libraries

| Field | Type     | Description                |
| :-------- | :------- | :------------------------- |
| `name` | `string` |Contains the name of the Library |

### Books

| Field | Type     | Description                |
| :-------- | :------- | :------------------------- |
| `title` | `string` |Contains the title of the Book |
| `author` | `string` |Contains the author of the Book |
| `library_id` | `integer` |Library which this book belongs to |
| `user_id` | `integer` |User who is currently borrowing this book |
| `is_available` | `boolean` |Stores value to denote whether the book is currently available |


## API Reference

#### Get all books

```http
  GET /api/books
```

## License

The Laravel framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).
