<?php

namespace app\config\bootstrap;

use yii\base\Event;
use app\Request\Models\Request;
use yii\base\BootstrapInterface;
use yii\mail\MailerInterface;

class SetUp implements BootstrapInterface
{
    public function bootstrap($app): void
    {
        $container = \Yii::$container;

        $container->setSingleton(MailerInterface::class, function () use ($app) {
            return $app->mailer;
        });

        /**
         * Send email to admin after insert new request
         */
        Event::on(Request::class, Request::EVENT_AFTER_INSERT, function () use ($app) {

            $app->mailer
                ->compose(
                    ['html' => 'form/form-html', 'text' => 'form/form-text']
                )
                ->setTo('admin@example.com')
                ->setFrom(['noreply@example.com' => \Yii::$app->name])
                ->setSubject('Новый ответ в форме')
                ->send();
        });
    }
}