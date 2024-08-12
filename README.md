## API Documentation

### Register Admin

```http
  GET /api/register
```

requets body:

```json
{
    "username": "string",
    "password": "string"
}
```

response:

```json
{
    "status": "error/success",
    "message": "created success"
}
```

### Login Admin

```http
  POST /api/login
```

requets body:

```json
{
    "username": "string",
    "password": "string"
}
```

response:

```json
example:
{
    "status": "success",
    "message": "pesan success",
    "data": {
        "token": "O8q1KvswqJ",
        "admin": {
            "id": "0a70a9cd-0c8b-49b6-8f46-9cc71fce5efe",
            "name": "Admin",
            "username": "admin",
            "phone": "081234567890",
            "email": "admin@example.com"
        }
    }
}
```

### Get
