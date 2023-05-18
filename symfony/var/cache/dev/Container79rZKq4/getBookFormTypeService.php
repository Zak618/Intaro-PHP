<?php

namespace Container79rZKq4;

use Symfony\Component\DependencyInjection\Argument\RewindableGenerator;
use Symfony\Component\DependencyInjection\Exception\RuntimeException;

/**
 * @internal This class has been auto-generated by the Symfony Dependency Injection Component.
 */
class getBookFormTypeService extends App_KernelDevDebugContainer
{
    /**
     * Gets the private 'App\Form\BookFormType' shared autowired service.
     *
     * @return \App\Form\BookFormType
     */
    public static function do($container, $lazyLoad = true)
    {
        include_once \dirname(__DIR__, 4).'/vendor/symfony/form/FormTypeInterface.php';
        include_once \dirname(__DIR__, 4).'/vendor/symfony/form/AbstractType.php';
        include_once \dirname(__DIR__, 4).'/src/Form/BookFormType.php';

        return $container->privates['App\\Form\\BookFormType'] = new \App\Form\BookFormType();
    }
}
