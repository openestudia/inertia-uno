# InertiaUno

InertiaUno is a Laravel package that provides frontend features and integrates Unocss into your Laravel project. It simplifies the process of installing InertiaJS, adding middleware, installing Lodash, and integrating UNOCSS and VUE Iconify. It also offers commands to publish views, CSS files, JS files, and Vue files.

## Installation

You can install InertiaUno via Composer:

```bash
composer require estudia/inertia-uno
```

and then you can install InertiaUno and set up its frontend features, run the following command:

```bash
php artisan inertia-uno:install
```

This command will guide you through a series of prompts to install InertiaJS, add middleware, install Lodash, UNOCSS, VUE Iconify, and publish various files. You can choose which features to install based on your project requirements.

## Implementing InertiaUno in Laravel

To demonstrate how to implement InertiaUno in a Laravel project, follow these steps:

1. Create a new controller, let's call it `TestController`, by running the following command:

   ```bash
   php artisan make:controller TestController
   ```

2. Open the TestController file in your preferred code editor and update the \_\_invoke method to render an Inertia view. Here's an example:

   ```php
   <?php

   namespace App\Http\Controllers;

   use Inertia\Inertia;

   class TestController extends Controller
   {
       public function __invoke()
       {
           return Inertia::render('Test', [
               'model' => [
                   "title": "Lorem ipsum dolor sit amet, consectetur adipiscing elit",
                   "description": "Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua."
               ],
           ]);
       }
   }
   ```

   In this example, we're rendering an Inertia view named Test and passing an empty model to it. You can customize the view name and data according to your needs.

3. Create a new Vue component file, Test.vue, in your resources/js/Pages directory. Add the following content to the file:

   ```vue
   <template layout="main">
     <ui-card v-model="model" />
   </template>

   <script setup>
   import { useModel } from '@inertiajs/inertia-vue3';
   const { model, get } = useModel();
   await get();
   </script>
   ```

   This Vue component uses the ui-card component and fetches data using useModel. The component auto-imports the required files.

4. **Component Auto Importing**: When you use a component, such as <ui-card>, InertiaUno automatically imports the corresponding Vue component file. For example, if you use `<ui-card>`, InertiaUno will automatically import `resources/js/Components/Ui/Card.vue` or `resources/js/Components/Ui/Card/Index.vue`, depending on the file's structure.

5. **Layout Auto Importing**: If you add the layout attribute to the `<template>` tag in your Vue file, InertiaUno automatically imports the corresponding layout file. For example, `<template layout="main">` will import `resources/js/main.vue`.

6. **Composable Auto Importing**: When you use a composable structure, InertiaUno automatically imports the associated file. In the example above, it loads `resources/js/Composables/useModel.js` using the `useModel` composable.

   To demonstrate the composable auto-importing feature, consider the following example code:

   ```javascript
   import { computed } from 'vue';
   import { usePage } from '@inertiajs/vue3';

   export default function useModel() {
     const page = usePage();

     const model = computed(() => page.props.model);

     async function get() {
       // Perform additional asynchronous work if needed
     }

     return { get, model };
   }
   ```

   In this example, the `useModel` composable is defined in the `resources/js/useModel.js` file. It uses Vue Composition API functions like computed and the `usePage` composable from `@inertiajs/vue3` to access the page's props and retrieve the model property. It also includes an asynchronous get function that you can use to perform additional asynchronous work if needed.

   When you use the useModel composable in your Vue file, InertiaUno automatically imports the `useModel.js` file, making it available for use in your application.

7. **UnoCSS Feature**: InertiaUno integrates with UnoCSS, a utility-first CSS framework. Here's an example of a nice ui-card component using Tailwind CSS features:

   ```vue
   <template>
     <div class="bg-white rounded shadow-md p-4">
       <p class="text-gray-600 mt-4">{{ model.title }}</p>
       <p class="text-gray-800 mt-4">{{ model.description }}</p>
     </div>
   </template>
   ```

   In this example, the `ui-card` component has a white background, rounded corners, and a shadow. It also displays the model ref, which was defined in the Vue file.

8. Finally, update your routes to map the TestController to a route. Open the routes/web.php file and add the following route:

   ```php
   use App\Http\Controllers\TestController;
   use Illuminate\Support\Facades\Route;

   Route::get('/test', TestController::class);
   ```

   This route maps the TestController to the /test URL.

Now, when you visit the `/test` URL in your Laravel application, the `TestController` will render the Test Vue file, which uses the `resources/js/Components/Ui/Card.vue component. The component auto-imports other components, layouts, and composable files, making it easy to work with InertiaUno in your Laravel project.

### Configuration

InertiaUno publishes a configuration file that you can customize. To publish the configuration file, run:

```bash
php artisan vendor:publish --tag=inertia-uno-config
```

This will create a `inertia-uno.php` file in your `config` directory, where you can modify the package's configuration options.

## Available Commands

InertiaUno provides several commands to help you manage and customize your Laravel project's frontend features. Here's a list of available commands:

- `inertia-uno:install:inertia`: Installs InertiaJS and configures it in your project.
- `inertia-uno:add:middleware`: Adds the inertia middleware handler to your project.
- `inertia-uno:install:lodash`: Installs Lodash in your project.
- `inertia-uno:install:uno`: Installs UNOCSS and integrates it into your project.
- `inertia-uno:install:iconify`: Installs VUE Iconify in your project.
- `inertia-uno:publish:view`: Publishes the package's views.
- `inertia-uno:publish:css`: Publishes the package's CSS files.
- `inertia-uno:publish:js`: Publishes the package's JS files.
- `inertia-uno:publish:vue`: Publishes the package's Vue files.
- `inertia-uno:publish:vite`: Updates the Vite configuration file.

## Technologies Used

InertiaUno utilizes the following technologies:

- [Laravel](https://laravel.com): A powerful PHP framework for web application development.
- [Inertia.js](https://inertiajs.com): A modern approach to building single-page applications using server-side routing.
- [UnoCSS](https://unocss.dev): A utility-first CSS framework for rapid UI development.
- [VUE Iconify](https://iconify.design): A collection of high-quality open-source icons for Vue.js.
- [Lodash](https://lodash.com): A JavaScript utility library for manipulating, sorting, and filtering arrays and objects.
- [Vite](https://vitejs.dev): A fast build tool and development server for modern web applications.

## Contributing

Contributions to InertiaUno are welcome! If you encounter any issues or have suggestions for improvement, please open an issue on the [GitHub repository](https://github.com/openestudia/inertia-uno).

## License

InertiaUno is open-source software licensed under the [MIT license](LICENSE).
