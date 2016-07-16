<?php
return call_user_func(
    function () {
        $userCollection = new \Phalcon\Mvc\Micro\Collection();

        $userCollection
            ->setPrefix('/v1/cidade')
            ->setHandler('\App\Users\Controllers\CidadeController')
            ->setLazy(true);

        $userCollection->get('/', 'getCidade');
        $userCollection->get('/{id:\d+}', 'getCidade');

        $userCollection->post('/', 'addCidade');

        $userCollection->put('/{id:\d+}', 'editCidade');

        $userCollection->delete('/{id:\d+}', 'deleteCidade');

        return $userCollection;
    }
);
