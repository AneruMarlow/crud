<?php
namespace Tests;
use PHPUnit\Framework\TestCase;
use Symfony\Component\HttpClient\HttpClient;

class ControllerTest extends TestCase
{
    public function testRead()
    {
        $httpClient = HttpClient::create(['base_uri' => 'http://127.0.0.1:8000',]);
        $response = $httpClient->request('GET', '/read.php');
        $this->assertEquals($response->getStatusCode(), 200);
    }
    public function testCreate()
    {
        $httpClient = HttpClient::create(['base_uri' => 'http://127.0.0.1:8000',]);
        $response = $httpClient->request('GET', '/create.php');
        $this->assertEquals($response->getStatusCode(), 200);
    }
    public function testUpdate()
    {
        $httpClient = HttpClient::create(['base_uri' => 'http://127.0.0.1:8000',]);
        $response = $httpClient->request('GET', '/update.php');
        $this->assertEquals($response->getStatusCode(), 200);
    }
    public function testDelete()
    {
        $httpClient = HttpClient::create(['base_uri' => 'http://127.0.0.1:8000',]);
        $response = $httpClient->request('GET', '/delete.php');
        $this->assertEquals($response->getStatusCode(), 200);
    }
}