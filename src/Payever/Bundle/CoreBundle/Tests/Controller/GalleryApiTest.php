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
 * Payever GalleryApiTest.
 */
class GalleryApiTest extends JsonApiTestCase
{
    public function testGetGalleriesListResponse()
    {
        $this->loadFixturesFromFile('resources/galleries.yml');

        $this->client->request('GET', '/api/galleries/', [], [], ['CONTENT_TYPE' => 'application/json']);

        $response = $this->client->getResponse();
        $this->assertResponse($response, 'gallery/index_response', Response::HTTP_OK);
    }

    public function testCreateGalleryResponse()
    {
        $data =
<<<EOT
        {
            "code": "gallery3",
            "name": "Images gallery #3"
        }
EOT;
        $this->client->request('POST', '/api/galleries/', [], [], ['CONTENT_TYPE' => 'application/json'], $data);
        $response = $this->client->getResponse();
        $this->assertResponse($response, 'gallery/create_response', Response::HTTP_CREATED);
    }

    public function testCreateGalleryValidationFailResponse()
    {
        $this->client->request('POST', '/api/galleries/', [], [], ['CONTENT_TYPE' => 'application/json']);

        $response = $this->client->getResponse();
        $this->assertResponse($response, 'gallery/create_validation_fail_response', Response::HTTP_BAD_REQUEST);
    }
}
