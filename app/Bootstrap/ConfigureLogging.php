<?php
/*
 * Copyright (c) AllAbout, Inc.
 * This project has been initiated under the
 * belief of simple and yet universal system
 * design driving customers' business efficiency.
 */
namespace App\Bootstrap;

use Illuminate\Contracts\Foundation\Application;
use Illuminate\Foundation\Bootstrap\ConfigureLogging as BaseConfigureLogging;
use Illuminate\Log\Writer;
/**
 * Represents logging configuration on bootstrap.
 * This tiny extension enables to configure log file location.
 */
class ConfigureLogging extends BaseConfigureLogging
{
    /**
     * {@inheritdoc}
     */
    protected function configureSingleHandler(Application $app, Writer $log)
    {
        $log->useFiles(
            $this->resolveFilePath($app)
        );
    }

    /**
     * {@inheritdoc}
     */
    protected function configureDailyHandler(Application $app, Writer $log)
    {
        $log->useDailyFiles(
            $this->resolveFilePath($app)
        );
    }

    /**
     * Returns appropriate log file path.
     *
     * @param  Application $app the currently handling application instance.
     * @return string           the relative path to the log file.
     */
    private function resolveFilePath(Application $app)
    {
        $path = $this->toRelativePath(
            $app['config']['app.path.log'] ?: '/logs/log.log'
        );
        return $app->storagePath() . $path;
    }

    /**
     * Concatenates a heading slash with the string given, if it is neccessary.
     *
     * @param  string $string the string to be checked.
     * @return string         the resulting canonical formed string.
     */
    private function toRelativePath($string, $delimiter='/')
    {
        if (strlen($string) > 0) {
            if (substr($string, 0, 1) != $delimiter) {
                return $delimiter . $string;
            } else {
                return $string;
            }
        } else {
            return $delimiter;
        }
    }
}