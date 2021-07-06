# Fresh X Mind Wordpress Starter Theme

**Ditso** (_originally named FreshXMind_) is a _custom_ Wordpress **starter theme** with a **modern and simple development workflow** made for developers. Hot-reloading and bundling using Webpack, SCSS stylesheets, ES6+ Javascript and a modern PHP approach are some of Ditso's main features.
Looking for a more minimal implementation, blank canvas, with only the basic workflow and no code? Look [here](https://github.com/CatinhoCR/ditso-theme-starter)

[Contributions] and [feedback] welcome!

## Features

- Live Reloading during development
- SCSS Support
- ES5+ syntax support
- Webpack Asset bundling and optimizations
- Built In Helper functions for **debugging** and common used functions
- Clear and modular folder structure for easy to maintain Wordpress themes
- Updated regularly with Wordpress standards and best practices
- Code Linting
- Clear docs and extending ready
- Built in basic common used functions to save the hustle
- - Custom theme hooks and actions built-in
- [Theme Options](#theme-options) customization using the [Customizer API]

<!-- - **Gutenberg** ready theme
- **Customizer API** extends, ready with commonly used **theme options** configurations
  - Custom Color settings
  - Logos
  - Sidebar Configuration Settings
- Hot reloading during development using **Webpack**
- Built in workflow for **SCSS** and **Modern JavaScript ES6+**
- Built in commonly used PHP **helper functions**
- Awesome `functions.php` workflow with Classes and a clear folder structure
- **Theme Hooks** and **custom actions** makes this super easy to customize **template-parts** while keeping template files super clean. Simply __plug in__ your template-parts to the corresponding functions and actions, see the `header.php` and `footer.php` for examples.
- This (^) makes it extendable and compatible with child themes too
- Code linting -->

## Dependencies

- [PHP] >= 5.4
- [Node.js] >= 8
- [Yarn]
- [Wordpress] >= 5.3

### Optional Dependencies

- [Advanced Custom Fields]
- [WooCommerce]

Note: To keep project setup steps simple, ACF is not included inside the theme. Make sure to install ACF _and/or WooCommerce_ if you plan on using them.

## Installation

1. Generate your repository from Github's [template generator] _**OR** clone it_.
2. Clone your new repo to the `wp-content/themes` folder of your Wordpress installation.
3. Navigate to the theme's root folder in your terminal and run `yarn` to get the development dependencies.
   - `yarn`

You should now have all the necessary dependencies to run the [build process](#compile-assets-for-production).

### Run Webpack dev server with live reload

Update `HOST` near the top of [`build-tasks/env.config.js`](build-tasks/env.config.js) to reflect your local development hostname.
-Although it's not necessary, we recommend using Laravel's Valet for setting up your local environment easily.-

- `HOST: 'https://project-name.test'`

With that done, you should now be able to run the project:

- `npm run start`

### Compile assets for production

- `npm run build` (To do here add CI, deployment, etc).

## Theme Customization

<!-- @todo -->
The `fxm` prefix can be changed by running a search and replace on the theme's folder and replacing it for your desired prefix/theme-domain.

## Folder/Theme Structure

Here's a quick overview and walkthrough of how the theme's organized and the folder structure. **Look at `functions.php` and the `/inc/` folder**
<!-- @todo Add folder structure detailed overview  -->

### Main Workflow

Theme's templates (i.e [header.php](header.php)) execute **action hooks** _(`do_action()`)_. These are located here: [Theme Hooks](inc/core/theme-hooks.php).

The **hooked actions** and their corresponding **functions** are **registered** as [template-parts](inc/template-parts.php). _Might rename this for clearer convention_

These functions fetch data if needed, and **render partials** _or template-parts_ using `get_template_part()`. See the [Header Action Functions](inc/template-parts/header.php) for a working example.

Why do it like this instead of just calling the `get_template_part()` directly from the template files?

- Super easy to override/extend the theme by hooking into the right action from a child theme/plugin
- Keeps templates super clean and easy to read, maintain and update to fit custom needs
- Makes this a starter theme, potentially easy to extend into a stand-alone, white-label, generic solution

**This is the way.**

<!-- Note: For super simple projects, you could simply do `get_template_part()` functions directly from your templates, or just throw all that messy code in that single file _(yikes)_. -->

### Styles

- `Abstracts`: Variables, functions, mixins, helpers. A good way to see this is, it should not print out any CSS code if compiled on it's own.
- `Base`: Settings, tools and helpers. Contains global styles, normalizers and utility classes.
- `Blocks`: Styles specific to blocks like the header, footer, or any full width section.
- `Components`: Styles specific to components like buttons, tooltips, and other small stand-alone reusable pieces.
- `Layout`: For things specific to the website's layout and formatting, global styles. Things specific to the theme either in FE or admin.
- `Pages`: Styles specific to pages like the home page
- `Helpers`: Overrides to colors classes and spacings, etc.

## Debugging

Make sure to add the following at the bottom of your `wp-config.php` file:

```php
define( 'WP_DEBUG', true );
define( 'WP_DEBUG_DISPLAY', true );
define( 'WP_DEBUG_LOG', true );
```

_this enables the creation and population of a `debug.log` file in your `wp-content` directory (look at the helper functions in `/inc/common/helper-functions.php` if curious on further implementation)_

<!-- USAGE EXAMPLES -->
## Usage

To be added soon...
<!-- Use this space to show useful examples of how a project can be used. Additional screenshots, code examples and demos work well in this space. You may also link to more resources.

_For more examples, please refer to the [Documentation](https://cato506.com/freshxmind)_
-->

<!-- ROADMAP -->
## Roadmap

See the open [issues] for a list of proposed features (and known issues).
Any [feedback], ideas or feature requests are welcome too!

<!-- CONTRIBUTING -->
## Contributing

[Contributions] are what make the open source community such an amazing place to be learn, inspire, and create. Any contributions you make are **greatly appreciated**.

1. Fork the Project
2. Create your Feature Branch (`git checkout -b feature/AmazingFeature`)
3. Commit your Changes (`git commit -m 'Add some AmazingFeature'`)
4. Push to the Branch (`git push origin feature/AmazingFeature`)
5. Open a [Pull Request]

<!-- LICENSE -->
## License

Distributed under the MIT License. See `LICENSE` for more information.

<!-- CONTACT -->
## Contact

<!-- Andrés Castillo - [@cato_506](https://twitter.com/cato_506) - [email](mailto:hello@cato506.com?subject=[GitHub]%20FreshX%20Mind%20-) -->

<!-- Project Link: [https://github.com/CatinhoCR/catix-freshxmind](https://github.com/CatinhoCR/catix-freshxmind) -->

<!-- ACKNOWLEDGEMENTS -->
## Acknowledgements

The core initial theme files were based off from [Underscores](https://underscores.me/).

<!-- Links -->
[coding standards]: https://developer.wordpress.org/coding-standards
[Contributions]: https://github.com/CatinhoCR/catix-freshxmind/pulls
[feedback]: https://github.com/CatinhoCR/catix-freshxmind/discussions
[Customizer API]: https://codex.wordpress.org/Theme_Customization_API
[issues]: https://github.com/CatinhoCR/catix-freshxmind/issues
[Pull Request]: https://github.com/CatinhoCR/catix-freshxmind/pulls
[Fresh X Mind]: https://github.com/CatinhoCR/catix-freshxmind
[template generator]: https://github.com/CatinhoCR/catix-freshxmind/generate
[Node.js]: https://nodejs.org/
[PHP]: https://www.php.net/manual/en/install.php
[Wordpress]: https://wordpress.org
[Yarn]: https://classic.yarnpkg.com/en/docs/install
[Advanced Custom Fields]: https://www.advancedcustomfields.com
[WooCommerce]: https://woocommerce.com/

### Thought for Developers

While there are many great starter theme options out there already, I always found myself with the same _issues_ when creating new projects. Some are just too basic and simple, with no development workflow and bundling. Others were maybe too complex, or had too many dependencies I didn't need. Most have too many options and code that won't be needed and added complexity to new developers and/or required to learn a HUGE library (usually not extensively documented btw).
