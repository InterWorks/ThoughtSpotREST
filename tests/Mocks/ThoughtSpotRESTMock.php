<?php

namespace InterWorks\ThoughtSpotREST\Tests\Mocks;

use Mockery;
use GuzzleHttp\Cookie\CookieJar;
use Illuminate\Http\Client\Response;
use InterWorks\ThoughtSpotREST\ThoughtSpotREST;

class ThoughtSpotRESTMock
{
    /**
     * Mock the ThoughtSpotREST class call function.
     *
     * @param mixed                $expectedResponse
     * @param string               $url
     * @param array<string, mixed> $args
     * @param string               $method
     *
     * @return mixed[]|Response
     */
    public static function mockWithCall(
        mixed $expectedResponse,
        string $url,
        array $args = [],
        string $method = 'GET'
    ): mixed {
        // Mock the ThoughtSpotREST class, specifically to check if _authenticate is called
        $mock = Mockery::mock(ThoughtSpotREST::class)->makePartial()->shouldAllowMockingProtectedMethods();

        // Ensure the _authenticate method is called in the constructor
        $mock->shouldReceive('_authenticate')
            ->once()
            ->andReturnNull();

        // Instantiate the class to trigger the constructor
        $mock->__construct();

        // Create a mock for the Illuminate\Http\Client\Response class
        $responseMock = Mockery::mock(Response::class);
        $responseMock->shouldReceive('body')->andReturn($expectedResponse);
        $responseMock->shouldReceive('cookies')->andReturn(
            new CookieJar(
                strictMode : false,
                cookieArray: [
                    [
                        'Name'     => 'clientId',
                        'Value'    => 'value',
                        'Domain'   => 'localhost',
                        'Path'     => '/',
                        'Expires'  => time() + 3600,
                        'Secure'   => true,
                        'HttpOnly' => true,
                    ],
                ]
            )
        );
        $responseMock->shouldReceive('json')->andReturn($expectedResponse);
        $responseMock->shouldReceive('status')->andReturn(200);
        $responseMock->shouldReceive('successful')->andReturnTrue();

        // Mock the call method to return the response mock
        $mock->shouldReceive('call')
            ->with($url, $args, $method)
            ->andReturn($responseMock);

        return $mock;
    }
}
