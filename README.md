# Laravel Todo List API


API should provide task management:
- get own tasks by filter
- create own task
- edit own task
- mark own task
- delete own task

After getting the tasks list user can:
- filter by status
- filter by priority 
- filter by title, description (fulltext search)
- sort by createdAt, completedAt, priority - 
must be support sorting by two fields
Example: (priority desc, createdAt asc)

User can't:
- change or remove another user tasks
- remove already done task
- mark as done if task has not completed subtasks

Every task should have fields:
- status (todo, done)
- priority (1...5)
- title
- description
- createdAt
- completedAt

Also task can have subtasks, level of subtask is not limited

## Installation

1. Clone the repository:
    ```sh
    git clone git@github.com:stryker-code/Todo-List-API.git
    ```
2. Run dev environment
    ```sh
    docker-compose up -d
    ```
   
3. Install dependencies
    ```sh
    composer install
    ```

4. Generate application key (if not already generated)
    ```sh
    php artisan key:generate
    ```

5. Run database migrations
    ```sh
    php artisan migrate
    ```

6. Optimize configs
    ```sh
    php artisan optimize 
    ```
   
## Running tests

```sh
php artisan test
```
