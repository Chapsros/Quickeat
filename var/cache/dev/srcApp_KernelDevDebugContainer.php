<?php

// This file has been auto-generated by the Symfony Dependency Injection Component for internal use.

if (\class_exists(\Container7lQYLJa\srcApp_KernelDevDebugContainer::class, false)) {
    // no-op
} elseif (!include __DIR__.'/Container7lQYLJa/srcApp_KernelDevDebugContainer.php') {
    touch(__DIR__.'/Container7lQYLJa.legacy');

    return;
}

if (!\class_exists(srcApp_KernelDevDebugContainer::class, false)) {
    \class_alias(\Container7lQYLJa\srcApp_KernelDevDebugContainer::class, srcApp_KernelDevDebugContainer::class, false);
}

return new \Container7lQYLJa\srcApp_KernelDevDebugContainer([
    'container.build_hash' => '7lQYLJa',
    'container.build_id' => '645c27bf',
    'container.build_time' => 1609165891,
], __DIR__.\DIRECTORY_SEPARATOR.'Container7lQYLJa');
