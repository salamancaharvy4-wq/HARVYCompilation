<?php

it('redirects guests to registration', function () {
    $response = $this->get('/');

    $response->assertRedirect(route('register', absolute: false));
});
