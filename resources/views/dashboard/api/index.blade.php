@extends('dashboard.layouts.default')

@section('breadcrumbs')

    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3">
        <p class="h2">API</p>
    </div>

@stop

@section('content')

    <h5>1.Auth</h5> <br>

    <h5>To get the <p>authorization token</p> you must use the following root:</h5>
    <pre><code class="language-html">POST http://DOMAIN/api/auth/login
</code></pre> <br>

    <h5>Send the data for authorization in the body of <code>POST</code> request in the format <code>JSON</code>:</h5>
    <pre><code class="language-javascript">{
    "email": "api-test@abelohost.com",
    "password": "qwerty"
}</code></pre> <br>

    <h5>A successful answer would look like this:</h5>
    <pre><code class="language-javascript">{
    "token": "eyJ0eXAiOiJKV1QiLCJhbGciOiJSUzI1NiJ9.eyJhdWQiOiIxIiwianRpIjoiMGJmNGE0OWI4OTQ2MGMwMTQwOWUzMzdmNTc0YWIzNmJhYjEwZjgyMzc2YzEwNmZmMGNkODg5ZDViNzQ0N2UxNTMyNTg3M2E2OWZhZjZhMTMiLCJpYXQiOjE2MDcyOTc5MDUsIm5iZiI6MTYwNzI5NzkwNSwiZXhwIjoxNjM4ODMzOTA1LCJzdWIiOiIxIiwic2NvcGVzIjpbXX0.TzckBtBOllHe3Ja8dfc1qb2ByNJ_iiCE9qC7PU3N_As9S8e3CWo7Qp-TjJ1RozodB2v2QHqCuSO34IBm7SUS6HG6kKdfjKQnHD3bfmB0VO8qkvDzDTVn46i-hikJupuj_7wkwL-DD0-7GObFTOFhiZbdpX9KoZTTNNMb_oPt9tdowDmDf76J_LdNOhaKll26cT_G4vgQc_dp4yppQD_cBoo4lXNeznCuJNLPeBJiWvy4zki4yofYVpjTo9YZN4aDlnbNWy5OZKuLFYTFcNnqAT2TP6SwL8F-vIrJSoWcNuYhv-WiCwZTKxWAFpkpLTz1XmjLDkGVblv3VAztrFl7NrKNOGh0TdyQW1V9LlFs9BcuUeWfN0Fn-fr_aSlbOQH8jvqNrvugRLUyJjR4g-svflEOH_n2rRFjmDViwYy1N-256ONASKH0TXi5MNQqZUxkvQGZEvCMdzmkodsUTax9jVkQe5gu81NmmFtxZ6BIYxOm6Lz3L1j4GboCJf8tkZNrKmHgiPbJZrPJiTxDoKRihleUZjnqBc939PolLqLus1tT9RZs0lpnURM6FP7xvJh9zsMEvb_RgGTyplgJq2AlpehHjCthG0w1EDhBn2TJFpomOP6w9dHUdg8CcBtLKDTgl5hGwz2H2ImeHyg8e8JR_hCkVw3pjLQ5mbieUIShfLQ",
    "message": "You are successfully logged in."
}</code></pre> <br>

    <p>In the case of incorrect authorization data, the answer will be:</p>
    <pre><code class="language-javascript">{
    "error": {
        "message": "User authorization failed."
    }
}</code></pre> <br>

    <h5>2. Retrieving a list of items</h5> <br>

    <p>To refer to <code>methods API</code> you must add a header:</p>
    <pre><code class="language-javascript">{
    "Authorization": "Bearer eyJ0eXAiOiJKV1QiLCJhbGciOiJSUzI1NiJ9.eyJhdWQiOiIxIiwianRpIjoiMGJmNGE0OWI4OTQ2MGMwMTQwOWUzMzdmNTc0YWIzNmJhYjEwZjgyMzc2YzEwNmZmMGNkODg5ZDViNzQ0N2UxNTMyNTg3M2E2OWZhZjZhMTMiLCJpYXQiOjE2MDcyOTc5MDUsIm5iZiI6MTYwNzI5NzkwNSwiZXhwIjoxNjM4ODMzOTA1LCJzdWIiOiIxIiwic2NvcGVzIjpbXX0.TzckBtBOllHe3Ja8dfc1qb2ByNJ_iiCE9qC7PU3N_As9S8e3CWo7Qp-TjJ1RozodB2v2QHqCuSO34IBm7SUS6HG6kKdfjKQnHD3bfmB0VO8qkvDzDTVn46i-hikJupuj_7wkwL-DD0-7GObFTOFhiZbdpX9KoZTTNNMb_oPt9tdowDmDf76J_LdNOhaKll26cT_G4vgQc_dp4yppQD_cBoo4lXNeznCuJNLPeBJiWvy4zki4yofYVpjTo9YZN4aDlnbNWy5OZKuLFYTFcNnqAT2TP6SwL8F-vIrJSoWcNuYhv-WiCwZTKxWAFpkpLTz1XmjLDkGVblv3VAztrFl7NrKNOGh0TdyQW1V9LlFs9BcuUeWfN0Fn-fr_aSlbOQH8jvqNrvugRLUyJjR4g-svflEOH_n2rRFjmDViwYy1N-256ONASKH0TXi5MNQqZUxkvQGZEvCMdzmkodsUTax9jVkQe5gu81NmmFtxZ6BIYxOm6Lz3L1j4GboCJf8tkZNrKmHgiPbJZrPJiTxDoKRihleUZjnqBc939PolLqLus1tT9RZs0lpnURM6FP7xvJh9zsMEvb_RgGTyplgJq2AlpehHjCthG0w1EDhBn2TJFpomOP6w9dHUdg8CcBtLKDTgl5hGwz2H2ImeHyg8e8JR_hCkVw3pjLQ5mbieUIShfLQ"
}
</code></pre> <br>

    <p>To get the <code>product list</code> you must use the following route:</p>
    <pre><code class="language-html">GET http://DOMAIN/api/items/get
</code></pre> <br>

    <p>A successful answer would look like this:</p>
    <pre><code class="language-javascript">[
    {
        "id": 1,
        "name": "Product number 1",
        "description": "desc that product",
        "price": 1000
    },
    {
        "id": 5,
        "name": "Product number 2",
        "description": null,
        "price": 1800
    }
]</code></pre> <br>

    <h5>3. Receiving one product</h5> <br>

    <p>To receive the <code> of the product by its ID </code>, you must use the following route:</p>
    <pre><code class="language-html">GET http://DOMAIN/api/items/{id}
</code></pre> <br>

    <p>A successful response will look like this:</p>
    <pre><code class="language-javascript">{
        "id": 1,
"name": "Item number 1",
"description": "Description of the first item",
        "price": 1000
}</code></pre> <br>

    <p>An unsuccessful response will look like this:</p>
    <pre><code class="language-javascript">{
    "error": {
        "message": "The product was not found."
    }
}</code></pre> <br>

    <h5>4. Adding a new product</h5> <br>

    <p>To add <code>a new product</code>, you need to use the following router:</p>
    <pre><code class="language-html">POST http://DOMAIN/api/items/create
</code></pre> <br>

    <p>We pass the data to be added in the request body in the format <code>JSON</code>:</p>
    <pre><code class="language-javascript">{
"name": "Item number 3",
"description": "Description (optional)",
"price": 5400
}</code></pre> <br>

    <p>A successful response will look like this:</p>
    <pre><code class="language-javascript">{
"message": "New product successfully added."
}</code></pre> <br>

    <p>An unsuccessful response will look like this:</p>
    <pre><code class="language-javascript">{
    "error": {
        "message": "Failed to add a new product."
}
}</code></pre> <br>

    <h5>5. Product change</h5> <br>

    <p>To change the data <code>of an already added product</code>, you must use the following router:</p>
    <pre><code class="language-html">PATCH http://DOMAIN/api/items/{id}/update
</code></pre> <br>

    <p>Send the data for addition in the body of the request in the format <code>JSON</code>:</p>
    <pre><code class="language-javascript">{
    "name": "Product number 3",
    "description": "Description (optional)",
    "price": 7200
}</code></pre> <br>

    <p>A successful answer would look like this:</p>
    <pre><code class="language-javascript">{
    "message": "Product data has been successfully updated."
}</code></pre> <br>

    <p>An unsuccessful answer would look like this:</p>
    <pre><code class="language-javascript">{
    "error": {
        "message": "Failed to update product data."
    }
}</code></pre> <br>

    <h5>6.Delete product</h5> <br>

    <p>To delete an <code>already added product</code> you have to use the following route:</p>
    <pre><code class="language-html">DELETE http://DOMAIN/api/items/{id}/delete
</code></pre> <br>

    <p>Успешный ответ будет выглядить следующим образом:</p>
    <pre><code class="language-javascript">{
    "message": "The item has been successfully deleted."
}</code></pre> <br>

    <p>An unsuccessful answer would look like this:</p>
    <pre><code class="language-javascript">{
    "error": {
        "message": "Failed to remove an item."
    }
}</code></pre> <br>

@stop
