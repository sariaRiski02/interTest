## API Documentation

link API: [https://inter-test-api-60fc66bdf295.herokuapp.com/api//](https://inter-test-api-60fc66bdf295.herokuapp.com/api//)

perlu diketahui bahwa didalam database telah terisi data dummy yang bisa gunakan untuk testing dan data di pagination by 5 item

username: `admin`
password: `pastibisa`

### Register Admin

```https
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

Endpoint ini akan mengembalikan objek JSON jika Anda sudah login atau jika Anda mencoba membuat permintaan dengan header "token" yang Anda peroleh dari login sebelumnya.

```json
{
    "status": "error",
    "message": "You are already logged in"
}
```

```https
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

disini token yang didapat dari login akan digunakan untuk mengakses endpoint lainnya,
dengan kata lain setiap request dari enpoint-enpoint dibawah tulisan ini harus menyertakan token yang didapat dari login melalui header request.

### Get Division

```https
  GET /api/division/{name}
```

atau juga bisa difilter berdasarkan nama divisi

```https
  GET /api/division/{name}
```

response:

```json
{
    "status": "success",
    "message": "pesan success",
    "data": {
        "divisions": [
            {
                "id": "0bc7b58b-c615-48f6-b37e-b5948fbb3a45",
                "name": "Division 1"
            },
            {
                "id": "0bc7b58b-c615-48f6-b37e-b5948fbb3a45",
                "name": "Division 2"
            }
        ]
    }
}
```

### Get employee

```https
  GET /api/employee
```

atau anda juga bisa memfilter data employee berdasarkan nama atau divisi serta id employee

```https
  GET /api/employee?param=string
```

```json
 "status": "success",
    "message": "Pesan success",
    "data": {
        "employees": [
            {
                "id": "0bc7b58b-c615-48f6-b37e-b5948fbb3a45",
                "name": "Employee 5",
                "division": {
                    "id": "2b62307c-a939-471a-868f-c32e6b30c607",
                    "name": "UI/UX Designer"
                }
            },

        ]
    },
    "paginatiion":{}
```

<hr>

```https
POST /api/employee
```

request:

```json
{
    "image": "string",
    "name": "string",
    "division": "string/uuid", //uuid division
    "phone": "string",
    "email": "string",
    "position": "string"
}
```

response:

```json
{
    "status": "success/error",
    "message": "created success/success"
}
```

<hr>

### Update employee by id

```https
  PUT /api/employee/:id
```

request:

```json
{
    "image": "string",
    "name": "string",
    "division": "string/uuid", //uuid division
    "phone": "string",
    "email": "string",
    "position": "string"
}
```

response:

```json
{
    "status": "success/error",
    "message": "updated success/success"
}
```

<hr>

### Delete employee by id

```https
  DELETE /api/employee/:id
```

response:

```json
{
    "status": "success/error",
    "message": "deleted success/success"
}
```

<hr>

```https
POST /api/logout
```

response:

```json
{
    "status": "success",
    "message": "logout success"
}
```

token dari admin akan di ganti setelah anda logout logout
