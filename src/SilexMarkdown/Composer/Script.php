<?php
/**
 * Composer script
 *
 * @package Script
 * @author ronan <ronan@studio1555>
 * @version 0.1
 * @copyright (C) 2013 ronan <ronan@studio1555>
 * @license MIT
 */

namespace SilexMarkdown\Composer;

use Symfony\Component\Console\Output\ConsoleOutput;
use Symfony\Component\Console\Formatter\OutputFormatterStyle;

class Script
{
    /**
     * install
     *
     * @return void
     */
    public static function install()
    {
        $output = new ConsoleOutput();
        $style = new OutputFormatterStyle('green');
        $output->getFormatter()->setStyle('green', $style);

        $assets = array('resources/cache', 'resources/log','web/assets');
        foreach ($assets as $asset) {
            self::createAndChmod($asset, 0777);
                $output->writeln(sprintf('<green>Generating "%s" asset dir</green>', $asset));
        }
        exec('php console assetic:dump');

    }

    /**
     * createAndChmod
     *
     * @param string $directory
     * @param int $chmod
     * @return void
     */
    public static function createAndChmod($directory, $chmod)
    {
        if (!is_dir($directory)) {
            if (false === @mkdir($directory, $chmod, true)) {
                throw new FileException(sprintf('Unable to create the "%s" directory with "%d" ', $directory, $chmod));
            }
        } elseif (!is_writable($directory)) {
            throw new FileException(sprintf('Unable to write in the "%s" directory', $directory));
        }
        if(false === @chmod($directory, $chmod)) {
            throw new FileException(sprintf('Unable to chmod %d the "%s" directory', $directory, $chmod));
        }
    }
}

