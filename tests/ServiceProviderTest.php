<?php

namespace Tests;

use Blue32a\Laravel\Language\ServiceProvider;
use Mockery;
use Mockery\Adapter\Phpunit\MockeryPHPUnitIntegration;
use PHPUnit\Framework\TestCase;

class ServiceProviderTest extends TestCase
{
    use MockeryPHPUnitIntegration;

    public const PUBLISHE_GROUP = 'blue32a-lang';

    /**
     * @test
     */
    public function testBootRunningInConsole()
    {
        $appMock = Mockery::mock('Application');
        $appMock->shouldReceive('runningInConsole')
            ->once()
            ->andReturn(true);
        $appMock->shouldReceive('resourcePath')
            ->once()
            ->andReturn('path');

        $providerMock = Mockery::mock(ServiceProvider::class, [$appMock])
            ->makePartial()
            ->shouldAllowMockingProtectedMethods();
        $providerMock->shouldReceive('publishes')
            ->once()
            ->with(Mockery::type('array'), self::PUBLISHE_GROUP);

        $providerMock->boot();
    }

    /**
     * @test
     */
    public function testBootNotRunningInConsole()
    {
        $appMock = Mockery::mock('Application');
        $appMock->shouldReceive('runningInConsole')
            ->once()
            ->andReturn(false);

        $providerMock = Mockery::mock(ServiceProvider::class, [$appMock])
            ->makePartial()
            ->shouldAllowMockingProtectedMethods();
        $providerMock->shouldNotReceive('publishes');

        $providerMock->boot();
    }
}
