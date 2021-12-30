## Project Setup
- clone the project https://github.com/imrancse94/webdevs.git

# For Backend:
1. cd backend && composer install
2. setup .env with database config and SMTP
3. php artisan jwt:secret
4. php artisan migrate
5. php artisan db:seed
6. php artisan config:cache

# For Frontend
1. cd frontend && npm install
2. set api base url in frontend/src/config/index.js
3. set the jwt secret from backend env in frontend/src/main.js

# For Admin Login
email: imrancse94@gmail.com
password:123456

### API Information
For api testing. A postman collection has added on "backend/postman_collection.json"
and set collection variable domain value.

- Login Api

curl --location --request POST 'domain//login' \
--header 'Accept: application/json' \
--header 'Content-Type: application/json' \
--header 'Authorization: Bearer token' \
--data-raw '{
    "email":"imrancse94@gmail.com",
    "password":"123456"
}'

- Signup Api

curl --location --request POST 'domain//user/signup' \
--header 'Accept: application/json' \
--header 'Content-Type: application/json' \
--header 'Authorization: Bearer token' \
--data-raw '{
    "name":"Shahrukh Khan",
    "email":"shahrukh@gmail.com",
    "password":"123456"
}'

- Get Auth user

curl --location --request GET domain//auth/user' \
--header 'Accept: application/json' \
--header 'Content-Type: application/json' \
--header 'Authorization: Bearer token'

- Logout

curl --location --request POST 'domain//user/logout' \
--header 'Accept: application/json' \
--header 'Content-Type: application/json' \
--header 'Authorization: Bearer token'

- Order By Id

curl --location --request GET 'domain/order/1' \
--header 'Accept: application/json' \
--header 'Content-Type: application/json' \
--header 'Authorization: Bearer token'

- Order List

curl --location --request GET 'domain/order/list' \
--header 'Accept: application/json' \
--header 'Content-Type: application/json' \
--header 'Authorization: Bearer token'

- New order add

curl --location --request POST 'domain/order/add' \
--header 'Accept: application/json' \
--header 'Content-Type: application/json' \
--header 'Authorization: Bearer token' \
--data-raw '{
    "product_id":1,
    "qty":5
}'

- Order Edit By Id

curl --location --request PUT 'domain/order/edit/8' \
--header 'Accept: application/json' \
--header 'Content-Type: application/json' \
--header 'Authorization: Bearer token' \
--data-raw '{
    "order_status":0,
    "qty":8
}'

- Order delete By Id

curl --location --request DELETE 'domain/order/delete/1' \
--header 'Accept: application/json' \
--header 'Content-Type: application/json' \
--header 'Authorization: Bearer token' \
--data-raw ''

- Product add (only for admin)

curl --location --request POST 'domain/product/add' \
--header 'Accept: application/json' \
--header 'Content-Type: application/json' \
--header 'Authorization: Bearer token' \
--data-raw '{
    "name":"LifeBoy",
    "qty":10,
    "description":"This is test",
    "unit_price":13.5,
    "image":"<base64_image_string>"
}'

- Product get by Id (only for admin)

curl --location --request GET 'domain/product/2' \
--header 'Accept: application/json' \
--header 'Content-Type: application/json' \
--header 'Authorization: Bearer token'


- Product Edit by Id (Only for admin)

curl --location --request PUT 'domain/product/edit/1' \
--header 'Accept: application/json' \
--header 'Content-Type: application/json' \
--header 'Authorization: Bearer token' \
--data-raw '{
    "name":"Lux",
    "qty":2,
    "description":"This is test",
    "unit_price":"13",
    "image":"<base64_image_string>"
}'

- Product delete by id (Only for admin)

curl --location --request DELETE 'domain/product/delete/1' \
--header 'Accept: application/json' \
--header 'Content-Type: application/json' \
--header 'Authorization: Bearer token'

- Product List (Only for admin)

curl --location --request GET 'domain/product/list' \
--header 'Accept: application/json' \
--header 'Content-Type: application/json' \
--header 'Authorization: Bearer token' \
--data-raw ''



