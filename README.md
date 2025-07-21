# 🧱 Laravel Modular Architecture with Inertia.js

This project follows a clean, modular structure inspired by Domain-Driven Design (DDD) and service-repository pattern. It is optimized for **medium to large scale Laravel applications** using **Inertia.js** + **Vue 3**.

---

## 📁 Folder Structure

### 🗂️ Backend (`app/Modules`)

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

```

### 💻 Frontend (`resources/js`)

```

resources/js/
├── Pages/
│   └── Tasks/
│       ├── Index.vue
│       ├── Create.vue
│       ├── Edit.vue
│       ├── Show\.vue
│       └── Form.vue         <-- Reusable form component
├── Components/
│   ├── Input.vue
│   ├── Button.vue
│   └── Flash.vue
├── Layouts/
│   └── AppLayout.vue        <-- Shared layout across pages
├── Composables/
│   └── useTaskForm.js       <-- useForm wrapper for task
└── app.js

````

---

## ✅ Features

- Modular design by domain (grouped under `Modules/`)
- Separation of concerns via:
  - `Repository` interface & implementation
  - `Service` layer (business logic)
  - `FormRequest` validation
- Inertia.js + Vue 3 Composition API
- Reusable frontend components and composables
- Scalable for multi-module development

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

## 🖼️ Inertia Pages (Vue 3)

Make sure you create these Vue pages:

```
resources/js/Pages/Tasks/
├── Index.vue     <-- List of tasks
├── Create.vue    <-- Create form (uses Form.vue)
├── Edit.vue      <-- Edit form (uses Form.vue)
├── Show.vue      <-- Task detail
└── Form.vue      <-- Shared by Create & Edit
```

Use Composition API and `useForm` from Inertia:

```js
import { useForm } from '@inertiajs/vue3'

const form = useForm({
  title: '',
  description: '',
  is_done: false
})
```

You can abstract this into a composable like `useTaskForm.js`.

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

## 🎨 Flash Message Example

```vue
<!-- resources/js/Components/Flash.vue -->
<template>
  <div v-if="$page.props.flash.success" class="bg-green-100 text-green-700 p-3 rounded">
    {{ $page.props.flash.success }}
  </div>
</template>
```

Use it in your layout (`AppLayout.vue`) to display success/error messages after actions.

---

## 🚀 Ready to Extend

You can use this structure to create additional modules:

* `User`
* `Project`
* `Invoice`
* etc.

Just replicate the folder structure under `app/Modules/{ModuleName}` and `resources/js/Pages/{ModuleName}`.

---

## 🧠 Inspired by

* Spring Boot service-layer architecture
* Laravel service container & dependency injection
* Domain-first thinking
* Inertia.js for clean SPA-like UX
