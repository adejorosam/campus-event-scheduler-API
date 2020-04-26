
# Campus Event Scheduler API


## Application Description
This is a simple API built to enable event planners and organizers plan ahead for their event and it also allows event attendants register for events they will be attending.

## Features
Below are the features of my Campus Event Scheduler app

Organizers(user) can create event<br/>
Organizers(user) can delete event<br/>
Users can register to attend an event<br/>
Users can unregister from attedning an event<br/>



## Technologies used

Modern PHP technologies were adopted for this project

Laravel: Laravel is a web application framework with expressive, elegant syntax. We’ve already laid the foundation — freeing you to create without sweating the small things.
Visit [here](https://laravel.com/) for more information.



## Installation

```
git clone https://github.com/samson1998/campus-event-scheduler-API.git

cd file

composer install

cp .env.example .env

php artisan key:generate

php -S 127.0.0.1:8080 -t public/
```





## API Routes

<table>
<tr><th>HTTP VERB</th><th>ENDPOINT</th><th>FUNCTIONALITY</th></tr>
<tr><td>POST</td> <td>/api/v1/users</td>  <td>Creates a user</td></tr>
<tr><td>POST</td> <td>/api/v1/login</td>  <td>Login a user</td></tr>
<tr><td>POST</td> <td>/api/v1/users</td>  <td>Creates a user</td></tr>
<tr><td>PATCH</td> <td>/api/v1/users</td>  <td>Update a user</td></tr>
    
<tr><td>POST</td> <td>/api/v1/meeting</td>  <td>Creates a meeting</td></tr>
<tr><td>POST</td> <td>/api/v1/registration</td>  <td>Register for a meeting</td></tr>

<tr><td>GET</td> <td>/api/v1/users</td>  <td>View all users</td></tr>
<tr><td>GET</td> <td>/api/v1/users/{id}</td>  <td>View a particular user</td></tr>
<tr><td>GET</td> <td>/api/v1/meeting/{id}</td>  <td>View a particular meeting</td></tr>
<tr><td>PATCH</td> <td>/api/v1/users</td>  <td>Update a user</td></tr>
<tr><td>DELETE</td> <td>/api/v1/meeting/{id}</td>  <td>Delete a particular meeting</td></tr>
<tr><td>DELETE</td> <td>/api/v1/registration/{id}</td>  <td>Unregister from a particular meeting</td></tr>



</table>

