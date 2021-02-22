Wordpress base theme with Laravel-mix.

**PHP**

Recomend to use:
- Advanced Custom Fields Pro
- Advanced Custom Fields: Auto JSON Sync ([https://github.com/JAW-Dev/advanced-custom-fields-auto-json-sync](http://https://github.com/JAW-Dev/advanced-custom-fields-auto-json-sync "https://github.com/JAW-Dev/advanced-custom-fields-auto-json-sync"))

Hidden by default in admin dashboard(menu):
- Blog(Posts)
- Comments
- Appearance Menu (Customizer)

wp-config.php:
Use environment  type `WP_ENVIRONMENT_TYPE`. If environment != development ACF (Custom Fields) is hidden in admin menu.

**Laravel Mix**
.env had only one parametr `MIX_PROXY` its your local wordpress url. Look .env-example file.

Start development:
`yarn && yarn watch`

Build assets:
`yarn build`


