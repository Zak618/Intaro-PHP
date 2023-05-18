<?php

namespace ContainerS8iEJGb;

use Symfony\Component\DependencyInjection\Argument\RewindableGenerator;
use Symfony\Component\DependencyInjection\Exception\RuntimeException;

/**
 * @internal This class has been auto-generated by the Symfony Dependency Injection Component.
 */
class get_ServiceLocator_2YvoBQService extends App_KernelXecuteDebugContainer
{
    /**
     * Gets the private '.service_locator.2_YvoBQ' shared service.
     *
     * @return \Symfony\Component\DependencyInjection\ServiceLocator
     */
    public static function do($container, $lazyLoad = true)
    {
        return $container->privates['.service_locator.2_YvoBQ'] = new \Symfony\Component\DependencyInjection\Argument\ServiceLocator($container->getService, [
            'App\\Controller\\MainController::addBook' => ['privates', '.service_locator.o6sN0hZ', 'get_ServiceLocator_O6sN0hZService', true],
            'App\\Controller\\MainController::book' => ['privates', '.service_locator.qo8rK6B', 'get_ServiceLocator_Qo8rK6BService', true],
            'App\\Controller\\MainController::delete' => ['privates', '.service_locator.qo8rK6B', 'get_ServiceLocator_Qo8rK6BService', true],
            'App\\Controller\\MainController::download' => ['privates', '.service_locator.KJSb96P', 'get_ServiceLocator_KJSb96PService', true],
            'App\\Controller\\MainController::edit' => ['privates', '.service_locator.qo8rK6B', 'get_ServiceLocator_Qo8rK6BService', true],
            'App\\Controller\\MainController::index' => ['privates', '.service_locator.o6sN0hZ', 'get_ServiceLocator_O6sN0hZService', true],
            'App\\Controller\\RegistrationController::register' => ['privates', '.service_locator.v.Ev_hT', 'get_ServiceLocator_V_EvHTService', true],
            'App\\Controller\\SecurityController::login' => ['privates', '.service_locator.rSTd.nA', 'get_ServiceLocator_RSTd_NAService', true],
            'App\\Kernel::loadRoutes' => ['privates', '.service_locator.y4_Zrx.', 'get_ServiceLocator_Y4Zrx_Service', true],
            'App\\Kernel::registerContainerConfiguration' => ['privates', '.service_locator.y4_Zrx.', 'get_ServiceLocator_Y4Zrx_Service', true],
            'kernel::loadRoutes' => ['privates', '.service_locator.y4_Zrx.', 'get_ServiceLocator_Y4Zrx_Service', true],
            'kernel::registerContainerConfiguration' => ['privates', '.service_locator.y4_Zrx.', 'get_ServiceLocator_Y4Zrx_Service', true],
            'App\\Controller\\MainController:addBook' => ['privates', '.service_locator.o6sN0hZ', 'get_ServiceLocator_O6sN0hZService', true],
            'App\\Controller\\MainController:book' => ['privates', '.service_locator.qo8rK6B', 'get_ServiceLocator_Qo8rK6BService', true],
            'App\\Controller\\MainController:delete' => ['privates', '.service_locator.qo8rK6B', 'get_ServiceLocator_Qo8rK6BService', true],
            'App\\Controller\\MainController:download' => ['privates', '.service_locator.KJSb96P', 'get_ServiceLocator_KJSb96PService', true],
            'App\\Controller\\MainController:edit' => ['privates', '.service_locator.qo8rK6B', 'get_ServiceLocator_Qo8rK6BService', true],
            'App\\Controller\\MainController:index' => ['privates', '.service_locator.o6sN0hZ', 'get_ServiceLocator_O6sN0hZService', true],
            'App\\Controller\\RegistrationController:register' => ['privates', '.service_locator.v.Ev_hT', 'get_ServiceLocator_V_EvHTService', true],
            'App\\Controller\\SecurityController:login' => ['privates', '.service_locator.rSTd.nA', 'get_ServiceLocator_RSTd_NAService', true],
            'kernel:loadRoutes' => ['privates', '.service_locator.y4_Zrx.', 'get_ServiceLocator_Y4Zrx_Service', true],
            'kernel:registerContainerConfiguration' => ['privates', '.service_locator.y4_Zrx.', 'get_ServiceLocator_Y4Zrx_Service', true],
        ], [
            'App\\Controller\\MainController::addBook' => '?',
            'App\\Controller\\MainController::book' => '?',
            'App\\Controller\\MainController::delete' => '?',
            'App\\Controller\\MainController::download' => '?',
            'App\\Controller\\MainController::edit' => '?',
            'App\\Controller\\MainController::index' => '?',
            'App\\Controller\\RegistrationController::register' => '?',
            'App\\Controller\\SecurityController::login' => '?',
            'App\\Kernel::loadRoutes' => '?',
            'App\\Kernel::registerContainerConfiguration' => '?',
            'kernel::loadRoutes' => '?',
            'kernel::registerContainerConfiguration' => '?',
            'App\\Controller\\MainController:addBook' => '?',
            'App\\Controller\\MainController:book' => '?',
            'App\\Controller\\MainController:delete' => '?',
            'App\\Controller\\MainController:download' => '?',
            'App\\Controller\\MainController:edit' => '?',
            'App\\Controller\\MainController:index' => '?',
            'App\\Controller\\RegistrationController:register' => '?',
            'App\\Controller\\SecurityController:login' => '?',
            'kernel:loadRoutes' => '?',
            'kernel:registerContainerConfiguration' => '?',
        ]);
    }
}
