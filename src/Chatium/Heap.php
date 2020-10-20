<?php namespace Chatium;

use Exception;
use GuzzleHttp\Exception\GuzzleException;

class Heap {

    private $client;
    private $type;
    private $meta;

    /**
     * Heap constructor.
     * @param Client $client
     * @param string $type
     * @param array $meta
     */
    function __construct(Client $client, string $type, array $meta = []) {
        $this->client = $client;
        $this->type = $type;
        $this->meta = $meta;
    }

    /**
     * @return mixed
     * @throws GuzzleException
     */
    public function findAll() {
        $response = $this->client->get('/api/v1/heap/' . $this->type);

        return $response->data;
    }

    /**
     * @param string $id
     * @return mixed
     * @throws GuzzleException
     */
    public function findById(string $id) {
        $response = $this->client->get('/api/v1/heap/' . $this->type . '/' . $id);

        return $response->data;
    }

    /**
     * @param string $id
     * @return mixed
     * @throws GuzzleException
     * @throws Exception
     */
    public function getById(string $id) {
        $response = $this->client->get('/api/v1/heap/' . $this->type . '/' . $id);

        if (!$response->data) {
            throw new Exception($id . ' is not found in ' . $this->type);
        }

        return $response->data;
    }

    /**
     * @param array $data
     * @return mixed
     * @throws GuzzleException
     */
    public function create(array $data) {
        $response = $this->client->post('/api/v1/heap/' . $this->type, [
            'meta' => $this->meta,
            'data' => $data,
        ]);

        return $response->data;
    }

    /**
     * @param string $id
     * @param array $data
     * @return mixed
     * @throws GuzzleException
     */
    public function updateMaybe(string $id, array $data) {
        if (!isset($data['id'])) $data['id'] = $id;

        $response = $this->client->post('/api/v1/heap/' . $this->type . '/' . $id, [
            'meta' => $this->meta,
            'data' => $data,
        ]);

        return $response->data;
    }

    /**
     * @param string $id
     * @param array $data
     * @return mixed
     * @throws GuzzleException
     */
    public function update(string $id, array $data) {
        $model = $this->updateMaybe($id, $data);

        if (!$model) {
            throw new Exception($id . ' is not found in ' . $this->type);
        }

        return $model;
    }

    /**
     * @param string $id
     * @param array $data
     * @return mixed
     * @throws GuzzleException
     */
    public function createOrUpdate(string $id, array $data) {
        if (!isset($data['id'])) $data['id'] = $id;

        $response = $this->client->post('/api/v1/heap/' . $this->type . '/' . $id . '/createOrUpdate', [
            'meta' => $this->meta,
            'data' => $data,
        ]);

        return $response->data;
    }

    /**
     * @param string $id
     * @return mixed
     * @throws GuzzleException
     */
    public function delete(string $id) {
        $response = $this->client->post('/api/v1/heap/' . $this->type . '/' . $id . '/delete', [
            'meta' => $this->meta,
        ]);

        return $response->data;
    }

}
