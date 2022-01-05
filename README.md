## A Kirby-Laravel Starter Kit

This is an experimental starter kit for using Kirby within Laravel (a little like Statamic). In my limited experience it runs smoothly, but please be ready for some *weird* bugs.

## Installation

1. Download or clone this repo.
2. If you're using Laravel Valet, then modify `.valet-env.php`
3. Ensure the Kirby Git submodule is cloned *or* download Kirby and place it in `cms/kirby`
4. Run `composer update`
5. Create the `.env` file for your application

### Implementation

The implementation is fairly simple: anything Laravel doesn't want, pass to Kirby.

- Kirby is imported as a submodule in `cms/kirby` - the current Kirby version is Kirby 3.6.1.
- `Kirby\Cms\App` is bootstrapped in the `KirbyServiceProvider`.
- All routes that are not caught by Laravel are rendered by Kirby.
- Kirby-specific URLs are excluded from the CSRF middleware. See `app/Http/Middleware/VerifyCsrfToken.php`.

### Folder Structure/Kirby Roots

You can change the folder structure in `KirbyServiceProvider`, but I have set an opinionated default.

- Accounts: `cms/accounts`
- Blueprints: `resources/blueprints`
- Config: `config/kirby`
- Content: `content`
- Kirby’s source: `cms/kirby`
- Logs: `storage/logs/kirby`
- Media: `public/media`
- Plugins: `cms/plugins`
- Site: `cms/site`
- Templates: `resources/views/templates`
- Sessions: `storage/kirby/sessions`
- Snippets: `resources/views/snippets`

### Blade Templating

There is a simple plugin that allows you to use `.blade.php` files for Kirby templates and snippets. These files should be put in their respective directories within `resources/views`.

### Weirdness

- If Kirby's helpers are imported normally within Composer, they cannot override Laravel's global helpers. This causes a few errors. To combat this I've used `funkjedi/composer-include-files` which autoloads files before anything else.
- Laravel seems to use the global `e()` helper for views, so overriding this with Kirby's `e()` causes problems. As a hack-y workaround, I import `app/helpers.php`, which defines `e()` as Laravel's implentation, before loading the Kirby helpers... I know.