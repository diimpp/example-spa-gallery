<?php

/*
 * This file is part of the diimpp/example-spa-gallery package.
 *
 * (c) Dmitri Perunov
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Payever\Bundle\CoreBundle\Tests\Controller;

use Lakion\ApiTestCase\JsonApiTestCase;
use Symfony\Component\HttpFoundation\Response;

/**
 * Payever ImageApiTest.
 */
class ImageApiTest extends JsonApiTestCase
{
    public function testGetImagesListResponse()
    {
        $this->loadFixturesFromFile('resources/images.yml');

        $this->client->request('GET', '/api/images/', [], [], ['CONTENT_TYPE' => 'application/json']);

        $response = $this->client->getResponse();
        $this->assertResponse($response, 'image/index_response', Response::HTTP_OK);
    }
}
