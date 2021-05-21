# Fresh X Mind Wordpress Starter Theme

FreshXMind is a Wordpress boilerplate or starter theme, to help you quickly kickstart custom theming. It's compliant to all the latest Wordpress standards and guidelines. Uses **Webpack** for hot reloading during development, and production build assets too, using **SCSS** and **modern JS** (EcmaScript) with Babel.

**Built in common functions** to extend theme core features and **hooks** to make development easier, by simply plugging your template parts to the corresponding functions and actions, or editing the already existing ones to fit your needs. This makes it extendable and compatible with child themes too.

## Dependencies

- PHP 7+
- Node 8+
- NPM 5+
- Yarn
- ACF PRO Wordpress Plugin (Non ACF version incoming)

Note: We're not including the ACF plugin, you'll need your own license to use it.

## Installation

Clone repo into your `wp-content/themes` folder and run

- `yarn install`

If you'd like to use `npm` instead of `Yarn`, simply delete the `yarn.lock` in the root folder and run `npm install` instead.

### Run Webpack dev server with live reload

- `npm run start`

### Compile assets for production

- `npm run build` (To do here add CI, deployment, etc).

## Theme Structure

Here's a quick overview and walkthrough of how the theme's organized and the folder structure. **Look at `functions.php` and the `/inc/` folder**

## Styles

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

See the [open issues](https://github.com/CatinhoCR/catix-freshxmind/issues) for a list of proposed features (and known issues).

<!-- CONTRIBUTING -->
## Contributing

Contributions are what make the open source community such an amazing place to be learn, inspire, and create. Any contributions you make are **greatly appreciated**.

1. Fork the Project
2. Create your Feature Branch (`git checkout -b feature/AmazingFeature`)
3. Commit your Changes (`git commit -m 'Add some AmazingFeature'`)
4. Push to the Branch (`git push origin feature/AmazingFeature`)
5. Open a Pull Request

<!-- LICENSE -->
## License

Distributed under the MIT License. See `LICENSE` for more information.

<!-- CONTACT -->
## Contact

Andrés Castillo - [@cato_506](https://twitter.com/cato_506) - [email](mailto:hello@cato506.com?subject=[GitHub]%20FreshX%20Mind%20-)

Project Link: [https://github.com/CatinhoCR/catix-freshxmind](https://github.com/CatinhoCR/catix-freshxmind)

<!-- ACKNOWLEDGEMENTS -->
## Acknowledgements

- [CATO](https://cato506.com)
- [Underscores](https://underscores.me/)
