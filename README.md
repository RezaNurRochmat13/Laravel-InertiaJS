# 🧱 Laravel Modular Architecture with Inertia.js

This project follows a clean, modular structure inspired by Domain-Driven Design (DDD) and service-repository pattern. It is optimized for **medium to large scale Laravel applications** using **Inertia.js** + **Vue**.

---

## 📁 Folder Structure
```
app/
└── Modules/
└── Task/
├── Models/
│   └── Task.php
├── Repositories/
│   ├── TaskRepositoryInterface.php
│   └── TaskRepository.php
├── Services/
│   └── TaskService.php
├── Http/
│   └── Controllers/
│       └── TaskController.php
└── Requests/
├── StoreTaskRequest.php
└── UpdateTaskRequest.php

````

---

## ✅ Features

- Modular design by domain (grouped under `Modules/`)
- Separation of concerns via:
  - `Repository` interface & implementation
  - `Service` layer (business logic)
  - `FormRequest` validation
- Clean controller using Inertia.js
- Easily scalable and testable

---

## ⚙️ Setup

```bash
composer install
cp .env.example .env
php artisan key:generate
php artisan migrate
npm install && npm run dev
````

---

## 🧩 Route Setup

```php
// routes/web.php
use App\Modules\Task\Http\Controllers\TaskController;

Route::resource('tasks', TaskController::class);
```

This registers the following routes:

| Method | URI              | Action  |
| ------ | ---------------- | ------- |
| GET    | /tasks           | index   |
| GET    | /tasks/create    | create  |
| POST   | /tasks           | store   |
| GET    | /tasks/{id}      | show    |
| GET    | /tasks/{id}/edit | edit    |
| PUT    | /tasks/{id}      | update  |
| DELETE | /tasks/{id}      | destroy |

---

## 💡 Dependency Injection Binding

Bind the repository in your `AppServiceProvider`:

```php
use App\Modules\Task\Repositories\TaskRepositoryInterface;
use App\Modules\Task\Repositories\TaskRepository;

public function register()
{
    $this->app->bind(TaskRepositoryInterface::class, TaskRepository::class);
}
```

---

## 🖼️ Inertia Pages (Frontend Vue)

Make sure you create these Vue components in:

```
resources/js/Pages/Tasks/
├── Index.vue
├── Create.vue
├── Edit.vue
└── Show.vue
```

Each page will receive the appropriate `props` from the controller.

---

## 🧪 Example: Controller

```php
public function store(StoreTaskRequest $request)
{
    $this->service->create($request->validated());
    return redirect()->route('tasks.index')->with('success', 'Task created.');
}
```

---

## 🚀 Ready to Extend

You can use this structure to create additional modules:

* `User`
* `Project`
* `Invoice`
* etc.

Simply replicate the folder structure under `app/Modules/{ModuleName}`.

---

## 🧠 Inspired by

* Spring Boot service-layer architecture
* Laravel service container & dependency injection
* Domain-first thinking
* Inertia.js for clean SPA-like UX
