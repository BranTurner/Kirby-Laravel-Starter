## A Kirby-Laravel Starter Kit

This is an experimental starter kit for using Kirby within Laravel (a little like Statamic). In my limited experience it runs smoothly, but please be ready for some *weird* bugs.

### Implementation

- A custom helper file (`app/helpers.php`) is loaded that sets `e()` equivalent to Laravel, Kirby’s helper file is then loaded. This allows Kirby’s `e()` to be overriden without modifying it’s source.
- Kirby is bootstrapped in `bootstrap/app.php`.
- All routes that are not caught by Laravel are rendered by Kirby. See `routes/web.php`.
- Kirby-specific URLs are excluded from the CSRF middleware. See `app/Http/Middleware/VerifyCsrfToken.php`.

### Folder Structure/Kirby Roots

You can change the folder structure in `bootstrap/app.php`, but I have set an opinionated default.

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
