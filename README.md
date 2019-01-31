# Workshop for SonataAdminBundle

## Versions
- [Symfony 4.2.2](https://symfony.com/doc/4.2/setup.html)
  - [http://127.0.0.1:8001/check.php](http://127.0.0.1:8001/check.php)

## Run
- bin/console server:start 127.0.0.1:8001
- bin/console server:stop
- bin/console debug:router
- bin/console doctrine:database:create
- bin/console make:migration
- bin/console doctrine:migrations:migrate

## Links
- SonataAdminBundle:
  - [Docs site](https://sonata-project.org/bundles/admin/3-x/doc/index.html);
  - [Docs symfony](https://symfony.com/doc/master/bundles/SonataAdminBundle/getting_started/installation.html);
  - [Git](https://github.com/sonata-project/SonataAdminBundle/).
- FOSUserBundle:
  - [Command line tools](https://symfony.com/doc/2.0/bundles/FOSUserBundle/command_line_tools.html)
    - bin/console fos:user:create adminuser --super-admin admin admin
    - bin/console fos:user:create testuser user user
    
### TODO
- [ckeditor](https://sonata-project.org/bundles/formatter/master/doc/reference/installation.html);
- multi file uploader;
- [sonata translations](https://symfony.com/doc/3.x/bundles/SonataAdminBundle/reference/translation.html).
