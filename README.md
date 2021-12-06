
### Prerequisites
1. Install laravel valet. - [installation guide link](https://laravel.com/docs/7.x/valet#installation)
2. Install PHP 7.4
3. Create a mysql database named 'laravel' with default settings

### Steps for this repo
1. Clone this repository.
2. Navigate to the root location of the repository in a terminal window.
3. Create the .env file by copying the .env.example included:
    ```bash
    cp .env.example .env
    ```
4. Install all the dependency packages:
    ```bash
    composer install
    ```
5. Change directory /public:
    ```bash
    cd public
    ```
6. Create secure links to valet:
    ```bash
    valet link
    ```
    
7. Generate the required encryption keys:
    ```bash
    php artisan key:generate
    ```    
8. Run  migrations and seed db:
    ```bash
    php artisan migrate
    php artisan db:seed
    ```      
