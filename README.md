# InertiaUno

InertiaUno is a Laravel package that provides frontend features and integrates Unocss into your Laravel project. It simplifies the process of installing InertiaJS, adding middleware, installing Lodash, and integrating UNOCSS and VUE Iconify. It also offers commands to publish views, CSS files, JS files, and Vue files.

## Installation

You can install InertiaUno via Composer:

```bash
composer require estudia/inertia-uno
```

## Usage

To install InertiaUno and set up its frontend features, run the following command:

```bash
php artisan inertia-uno:install
```

This command will guide you through a series of prompts to install InertiaJS, add middleware, install Lodash, UNOCSS, VUE Iconify, and publish various files. You can choose which features to install based on your project requirements.

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
