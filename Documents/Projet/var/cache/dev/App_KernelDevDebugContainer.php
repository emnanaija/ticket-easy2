<?php

// This file has been auto-generated by the Symfony Dependency Injection Component for internal use.

if (\class_exists(\ContainerG2MyzVs\App_KernelDevDebugContainer::class, false)) {
    // no-op
} elseif (!include __DIR__.'/ContainerG2MyzVs/App_KernelDevDebugContainer.php') {
    touch(__DIR__.'/ContainerG2MyzVs.legacy');

    return;
}

if (!\class_exists(App_KernelDevDebugContainer::class, false)) {
    \class_alias(\ContainerG2MyzVs\App_KernelDevDebugContainer::class, App_KernelDevDebugContainer::class, false);
}

return new \ContainerG2MyzVs\App_KernelDevDebugContainer([
    'container.build_hash' => 'G2MyzVs',
    'container.build_id' => '975e23d2',
    'container.build_time' => 1707584554,
    'container.runtime_mode' => \in_array(\PHP_SAPI, ['cli', 'phpdbg', 'embed'], true) ? 'web=0' : 'web=1',
], __DIR__.\DIRECTORY_SEPARATOR.'ContainerG2MyzVs');
