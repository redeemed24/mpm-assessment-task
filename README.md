# My Plan Manager Assessment Task

A package in PHP (using Laravel framework) that lists companies and number of employees and export the list in CSV file.

### Installation
1. Composer Install
2. php artisan migrate
3. php artisan db:seed
4. php artisan jwt:secret

### Set up
- On your **.env** file make sure to add S3 credentials 
- *(If this is not set up properly, export function won't work)*:
    - AWS_ACCESS_KEY_ID
    - AWS_SECRET_ACCESS_KEY
    - AWS_DEFAULT_REGION
    - AWS_BUCKET

##### Any questions, contact me on my email: mae.caloyon@gmail.com