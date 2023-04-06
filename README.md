# LTAGS DEMO APP

This a demo app for Ltags package. The goal is to show an example application
using the package. In this case, we use Ltags to tag posts, which can be use
to categorize, organize, and filter the posts.

## Running locally 

To get this demo up and running, clone this repository and execute the commands:

1. Install `composer` and `docker`, it not already installed
2. Install the vendor dependencies with `composer require`
3. Bring up the container with `docker-compose up --detach --build`
4. Set up the database with `docker exec app php artisan migrate:fresh --seed`

The application should be running on `localhost:8000`; the container name
being `app`. You can tweak those settings in `docker-compose.yml`

## API

Here is a basic REST API to showcase how it works:

```
method       route                                    action
GET|HEAD     api/post .................post.index   › PostController@index
POST         api/post .................post.store   › PostController@store
GET|HEAD     api/post/{post} ..........post.show    › PostController@show
PUT|PATCH    api/post/{post} ..........post.update  › PostController@update
DELETE       api/post/{post} ..........post.destroy › PostController@destroy
POST         api/post/tagged ...................... › PostController@taggedBy
POST         api/post/tagged_all................... › PostController@taggedByAll
```

There are two routes of interest here.First, the GET `api/post` route gives the
posts along with their tag. Use `curl`, `httpie` or any other utils to get them:

```bash
httṕ localhost:8000
```

The POST `api/post/tagged` route expects to receive as
form input a field called `tags`, which must be an array of strings with the
name of the tags. Here is an example:

```bash
http localhost:8000/api/post/tagged tags:='["php", "laravel"]'
```

In the above example, the API will return the posts that are tagged either by
`php` or `laravel`. To get tagged by both, do:

```bash
http localhost:8000/api/post/tagged_all tags:='["php", "laravel"]'
```
