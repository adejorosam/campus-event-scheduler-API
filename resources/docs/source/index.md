---
title: API Reference

language_tabs:
- bash
- javascript

includes:

search: true

toc_footers:
- <a href='http://github.com/mpociot/documentarian'>Documentation Powered by Documentarian</a>
---
<!-- START_INFO -->
# Info

Welcome to the generated API reference.
[Get Postman Collection](http://localhost/docs/collection.json)

<!-- END_INFO -->

#Meeting management


APIs for managing meetings
<!-- START_252941a151d9381a497ff9f4fcd7c736 -->
## api/v1/meeting
> Example request:

```bash
curl -X GET \
    -G "http://localhost/api/v1/meeting" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -H "Authorization: Bearer {token}" \
    -H "Api-Version: v1"
```

```javascript
const url = new URL(
    "http://localhost/api/v1/meeting"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
    "Authorization": "Bearer {token}",
    "Api-Version": "v1",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (201):

```json
{
    "message": "List of meetings",
    "meeting": [
        {
            "id": 1,
            "title": "Meeting to discuss strategy",
            "description": "strategy discussion",
            "time": "2016-01-15 00:00:00",
            "user_id": 2,
            "created_at": "2020-04-17T07:36:35.000000Z",
            "updated_at": "2020-04-17T07:36:35.000000Z",
            "view_meeting": {
                "href": "api\/v1\/meeting\/1",
                "method": "GET"
            }
        },
        {
            "id": 4,
            "title": "Meeting to discuss strategy",
            "description": "strategic discussion",
            "time": "2016-01-15 00:00:00",
            "user_id": 3,
            "created_at": "2020-04-17T20:21:13.000000Z",
            "updated_at": "2020-04-17T23:08:04.000000Z",
            "view_meeting": {
                "href": "api\/v1\/meeting\/4",
                "method": "GET"
            }
        }
    ]
}
```

### HTTP Request
`GET api/v1/meeting`


<!-- END_252941a151d9381a497ff9f4fcd7c736 -->

<!-- START_b5e43f5a2b64e1e585fb72d907fab038 -->
## api/v1/meeting
> Example request:

```bash
curl -X POST \
    "http://localhost/api/v1/meeting" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -H "Authorization: Bearer {token}" \
    -H "Api-Version: v1" \
    -d '{"title":"voluptate","description":"sapiente","time":"sint"}'

```

```javascript
const url = new URL(
    "http://localhost/api/v1/meeting"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
    "Authorization": "Bearer {token}",
    "Api-Version": "v1",
};

let body = {
    "title": "voluptate",
    "description": "sapiente",
    "time": "sint"
}

fetch(url, {
    method: "POST",
    headers: headers,
    body: body
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`POST api/v1/meeting`

#### Body Parameters
Parameter | Type | Status | Description
--------- | ------- | ------- | ------- | -----------
    `title` | string |  required  | The title of the meeting.
        `description` | string |  required  | The description of the meeting.
        `time` | datetime |  required  | The time of the meeting.
    
<!-- END_b5e43f5a2b64e1e585fb72d907fab038 -->

<!-- START_465fce8173591ce7fdcbfbb4c1692ba3 -->
## api/v1/meeting/{meeting}
> Example request:

```bash
curl -X GET \
    -G "http://localhost/api/v1/meeting/1" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -H "Authorization: Bearer {token}" \
    -H "Api-Version: v1"
```

```javascript
const url = new URL(
    "http://localhost/api/v1/meeting/1"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
    "Authorization": "Bearer {token}",
    "Api-Version": "v1",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (200):

```json
{
    "message": "Details about the meeting",
    "meeting": {
        "id": 4,
        "title": "Meeting to discuss strategy",
        "description": "strategic discussion",
        "time": "2016-01-15 00:00:00",
        "user_id": 3,
        "created_at": "2020-04-17T20:21:13.000000Z",
        "updated_at": "2020-04-17T23:08:04.000000Z",
        "view_meeting": {
            "href": "api\/v1\/meeting",
            "method": "GET, POST"
        },
        "users": [
            {
                "id": 3,
                "name": "Samson Adejoro",
                "email": "samsonadejoro@gmail.com",
                "email_verified_at": null,
                "created_at": "2020-04-17T19:01:35.000000Z",
                "updated_at": "2020-04-17T19:01:35.000000Z",
                "pivot": {
                    "meeting_id": 4,
                    "user_id": 3
                }
            }
        ]
    },
    "organizer": "Samson Adejoro",
    "Registered for the meeting": "Samson Adejoro"
}
```

### HTTP Request
`GET api/v1/meeting/{meeting}`


<!-- END_465fce8173591ce7fdcbfbb4c1692ba3 -->

<!-- START_4c6db41d11a63735a162460a8eb0bfbc -->
## api/v1/meeting/{meeting}
> Example request:

```bash
curl -X PUT \
    "http://localhost/api/v1/meeting/1" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -H "Authorization: Bearer {token}" \
    -H "Api-Version: v1"
```

```javascript
const url = new URL(
    "http://localhost/api/v1/meeting/1"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
    "Authorization": "Bearer {token}",
    "Api-Version": "v1",
};

fetch(url, {
    method: "PUT",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`PUT api/v1/meeting/{meeting}`

`PATCH api/v1/meeting/{meeting}`

#### URL Parameters

Parameter | Status | Description
--------- | ------- | ------- | -------
    `id` |  required  | integer The ID of the meeting.

<!-- END_4c6db41d11a63735a162460a8eb0bfbc -->

<!-- START_47918cf37e12dec2d31daaeb06093ab4 -->
## api/v1/meeting/{meeting}
> Example request:

```bash
curl -X DELETE \
    "http://localhost/api/v1/meeting/1" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -H "Authorization: Bearer {token}" \
    -H "Api-Version: v1"
```

```javascript
const url = new URL(
    "http://localhost/api/v1/meeting/1"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
    "Authorization": "Bearer {token}",
    "Api-Version": "v1",
};

fetch(url, {
    method: "DELETE",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`DELETE api/v1/meeting/{meeting}`

#### URL Parameters

Parameter | Status | Description
--------- | ------- | ------- | -------
    `id` |  required  | integer The ID of the meeting.

<!-- END_47918cf37e12dec2d31daaeb06093ab4 -->

#Registration management


APIs for managing registrations
<!-- START_d151775b4e8be5e781e4bfc1e9edd3f0 -->
## api/v1/registration
> Example request:

```bash
curl -X POST \
    "http://localhost/api/v1/registration" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -H "Authorization: Bearer {token}" \
    -H "Api-Version: v1" \
    -d '{"meeting_id":7}'

```

```javascript
const url = new URL(
    "http://localhost/api/v1/registration"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
    "Authorization": "Bearer {token}",
    "Api-Version": "v1",
};

let body = {
    "meeting_id": 7
}

fetch(url, {
    method: "POST",
    headers: headers,
    body: body
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`POST api/v1/registration`

#### Body Parameters
Parameter | Type | Status | Description
--------- | ------- | ------- | ------- | -----------
    `meeting_id` | integer |  required  | The meeting_id of the meeting.
    
<!-- END_d151775b4e8be5e781e4bfc1e9edd3f0 -->

<!-- START_2e9ba3196765d9ac5c0b3e7501d08f64 -->
## api/v1/registration/{registration}
> Example request:

```bash
curl -X DELETE \
    "http://localhost/api/v1/registration/1" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -H "Authorization: Bearer {token}" \
    -H "Api-Version: v1" \
    -d '{"meeting_id":13}'

```

```javascript
const url = new URL(
    "http://localhost/api/v1/registration/1"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
    "Authorization": "Bearer {token}",
    "Api-Version": "v1",
};

let body = {
    "meeting_id": 13
}

fetch(url, {
    method: "DELETE",
    headers: headers,
    body: body
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`DELETE api/v1/registration/{registration}`

#### Body Parameters
Parameter | Type | Status | Description
--------- | ------- | ------- | ------- | -----------
    `meeting_id` | integer |  required  | The meeting_id of the meeting.
    
<!-- END_2e9ba3196765d9ac5c0b3e7501d08f64 -->

#User management


APIs for managing users
<!-- START_8ae5d428da27b2b014dc767c2f19a813 -->
## api/v1/register
> Example request:

```bash
curl -X POST \
    "http://localhost/api/v1/register" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -H "Authorization: Bearer {token}" \
    -H "Api-Version: v1"
```

```javascript
const url = new URL(
    "http://localhost/api/v1/register"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
    "Authorization": "Bearer {token}",
    "Api-Version": "v1",
};

fetch(url, {
    method: "POST",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (200):

```json
{
    "message": "User created",
    "user": {
        "name": "Samson Adejoro",
        "email": "samsonadejoro@gmail.com",
        "updated_at": "2020-04-17T19:01:35.000000Z",
        "created_at": "2020-04-17T19:01:35.000000Z",
        "id": 3,
        "view_users": {
            "href": "api\/v1\/users",
            "method": "GET"
        }
    }
}
```

### HTTP Request
`POST api/v1/register`


<!-- END_8ae5d428da27b2b014dc767c2f19a813 -->

<!-- START_8c0e48cd8efa861b308fc45872ff0837 -->
## api/v1/login
> Example request:

```bash
curl -X POST \
    "http://localhost/api/v1/login" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -H "Authorization: Bearer {token}" \
    -H "Api-Version: v1"
```

```javascript
const url = new URL(
    "http://localhost/api/v1/login"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
    "Authorization": "Bearer {token}",
    "Api-Version": "v1",
};

fetch(url, {
    method: "POST",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (200):

```json
null
```

### HTTP Request
`POST api/v1/login`


<!-- END_8c0e48cd8efa861b308fc45872ff0837 -->

<!-- START_1aff981da377ba9a1bbc56ff8efaec0d -->
## api/v1/users
> Example request:

```bash
curl -X GET \
    -G "http://localhost/api/v1/users" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -H "Authorization: Bearer {token}" \
    -H "Api-Version: v1"
```

```javascript
const url = new URL(
    "http://localhost/api/v1/users"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
    "Authorization": "Bearer {token}",
    "Api-Version": "v1",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (201):

```json
{
    "message": "Users",
    "users": [
        {
            "id": 3,
            "name": "Samson Adejoro",
            "email": "samsonadejoro@gmail.com",
            "email_verified_at": null
        }
    ]
}
```

### HTTP Request
`GET api/v1/users`


<!-- END_1aff981da377ba9a1bbc56ff8efaec0d -->

<!-- START_8e370f8df2793730b7d1497cb3d3a38c -->
## api/v1/users/{id}
> Example request:

```bash
curl -X GET \
    -G "http://localhost/api/v1/users/1" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -H "Authorization: Bearer {token}" \
    -H "Api-Version: v1"
```

```javascript
const url = new URL(
    "http://localhost/api/v1/users/1"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
    "Authorization": "Bearer {token}",
    "Api-Version": "v1",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (200):

```json
null
```

### HTTP Request
`GET api/v1/users/{id}`


<!-- END_8e370f8df2793730b7d1497cb3d3a38c -->


