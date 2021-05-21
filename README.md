# CATIX Fresh X Mind

Custom Wordpress Theme made with a modern build workflow, using Node, Webpack, ES6+, SCSS and PHP 8. This is based off from my own [custom starter theme](https://github.com/CatinhoCR/starter-freshxmind-theme).
For reference, the previous version of the theme can be found [here](https://github.com/CatinhoCR/glowing-freshxmind-theme).

- [CATIX Fresh X Mind](#catix-fresh-x-mind)
  - [Dependencies](#dependencies)
    - [Installation](#installation)
    - [Run Webpack dev server with live reload](#run-webpack-dev-server-with-live-reload)
    - [Compile assets for production](#compile-assets-for-production)
  - [Theme Structure](#theme-structure)
    - [Inc Folder](#inc-folder)
    - [Blocks and Components](#blocks-and-components)
    - [Styles](#styles)
    - [Javascript](#javascript)

## Dependencies

- PHP 8 (7 is deprecated now)
- Node 8+
- NPM 5+
- Yarn
- ACF PRO Wordpress Plugin

### Installation

Clone repo into your `wp-content/themes` folder and run

- `yarn install`

If you'd like to use `npm` instead of `Yarn`, simply delete the `yarn.lock` in the root folder and run `npm install` instead.

### Run Webpack dev server with live reload

- `npm run start`

### Compile assets for production

- `npm run build` (To do here add CI, deployment, etc)

## Theme Structure

The theme uses several folders to organize things in a modular way, here's the main folders to look at:

- `acf-json`: Automatically generated files to keep **ACF fields** in sync and backed up.
- `build-tasks`: Webpack's config files.
- `images`: SVG images/icons used by theme, served as PHP for usage with WP's built-in `get_template_part` [function].
- `inc`: Theme's main functionality here, our `functions.php` imports these files for easier maintenance and extending. [Further details in it's own section](#inc-Folder).
- `resources`: All the theme's *partials* here. Includes [Blocks & Components](#blocks-and-components), content wrappers, etc.
- `src`: Includes theme's [Styles](#styles), [JavaScript](#javascript) and web-fonts.
- `templates`: All of the theme's main templates, for different page layouts to be selected in the WP's page edit built-in menu.
- `woocommerce`: Everything related to WooCommerce extending, including hooks and template parts.

[function]: https://developer.wordpress.org/reference/functions/get_template_part/ "Get Template Part Function Docs"

### Inc Folder

Includes all the [theme functions] included in the main `functions.php` file.
Things like the initial WP theme's setup (`inc/theme-setup.php`), theming configurations (`inc/configs`), template tags/functions (`inc/methods`), among others go here.

- `acf-framework`: Custom extends and hooks to ACF Pro plugin's functionality.
- `classes`: Includes custom PHP Classes to be used throughout the theme. Things like [Walkers]

[theme functions]: https://developer.wordpress.org/themes/basics/theme-functions
[Walkers]: https://developer.wordpress.org/reference/classes/walker/

### Blocks and Components

Pages are divided into `blocks` which are full width elements/containers that can exist on their own like a hero.
Blocks can contain multiple `components` like cards or buttons. You can see this structure applied for PHP (`resources`) and styles (`src/css`).

### Styles

File Structure and workflow based and **adapted** from [SASS Guidelines] and the [7:1 design pattern].

- `Abstracts`: Variables, functions, mixins, helpers. A good way to see this is, it should not print out any CSS code if compiled on it's own.
- `Base`: Settings, tools and helpers. Contains global styles, normalizers and utility classes.
- `Blocks`: Styles specific to blocks like the header, footer, or any full width section.
- `Components`: Styles specific to components like buttons, tooltips, and other small stand-alone reusable pieces.
- `Layout`: For things specific to the website's layout and formatting, global styles. Things specific to the theme either in FE or admin.
- `Pages`: Styles specific to pages like the home page
- `Helpers`: Overrides to colors classes and spacings, etc.

<!--
  @todo:
  Make branch in starter repo for a 5:1 pattern
  https://matthewelsom.com/blog/simple-scss-playbook.html
-->

[SASS Guidelines]: https://sass-guidelin.es "Hugo Giraudel's SASS Guidelines"
[7:1 design pattern]: https://github.com/HugoGiraudel/sass-boilerplate "7:1 design pattern"

### Javascript

Uses the same structure as the Blocks & Components resources. If a functionality is for a block, then add it in the `src/js/blocks` folder.

Docs to be extended further eventually.
