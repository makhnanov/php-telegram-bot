<?php

namespace Makhnanov\TelegramBot\Test;

use Closure;
use GuzzleHttp\Psr7\Response;
use Makhnanov\TelegramBot\Api\B;
use Makhnanov\TelegramBot\Bot;
use Makhnanov\TelegramBot\Helper\ResponsiveInterface;
use PHPUnit\Framework\Constraint\IsEqual;
use PHPUnit\Framework\Constraint\IsType;
use PHPUnit\Framework\Constraint\LogicalNot;
use PHPUnit\Framework\TestCase;
use Symfony\Component\VarDumper\Caster\ReflectionCaster;
use Symfony\Component\VarDumper\Cloner\VarCloner;
use Symfony\Component\VarDumper\Dumper\AbstractDumper;
use Symfony\Component\VarDumper\Dumper\CliDumper;
use Symfony\Component\VarDumper\VarDumper;

abstract class ParentTestCase extends TestCase
{
    public bool $manualVerify = false;

    protected Bot $bot;

    public function __construct(?string $name = null, array $data = [], $dataName = '')
    {
        $this->bot = new B(require __DIR__ . '/../token.php');
        VarDumper::setHandler(function ($var) {
            $cloner = new VarCloner();
            $cloner->addCasters(ReflectionCaster::UNSET_CLOSURE_FILE_INFO);
            $dumper = new CliDumper(
                null,
                null,
                AbstractDumper::DUMP_LIGHT_ARRAY | AbstractDumper::DUMP_TRAILING_COMMA
            );
            $dumper->dump($cloner->cloneVar($var));
        });
        parent::__construct($name, $data, $dataName);
    }

    public static function trueString($actual): void
    {
        parent::assertIsString($actual, 'It is not string!');
        $constraint = new LogicalNot(new IsEqual(''));
        static::assertThat($actual, $constraint, 'It is empty string!');
    }

    public static function assertResultKeys(array $result, array $savedKeys): void
    {
        $result = array_keys($result);
        sort($result);
        sort($savedKeys);
        parent::assertSame($result, $savedKeys);
    }

    public static function aboveZero($actual, $message = ''): void
    {
        static::assertThat($actual, new IsType(IsType::TYPE_INT), $message);
        static::assertThat($actual, static::greaterThan(0), $message);
    }

    public static function assertIsIntBelowZero($actual, $message = ''): void
    {
        static::assertThat($actual, new IsType(IsType::TYPE_INT), $message);
        static::assertThat($actual, static::lessThan(0), $message);
    }

    public static function assertIsIntZero($actual, $message = ''): void
    {
        static::assertSame(0, $actual, $message);
    }

    public function assertGuzzleClient(ResponsiveInterface $client)
    {
        $this->assertTrue($client->getResponse() instanceof Response);
    }

    public function assertClassWithFields(mixed $actual, string $expectedClassName, Closure $callback)
    {
        self::assertInstanceOf($expectedClassName, $actual);
        $callback($actual);
    }

    public function assertApproveManual()
    {
        if ($this->manualVerify) {
            /** @noinspection PhpComposerExtensionStubsInspection */
            $this->assertTrue(readline('[ENTER] for Approve or [ANY STRING] for Disapprove test: ') === '');
        }
    }

    public function makeSureThat(string $description)
    {
        if ($this->manualVerify) {
            /** @noinspection PhpComposerExtensionStubsInspection */
            readline("Make sure that $description. [ENTER] ... ");
        }
    }

    public function getTestChannelId(): string|int
    {
        return '@program_mem';
    }

    public function getPrivateTestUserId(): string|int
    {
        return 390941013;
    }
}
