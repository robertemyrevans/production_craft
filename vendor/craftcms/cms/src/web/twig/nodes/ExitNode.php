<?php
/**
 * @link https://craftcms.com/
 * @copyright Copyright (c) Pixel & Tonic, Inc.
 * @license https://craftcms.github.io/license/
 */

namespace craft\web\twig\nodes;

use Craft;
use craft\web\ServiceUnavailableHttpException;
use Twig\Compiler;
use Twig\Node\Node;
use yii\web\BadRequestHttpException;
use yii\web\ConflictHttpException;
use yii\web\ForbiddenHttpException;
use yii\web\GoneHttpException;
use yii\web\HttpException;
use yii\web\MethodNotAllowedHttpException;
use yii\web\NotAcceptableHttpException;
use yii\web\NotFoundHttpException;
use yii\web\RangeNotSatisfiableHttpException;
use yii\web\ServerErrorHttpException;
use yii\web\TooManyRequestsHttpException;
use yii\web\UnauthorizedHttpException;
use yii\web\UnprocessableEntityHttpException;
use yii\web\UnsupportedMediaTypeHttpException;

/**
 * Class ExitNode
 *
 * @author Pixel & Tonic, Inc. <support@pixelandtonic.com>
 * @since 3.0.0
 */
class ExitNode extends Node
{
    /**
     * @inheritdoc
     */
    public function compile(Compiler $compiler): void
    {
        $compiler->addDebugInfo($this);

        if ($this->hasNode('status')) {
            $status = $this->getNode('status')->getAttribute('value');
            $class = match ($status) {
                400 => BadRequestHttpException::class,
                401 => UnauthorizedHttpException::class,
                403 => ForbiddenHttpException::class,
                404 => NotFoundHttpException::class,
                405 => MethodNotAllowedHttpException::class,
                406 => NotAcceptableHttpException::class,
                409 => ConflictHttpException::class,
                410 => GoneHttpException::class,
                415 => UnsupportedMediaTypeHttpException::class,
                416 => RangeNotSatisfiableHttpException::class,
                422 => UnprocessableEntityHttpException::class,
                429 => TooManyRequestsHttpException::class,
                500 => ServerErrorHttpException::class,
                503 => ServiceUnavailableHttpException::class,
                default => HttpException::class,
            };

            if ($class === HttpException::class) {
                $compiler
                    ->write("throw new $class($status");
                if ($this->hasNode('message')) {
                    $compiler->raw(', ');
                }
            } else {
                $compiler
                    ->write("throw new $class(");
            }
            if ($this->hasNode('message')) {
                $compiler->subcompile($this->getNode('message'));
            }
            $compiler->raw(");\n");
        } else {
            $compiler->write(Craft::class . "::\$app->end();\n");
        }
    }
}
